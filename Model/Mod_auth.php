<?php

class Mod_auth extends Outil{   

    public $bdd;

    function __construct(){
        $this->bdd = new Database();


    }

    //register
    public function addRegister($email,$pass,$token){
        $this->bdd->query('INSERT INTO users (email, password, token) VALUES (:email, :password, :token)');
        $this->bdd->bind(':email', $email);
        $this->bdd->bind(':password', $pass);
        $this->bdd->bind(':token', $token);
        $this->bdd->execute();
    }

    public function getData($email){
        $this->bdd->query('SELECT * FROM users WHERE email=:email');
        $this->bdd->bind(':email', $email);
        return $this->bdd->single();
    }
    
    public function getUserData($token){
        $bdd = new Database();
        $bdd->query('SELECT * FROM users WHERE token=:token');
        $bdd->bind(':token', $token);
        return $bdd->single();
    }

}
