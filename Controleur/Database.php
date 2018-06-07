<?php
class Database
{
    private $host = '127.0.0.1';
    private $db_name = 'projet4';
    private $user = 'root';
    private $password = '';

    private $bdd;
    private $error;
    private $qError;

    private $stmt;

    public function __construct(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );

        try{
            $this->bdd = new PDO($dsn, $this->user, $this->password, $options);
        }
        catch (PDOException $e){
            $this->error = $e->getMessage();
        }


    }

    public function query($query){
        $this->stmt = $this->bdd->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();

        $this->qError = $this->bdd->errorInfo();
        if(!is_null($this->qError[2])){
            echo $this->qError[2];
        }
        echo 'done with query';
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
  /*  public function Count($table, $where, $value){
        $this->query('SELECT count(*) AS total FROM '.$table.' WHERE '.$where.' = :where');
        $this->bind(':where', $value);
        $t = $this->single();
        return $t->total;
    }*/

    public function queryError(){
        $this->qError = $this->bdd->errorInfo();
        if(!is_null($qError[2])){
            echo $qError[2];
        }
    }
}
?>