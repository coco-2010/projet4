<?php 
require_once "Model/Mod_chapter.php";
class showDetailChapter {
    public $paginator;
    public $id;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->paginator = new Paginator();
        $this->shownComment = new shownComment;
        $this->addComment = new addComment;
        $this->Outil = new Outil();
        $this->shownDetailAd();
        
    }

    //affiche le chapitre
    public function shownDetailAd(){
        $id = $_GET['param'];
        $msg = $this->addComment->msg;
        $type = $this->addComment->type;
 
        $data = $this->shownComment->shownAd();
        $detailChapter = $this->mod_chapter->getAllDataImgprincipale($id);
        $alert = $this->addComment->shownAlert();
        if (empty($detailChapter)){
            $redirect = "/projet4/s/chapter/shownChapter";
            $this->Outil->redirect($redirect);
        }
        else{
            require "View/site/chapter/see.php"; 
            $this->shownComment->paginate();
        }
       
    }
}

