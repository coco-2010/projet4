<?php 
class listingChapter{
    public $paginator;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Paginator = new Paginator();
        $this->Outil = new Outil;

        $this->param = (isset($_GET['param']))?$_GET['param']:1;
        $this->param2 = null;
        if (!is_numeric($this->param ) || $this->param < 0){
            $this->param = 1;
        }
        
        $this->getAllData();
    }

     //affiche le listing
     public function getAllData(){
        $data = $this->mod_chapter->getAllData($this->param);
        if(empty($data)){
            $redirect = "/projet4/b/chapter/listingChapter";
            $this->Outil->redirect($redirect);
        }
        else{
            $this->paginate();
            require "View/backoffice/chapter/listing.php";
            
        }
        
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
