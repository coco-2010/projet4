<?php
 class listingComment{

     public $paginator;
     public $report;
     public $data;

     function __construct(){
         $this->mod_comment  = new Mod_comment();
         $this->Paginator = new Paginator();
         $this->param = (isset($_GET['param']))?$_GET['param']:1; 
         $this->param2 = null;
         if (!is_numeric($this->param ) || $this->param < 0){
            $this->param = 1;
        }
        
         
         $this->report = null;
         $this->data = null;
         $this->view();
     }

    //affiche le listing
    public function getAllData(){
        $this->data = $this->mod_comment->getAllData($this->param);
        return $this->data;
    }

    public function getAllDataReport(){
        $this->data_report = $this->mod_comment->getAllDataReport();
        return $this->data_report;
    }

    public function view(){
        $this->getAllData();
        $this->getAllDataReport();
        require "View/backoffice/comment/listing.php";
        $this->paginate();
    }

    public function nb(){
        $count = $this->mod_comment->count();
        $total = $count[0]->total;
        return $total;
    }

    public function paginate(){
        $this->Paginator->total = $this->nb();
        $link = "b/comment/listingComment";
        $paginator = $this->Paginator->paginate($this->param, $this->param2, $link);
        return $paginator;
    }
}
