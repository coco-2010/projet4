<?php
require "Model/Mod_image.php";
class Image extends Outil
{
    private $bdd;

    private $chapter_id;
    private $img_dir;
    private $img_count;
    private $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );

    public $msgAlert;
    public $file;
    public $post;

    public function __construct($id,$dir, $action = null){
        $this->mod_image = new Mod_image();
        $this->chapter_id   = $id;
        $this->img_dir      = "$dir/$id";
        $this->img_count    = $this->count();
        $this->msgAlert = new stdClass();
        if($action == null)
        $this->Null();
    }

    private function Null(){
        $this->file = $this->mod_image->getDataImg($this->chapter_id);
        
        if($this->img_count == 0){
            $this->msgAlert->type = "danger";
            $this->msgAlert->msg = "Aucune image trouvée";
        }elseif($this->img_count > 0){
            $this->msgAlert->type = "info ";
            $this->msgAlert->msg = "$this->img_count images trouvées";
        }
        return $this->file;
    }

    public function delete(){
        $this->mod_chapter->delete($this->chapter_id);
    }
    public function shownAlert(){
        if(isset($this->msgAlert->type))
            $this->alert($this->msgAlert->type,$this->msgAlert->msg);
    }

    private function count(){
        $files = glob($this->img_dir."/*");
        $compteur = count($files);
        return $compteur;
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

}