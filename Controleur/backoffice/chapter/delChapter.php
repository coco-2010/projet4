<?php 
class delChapter{
    public $id;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Outil = new Outil();
        $this->delete();
    }

    public function delete(){
        $id = $_GET['param'];
        require "View/backoffice/chapter/del.php";
        $this->mod_chapter->delete($id);
        $this->mod_chapter->deleteComment($id);
        $this->mod_chapter->deleteImage($id);
        
        //delete fichier image
        $dir = 'Theme/site/img/img_chapter/'.$id;
        $images = glob($dir . "/*.jpg");

        if (empty($images)){
            echo "L'image que vous voulez supprimer n'existe pas.";
        }
        else{
            foreach($images as $image)
            {
              unlink($image);
            } 
            rmdir('Theme/site/img/img_chapter/'.$id);
        }

        $redirect = "/projet4/b/chapter/listingChapter";
        $this->Outil->redirect($redirect);
    }
}

