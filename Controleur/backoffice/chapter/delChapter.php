<?php 
class delChapter{
    public $id;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->delete();
    }

    public function delete(){
        $id = $_GET['param'];
        require "View/backoffice/chapter/del.php";
        $this->mod_chapter->delete($id);
        $this->mod_chapter->deleteComment($id);
        $this->mod_chapter->delImage($id);
        // unlink('Theme/site/img/img_chapter/'.$this->chapter_id.'/.*');
        //rmdir("Theme/site/img/img_chapter/$this->chapter_id");
    }
}

