<?php
/**
 * Created by PhpStorm.
 * User: Hernea
 * Date: 12/12/2017
 * Time: 10:51
 */

class Permission
{
    private $bdd;
    private $Auth;
    private $Perm;
    private $forbiddenPage = "/backoffice/users/connexion";

    function __construct(){
        $this->bdd = new Database();
        $this->Auth = new Auth();

       // var_dump($this->Users);
       // var_dump($this->Auth);
    }


    public function access($perm){
        if(isset($this->Auth->Users->permission) && $this->Auth->Users->permission != null){
            if($this->Auth->Users->permission->$perm == true){
                return true;
            }else return false;
        }else
            return false;

    }

    private function forbidden(){
        header('Location:'.$this->forbiddenPage);
    }
}
$perm = new Permission();