<?php
 class delComment extends Outil {

     function __construct(){
         $this->mod_comment  = new Mod_comment();
         $this->Outil = new Outil();
         $this->delete();
         
     }

     //supprime le chapitre 
    public function delete(){
        $id = $_GET['param'];
        require "View/backoffice/comment/del.php";
        $this->mod_comment->delete($id);
        
        $redirect = "/projet4/b/comment/listingComment";
        $this->Outil->redirect($redirect);
    }

}
