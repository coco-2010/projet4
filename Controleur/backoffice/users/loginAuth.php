<?php
require "Model/Mod_auth.php";
class loginAuth extends Outil{   

    public $salt = 'h58%,f4$gh5e8';

    function __construct(){
        $this->mod_auth = new Mod_auth();
        $this->Outil = new Outil();

        if($this->Get('token') != false){
            $data = $this->mod_auth->getUserData($_SESSION['token']);
            $_SESSION['token']      = $data->token;
            $_SESSION['email']      = $data->email;
        }

        require "View/backoffice/users/login.php";

        if(isset($_POST['login'])){
            $login = $this->login();
            if($login === true && isset($_POST['remember'])){
            
                $mdp = $_POST['password'];
                $password = sha1($this->salt.$mdp);
                $Cookie->Set('cookie_email', $_POST['email'], time() + 86400 * 365);
                $Cookie->Set('cookie_password', $password, time() + 86400 * 365);
                
            }
            
        }
    }

    public function login(){
        
        $email = $_POST['email'];
        $data = $this->mod_auth->getData($email);
        if($data != null){
            if (sha1($this->salt.$_POST['password']) == $data->password) {
                $_SESSION['token']      = $data->token;
                $_SESSION['email']      = $data->email;
                $redirect= "/projet4/b/";
                $this->Outil->redirect($redirect);
                return true;
            }else "Mauvais identifiants";
        }else echo "Compte inconue";
    }

    
    public function Get($name){
        if(isset($_SESSION[$name])){return $_SESSION[$name];}
        return false;
    }

}

