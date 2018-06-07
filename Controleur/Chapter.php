<?php 
require "Model/Mod_chapter.php";
class Chapter extends Outil{
    private $Outil;
    public $msgAlert;
    public $paginator;
    public $id;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Outil = new Outil();
        $this->msgAlert = new stdClass();
        $this->paginator = new Paginator();
            
        $this->alertChapter();
        
    }

    public function shownAlert(){
        if(isset($this->msgAlert->type))
            $this->alert($this->msgAlert->type,$this->msgAlert->msg);
    }

    private function AlertChapter(){
        $this->msgAlert->type = "info ";
        $this->msgAlert->msg = "Le nouveau chapitre à bien été enregistré";
    }

    //compte le nb d'entree
    public function nb(){
        $count = $this->mod_chapter->count();
        $total = $count[0]->total;
        return $total;
    }

    //affiche le listing
    public function getAllData(){
        $data = $this->mod_chapter->getAllData();
        return $data;
    }

    //ajoute un chapitre
    public function add($data){
        $this->mod_chapter->add($data);
    }

      //modifie le chapitre 
      public function edit($id,$data){
        $this->mod_chapter->edit($id, $data);
    }

    public function delete($id){
        $this->mod_chapter->delete($id);
    }

    //recupere les infos du chapitre
    public function getData($id){
        $chapter = $this->mod_chapter->getData($id);
        return $chapter;
    }

  

    //affiche les chapitres
    public function shownAd($param){
        $allChapter = $this->mod_chapter->getAllDataImg($param);
        return $allChapter;
        
    }

    //affiche le chapitre
    public function shownDetailAd($id){
        $detailChapter = $this->mod_chapter->getAllDataImgprincipale($id);
        return $detailChapter;
        
    }

    //affiche les derniers chapitres
    public function showLastChapter(){
        $lastChapter = $this->mod_chapter->getLastChapter();
        return $lastChapter;
    }
}

