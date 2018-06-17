<?php
class imageDel extends Outil{
    private $bdd;


    public function __construct(){
        $this->mod_image = new Mod_image();
        $this->chapter_id = $_GET['param'];
        $this->delete();
    }

    public function delete(){
        require "View/backoffice/chapter/imageDel.php";
        $this->mod_image->delete($this->chapter_id);
       // unlink('Theme/site/img/img_chapter/'.$this->chapter_id.'/.*');
        //rmdir("Theme/site/img/img_chapter/$this->chapter_id");
        
    }

}
