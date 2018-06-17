<?php
 class shownComment extends Outil {

     private $bdd;
     private $Outil;
     private $chapter_id;
     public $msgAlert;
     public $paginator;

    function __construct(){
        $this->chapter_id   = (isset($_GET['param']))?intval($_GET['param']):1;
        $this->param2 = (isset($_GET['param2']))?intval($_GET['param2']):1;
        $this->mod_comment  = new Mod_comment();
        $this->Paginator = new Paginator();
    }

    public function shownAd(){
        
        $data = $this->mod_comment->getAllDataImg($this->param2, $this->chapter_id);
        return $data;
    }

    public function nb(){
        $count = $this->mod_comment->countId($this->chapter_id);
        $total = $count[0]->total;
        return $total;
    }

    public function paginate(){
        $this->Paginator->total = $this->nb();
        $link = "s/chapter/showDetailChapter";
        $paginator = $this->Paginator->paginate($this->chapter_id, $this->param2, $link);
        return $paginator;
    }

}