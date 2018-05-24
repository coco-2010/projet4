<?php

class Outil
{
    private $doss;

    public function GET($name){
        if(isset($_GET[$name])){return $_GET[$name];}
        return null;
    }

  /*  public function redirect($redirect ='projet4/home'){
        if($redirect == "login")
            echo '<script language="JavaScript" type="text/javascript">window.location.replace("Users/login");</script>';
        elseif ($redirect == "home")
            echo '<script language="JavaScript" type="text/javascript">window.location.replace("projet4/home");</script>';
        else
            echo '<script language="JavaScript" type="text/javascript">window.location.replace("'.$redirect.'");</script>';
    }*/

    public function alert($type,$msg){
        echo "<div class='alert alert-$type' role='alert'>$msg
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button></div>";
    }

    public function verifVar($get){
        if(isset($get) && preg_match("`[A-Za-z0-9_\-\.]`", $get))
            return $get;
        else return null;
    }

}

$Outil = new Outil();