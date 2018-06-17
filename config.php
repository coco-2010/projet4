<?php
session_start();

ini_set('error_reporting', -1);
ini_set('display_errors', 1);

//Controleur

include "Controleur/Outil.php";
include "Controleur/Systeme.php";
include "Controleur/Database.php";
include "Controleur/Paginator.php";
include "Controleur/Cookie.php";

    //Controleur site
    //chapter
require_once "Controleur/site/home/lastChapter.php";
require_once "Controleur/site/chapter/shownChapter.php";
require_once "Controleur/site/chapter/showDetailChapter.php";
    //comment
require_once "Controleur/site/comment/addComment.php";
require_once "Controleur/site/comment/reportComment.php";
require_once "Controleur/site/comment/shownComment.php";

    // Controleur backoffice

    // chapter
require_once "Controleur/backoffice/chapter/addChapter.php";
require_once "Controleur/backoffice/chapter/delChapter.php";
require_once "Controleur/backoffice/chapter/editChapter.php";
require_once "Controleur/backoffice/chapter/image.php";
require_once "Controleur/backoffice/chapter/imageAdd.php";
require_once "Controleur/backoffice/chapter/imageDel.php";
require_once "Controleur/backoffice/chapter/listingChapter.php";
    //comment
require_once "Controleur/backoffice/comment/delComment.php";
require_once "Controleur/backoffice/comment/editComment.php";
require_once "Controleur/backoffice/comment/listingComment.php";
    // users
require_once "Controleur/backoffice/users/disconnect.php";
require_once "Controleur/backoffice/users/loginAuth.php";
/*require_once "Controleur/backoffice/users/registerAuth.php";*/







