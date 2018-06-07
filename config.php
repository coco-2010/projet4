<?php
session_start();

ini_set('error_reporting', -1);
ini_set('display_errors', 1);

//Controleur

include "Controleur/Outil.php";
include "Controleur/Systeme.php";
include "Controleur/Database.php";
include "Controleur/Auth.php";
include "Controleur/Paginator.php";
include "Controleur/Chapter.php";
include "Controleur/Permission.php";

include "Controleur/form.php";
include "Controleur/Image.php";

include "Controleur/Cookie.php";
include "Controleur/Comment.php";










$Auth = new Auth();

if (empty($_SESSION['CSRF_token']))
    $Auth->generer_token("CSRF");