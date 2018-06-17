<?php
    Class disconnection{
        function __construct(){
           $this->Outil = new Outil();
            $this->Cookie = new Cookie();
            $this->disconnect();
        }

        public function disconnect(){
            
            unset($_SESSION['email']);
            unset($_SESSION['token']);
            
            $this->Cookie->Remove('cookie_email');
            $this->Cookie->Remove('cookie_password');
            $redirect = "loginAuth";
            $this->Outil->redirect($redirect);
            require "View/backoffice/users/disconnection.php";
        }
    }

    