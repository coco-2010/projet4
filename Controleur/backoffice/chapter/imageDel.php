<?php
class imageDel extends Outil{
    private $bdd;


    public function __construct(){
        $this->mod_image = new Mod_image();
        $this->chapter_id = $_GET['param'];
        $this->Outil = new Outil;
        $this->delete();
    }

    public function delete(){
        require "View/backoffice/chapter/imageDel.php";
        $this->mod_image->delete($this->chapter_id);
        
        $dir = 'Theme/site/img/img_chapter/'.$this->chapter_id;
        $images = glob($dir . "/*.jpg");

        if (empty($images)){
            echo "L'image que vous voulez supprimer n'existe pas.";
        }
        else{
            foreach($images as $image)
            {
              unlink($image);
            } 
            rmdir('Theme/site/img/img_chapter/'.$this->chapter_id);
        }
         
        $redirect = "/projet4/b/chapter/$this->chapter_id/image";
        $this->Outil->redirect($redirect);
    } 

}
