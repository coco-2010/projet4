<?php 
require_once "Model/Mod_chapter.php";
class shownChapter{
    public $paginator;
    public $id;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Paginator = new Paginator();
        
        $this->param = (isset($_GET['param']))?intval($_GET['param']):1;
        $this->param2 = null;
        
        $this->shownAd();
    }

    //affiche les chapitres
    public function shownAd(){      
        
        $allChapter = $this->mod_chapter->getAllDataImg($this->param);
        require "View/site/chapter/chapter.php";
        $this->paginate();
    }

     //compte le nb d'entree
     public function nb(){
        $count = $this->mod_chapter->count();
        $total = $count[0]->total;
        return $total;
    }

    public function paginate(){
        $this->Paginator->total = $this->nb();
        $link = "s/chapter/shownChapter";
        $paginator = $this->Paginator->paginate($this->param, $this->param2, $link);var_dump($this->paginator);
        return $paginator;
    }
}
