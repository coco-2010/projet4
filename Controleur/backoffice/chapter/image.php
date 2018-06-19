<?php
require "Model/Mod_image.php";
class Image extends Outil{
    private $bdd;

    private $chapter_id;
    private $img_dir;
    public $img_count;
    private $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );

    public $msgAlert;
    public $file;
    public $post;

    public function __construct(){
        $this->mod_image = new Mod_image();
        $this->Outil = new Outil();
        $this->chapter_id   = $_GET['param'];
        $this->dir          = "Theme/site/img/img_chapter";
        $this->img_dir      = "$this->dir/$this->chapter_id";
        $this->img_count    = $this->count();
        $this->msgAlert = new stdClass();
        $this->msg = null;
        $this->type = null;

        $this->alertPicture();
    }

    public function shownAlert(){
        if(isset($this->msgAlert->type))
            $this->msg = $this->msgAlert->msg;
            $this->type = $this->msgAlert->type;
    }

    public function count(){
        $files = glob($this->img_dir."/*");
        $compteur = count($files);
        return $compteur;
    }

    private function alertPicture(){
        $this->file = $this->mod_image->getDataImg($this->chapter_id);

        if(empty($this->file)){
            $redirect = "/projet4/b/chapter/listingChapter";
            $this->Outil->redirect($redirect);
        }
        else{
            if($this->img_count == 0){
                $this->msgAlert->type = "danger";
                $this->msgAlert->msg = "Aucune image trouvée";
            }elseif($this->img_count > 0){
                $this->msgAlert->type = "info ";
                $this->msgAlert->msg = "$this->img_count images trouvées";
            }

            $this->shownAlert();
            require "View/backoffice/chapter/image.php"; 
        }
    }
    
}

