<?php
require "Model/Mod_comment.php";
 class Comment extends Outil {

     private $bdd;
     private $Outil;
     private $chapter_id;
     public $msgAlert;
     public $paginator;

     function __construct($param){
         $this->chapter_id   = $param;
         $this->mod_comment  = new Mod_comment();
         $this->bdd = new Database();
         $this->Outil = new Outil();
         $this->msgAlert = new stdClass();
         $this->paginator = new Paginator();
  
        $this->Null();
     }
     
      //affiche le listing
    public function getAllData(){
        $data = $this->mod_comment->getAllData();
        return $data;
    }

    public function getAllDataReport(){
        $report = $this->mod_comment->getAllDataReport();
        return $report;
    }

    //modifie le chapitre 
    public function edit($id,$report){
        $this->mod_comment->edit($id, $report);
    }
    
    //supprime le chapitre 
    public function delete($id){
        $this->mod_comment->delete($id);
    }

    // ajoute un chapitre
    public  function add($data, $report){
        if( isset($_SESSION['name'])){
            $author = $_SESSION['name'];
        }
        else{
            $author = 'Visiteur';
        }
        $this->mod_comment->add($data, $author, $report, $this->chapter_id);
    }

     private function Null(){
         $this->mod_comment->getAllData();

         $this->msgAlert->type = "info ";
         $this->msgAlert->msg = "Le nouveau commentaire a bien ete ajoute";
     }

     public function shownAlert(){
         if(isset($this->msgAlert->type))
             $this->alert($this->msgAlert->type,$this->msgAlert->msg);
     }

     public function nb(){
         $count = $this->mod_comment->count();
         $total = $count[0]->total;
         return $total;
     }

    public function shownAd($param2){
       $data = $this->mod_comment->getAllDataImg($param2, $this->chapter_id);
         return $data;
     }

 }