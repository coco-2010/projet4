<?php 
//require "Model/Mod_chapter.php";
class listingChapter{
    public $paginator;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Paginator = new Paginator();

        $this->param = (isset($_GET['param']))?intval($_GET['param']):1;
        $this->param2 = null;
        
        $this->getAllData();
    }

     //affiche le listing
     public function getAllData(){
        $data = $this->mod_chapter->getAllData($this->param);
        require "View/backoffice/chapter/listing.php";
        $this->paginate();
    }

     //compte le nb d'entree
     public function nb(){
        $count = $this->mod_chapter->bCount();
        $total = $count[0]->total;
        return $total;
    }

    public function paginate(){
        $this->Paginator->total = $this->nb();
        $link = "b/chapter/listingChapter";
        $paginator = $this->Paginator->paginate($this->param, $this->param2, $link);
        return $paginator;
    }
}
