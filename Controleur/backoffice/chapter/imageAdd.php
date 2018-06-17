<?php
class imageAdd extends Outil{
    private $bdd;

    private $chapter_id;
    private $img_dir;
    private $dir;
    public $msgAlert;
    private $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
    public $file;
    public $post;

    public function __construct(){
        $this->mod_image = new Mod_image();
        $this->chapter_id   = $_GET['param'];
        $this->dir = "Theme/site/img/img_chapter";
        $this->img_dir      = "$this->dir/$this->chapter_id";
        $this->msgAlert = new stdClass();
        $id = $_GET['param'];
        require "View/backoffice/chapter/imageAdd.php";
        if(isset($_POST['add'])){
            $this->add($_FILES['img']);
        }

        $this->alertImage();
    }

    public function add($file){
        
        
        $extension = strtolower(substr(strrchr($file['name'], '.'),1));
        if(in_array($extension,$this->extensions_valides)){
            if(!file_exists($this->img_dir))
                mkdir("$this->img_dir/", 0777, true);

            $nom = md5(uniqid(rand(), true));
            $name = "$nom.$extension";
            $dire = "$this->img_dir/$name";

            $resultat = move_uploaded_file($file['tmp_name'],$dire);

            if ($resultat)
                $this->mod_image->bddAddImage($this->img_dir,"$nom.$extension",$this->chapter_id,$extension);

        }
    }

    public function shownAlert(){
        if(isset($this->msgAlert->type))
            $this->alert($this->msgAlert->type,$this->msgAlert->msg);
    }

    public function alertImage(){
        $this->msgAlert->type = "success ";
        $this->msgAlert->msg = "La nouvelle image a bien été enregistrée";
    }


}

