<?php
 class delComment extends Outil {

     function __construct(){
         $this->mod_comment  = new Mod_comment();
         $this->delete();
     }

     //supprime le chapitre 
    public function delete(){
        $id = $_GET['param'];
        require "view/backoffice/comment/del.php";
        $this->mod_comment->delete($id);
        
    }

}
