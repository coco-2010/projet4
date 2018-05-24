<?php

ob_start();
require('config.php');

$Systeme = new Systeme("projet4/",
    $Outil->GET("dossier"),
    $Outil->GET("module"),
    $Outil->GET("directory"),
    $Outil->GET("page"),
    $Outil->GET("param")
);

//var_dump($_GET);

ob_end_flush();