<?php

ob_start();
require('config.php');

$Systeme = new Systeme("projet4/",
    $Outil->GET("dossier"),
    $Outil->GET("module"),
    $Outil->GET("page"),
    $Outil->GET("param"),
    $Outil->GET("param2")
    
);

ob_end_flush();