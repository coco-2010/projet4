<?php

require_once "Model/Mod_chapter.php";

class lastChapter{
    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Outil = new Outil();
        $this->Outil->contact($_POST);
        $this->showLastChapter();
    }

    //affiche les derniers chapitres
    public function showLastChapter(){
        $lastChapter = $this->mod_chapter->getLastChapter();
        require "View/site/home.php";
    }

}
