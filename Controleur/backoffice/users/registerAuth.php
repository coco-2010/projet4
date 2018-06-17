<?php
require "Model/Mod_auth.php";
class registerAuth extends Outil{   

    public $Users;
    public $salt = 'h58%,f4$gh5e8';

    function __construct(){
        $this->mod_auth = new Mod_Auth();
        if(isset($_POST['register']) && $_SESSION['CSRF_token'] == $_POST['CSRF_token']){
            $register = $this->register();
            if($register === true){
                $Outil->Redirect();
            }
        }
    }

    /* Register */
    public function register(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $token = $this->generer_token();
        

        if($this->verif_email($email) == true && $this->verif_password($password,$password2)){
            define('PREFIXE_SHA1', 'h58%,f4$gh5e8');
            $pass= sha1(PREFIXE_SHA1.$password);
            $this->mod_auth->addRegister($email,$pass,$token);
        }else{
            echo "Veuillez remplir tout les champs";
        }
    }

    /* Verif Email
    * @email
    */
    public function verif_email($email){
       $data = $this->mod_auth->getData($email);
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

    public function generer_token(){
        $token = uniqid(rand(20,20), true);
        return $token;
    }

}

require "View/backoffice/users/register.php";