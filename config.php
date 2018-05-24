<?php
session_start();

ini_set('error_reporting', -1);
ini_set('display_errors', 1);

//Controleur indispensable
include "Controleur/Outil.php";
include "Controleur/Database.php";
include "Controleur/Auth.php";
include "Controleur/Cookie.php";
include "Controleur/Permission.php";
include "Controleur/form.php";
include "Controleur/Systeme.php";
include "Controleur/Chapter.php";

$Auth = new Auth();

if (empty($_SESSION['CSRF_token']))
    $Auth->generer_token("CSRF");