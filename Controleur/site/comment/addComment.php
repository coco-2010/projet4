<?php
require "Model/Mod_comment.php";
 class addComment extends Outil{

     private $chapter_id;
     public $msg;
     public $type;

     function __construct(){
        $this->chapter_id   = $_GET['param'];
        $this->mod_comment  = new Mod_comment();
        $this->Outil = new Outil();
        $this->msgAlert = new stdClass();
        $this->msg = null;
        $this->type = null;
        $this->alertComment();
        if(isset($_POST['modifier'])){
            $this->add($_POST) ;
        }
        
        
     }

     // ajoute un chapitre
    public  function add(){
        $report = null; 
        if(!empty($_POST['pseudo'])){
            $author = $_POST['pseudo'];
        }
        else{
            $author = 'Visiteur';
        }
   
        $post = trim($_POST['description']);
        if(!empty ($post)){ 
            $this->mod_comment->add($post, $author, $report, $this->chapter_id);
            
            if (isset($_POST['modifier'])){
                $this->shownAlert();
            }
        }
        
    }

    private function alertComment(){
        $this->msgAlert->type = "info ";
        $this->msgAlert->msg = "Votre commentaire à bien été ajouté";
    }

    public function shownAlert(){
        if(isset($this->msgAlert->type))
            $this->msg = $this->msgAlert->msg;
            $this->type = $this->msgAlert->type;

    }
}