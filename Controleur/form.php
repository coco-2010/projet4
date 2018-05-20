<?php

class Form{
    private $data;

    function __construct($data = array()){
        $this->data = $data;
    }

    public function CSRF($token){
        return '<input type="hidden" value="'.$token.'" name="CSRF_token">';
    }



}

$form = new Form()
?>