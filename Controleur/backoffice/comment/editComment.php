<?php
 class editComment  {

     private $chapter_id;
     public $paginator;

     function __construct(){
         $this->chapter_id   = $_GET['param'];
         $this->mod_comment  = new Mod_comment();
         $this->Outil = new Outil();

         $this->edit();
     }

     //modifie le chapitre 
    public function edit(){
        $report = null;var_dump($report);
        $this->mod_comment->edit($this->chapter_id, $report);
        require "View/backoffice/comment/edit.php";

        $redirect = "/projet4/b/comment/listingComment";
        $this->Outil->redirect($redirect);
    }
}
