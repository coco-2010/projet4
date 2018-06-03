<?php
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
        $this->bdd = new Database();

        $this->chapter_id   = $id;
        $this->img_dir      = "$dir/$id";
        $this->img_count    = $this->count();
        $this->msgAlert = new stdClass();

        if($action == null)
            $this->Null();
    }

    private function Null(){
        $this->getDataImg();

        if($this->img_count == 0){
            $this->msgAlert->type = "danger";
            $this->msgAlert->msg = "Aucune image trouvée";
        }elseif($this->img_count > 0){
            $this->msgAlert->type = "info ";
            $this->msgAlert->msg = "$this->img_count images trouvées";
        }
    }

    private function getDataImg(){
        $this->bdd->query('SELECT * FROM chapter_img WHERE id_chapter=:id_chapter');
        $this->bdd->bind(':id_chapter', $this->chapter_id);
        $this->file = $this->bdd->resultset();
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
                $this->bddAddImage($this->img_dir,"$nom.$extension",$this->chapter_id,$extension);

        }
    }

    public function bddAddImage($dir,$name,$chapter_id,$type){

        $this->bdd->query('INSERT INTO chapter_img (id_chapter, name, dir, type) VALUES (:id_chapter, :name, :dir, :type)');
        $this->bdd->bind(':id_chapter',             $chapter_id);
        $this->bdd->bind(':name',                   $name);
        $this->bdd->bind(':dir',                    $dir);
        $this->bdd->bind(':type',                   $type);
        $this->bdd->execute();
        $this->msgAlert->type = "success ";
        $this->msgAlert->msg = "Image correctement ajoutée";
    }


    public function delete(){
        var_dump($this->chapter_id);
        $this->bdd->query('DELETE FROM chapter_img WHERE id= :id');
        $this->bdd->bind(':id', $this->chapter_id);
        $this->bdd->execute();
        //$this->Outil->redirect('b/chevaux/edit/'.$this->chevaux_id);
    }

}