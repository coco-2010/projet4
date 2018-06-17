<?php
class Mod_image extends Outil
{
    private $bdd;

    private $chapter_id;
    private $img_dir;

    public $file;
    public $post;

    public function __construct(){
        $this->bdd = new Database();

    }


    public function getDataImg($id){
        $this->bdd->query('SELECT * FROM chapter_img WHERE id_chapter=:id_chapter');
        $this->bdd->bind(':id_chapter', $id);
        return $this->bdd->resultset();
    }

    public function bddAddImage($dir,$name,$chapter_id,$type){

        $this->bdd->query('INSERT INTO chapter_img (id_chapter, name, dir, type) VALUES (:id_chapter, :name, :dir, :type)');
        $this->bdd->bind(':id_chapter',             $chapter_id);
        $this->bdd->bind(':name',                   $name);
        $this->bdd->bind(':dir',                    $dir);
        $this->bdd->bind(':type',                   $type);
        $this->bdd->execute();
    }


    public function delete($id){
        $this->bdd->query('DELETE FROM chapter_img WHERE id= :id');
        $this->bdd->bind(':id', $id);
        $this->bdd->execute();
    }

}