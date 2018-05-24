<?php

class Auth extends Outil{   

    public $Users;
    public $salt = 'h58%,f4$gh5e8';

    function __construct(){
        $this->Users = new stdClass();
        if($this->Get('id') != false){
            $data = $this->getUserData($_SESSION['id']);
            $this->Users->id                    = $data->id;
            $this->Users->email                 = $data->email;
            $this->Users->permission            = json_decode($data->permission);
        }
    }

    /* Login */
    public function login($dataPost){
        $bdd = new Database();
        $Outil = new Outil();
        $login = $dataPost['email'];

        $bdd->query('SELECT * FROM users WHERE email=:email');
        $bdd->bind(':email', $login);
        $data = $bdd->single();
            
        if($data != null){
            if (sha1($this->salt.$dataPost['password']) == $data->password) {
                $_SESSION['id']         = $data->id;
                $_SESSION['email']      = $data->email;
                $_SESSION['permission'] = $data->permission;
                return true;
            }else "Mauvais identifiants";
        }else echo "Compte inconue";
    }

    /* Register */
    public function register($data){
        $bdd = new Database();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($this->verif_email($email) == true && $this->verif_password($password,$password2)){
            define('PREFIXE_SHA1', 'h58%,f4$gh5e8');
            $pass= sha1(PREFIXE_SHA1.$password);
            $bdd->query('INSERT INTO users (email, password) VALUES (:email, :password)');
            $bdd->bind(':email', $_POST['email']);
            $bdd->bind(':password', $pass);
            $bdd->execute();
        }else{
            echo "Veuillez remplir tout les champs";
        }
    }

    /* Verif Email
    * @email
    */
    public function verif_email($email){
        $bdd = new Database();

        $bdd->query('SELECT * FROM users WHERE email=:email');
        $bdd->bind(':email', $email);
        $data = $bdd->single();
        if($data != null)
            return false;
        else
            return true;
    }
    /* Verif Pseudo
 * @pseudo
 */
    public function verif_pseudo($pseudo){
        $bdd = new Database();

        $bdd->query('SELECT * FROM users WHERE pseudo=:pseudo');
        $bdd->bind(':pseudo', $pseudo);
        $data = $bdd->single();
        if($data != null)
            return false;
        else
            return true;
    }
    /* Verif Password
 * @password
 */
    public function verif_password($password, $password2){
        if($password == $password2)
            return true;
        else
            return false;
    }

    public function Get($name){
        if(isset($_SESSION[$name])){return $_SESSION[$name];}
        return false;
    }

    public function getUserData($id){
        $bdd = new Database();
        $bdd->query('SELECT * FROM users WHERE id=:id');
        $bdd->bind(':id', $id);
        return $bdd->single();
    }

    public function getUserAllData(){
        $bdd = new Database();
        $bdd->query('SELECT * FROM users');
        return $bdd->resultset();
    }

    public function generer_token($nom = ''){
        $token = uniqid(rand(), true);
        $_SESSION[$nom.'_token'] = $token;
        $_SESSION[$nom.'_token_time'] = time();
        return $token;
    }

}
