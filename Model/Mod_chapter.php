<?php
 class Mod_chapter extends Outil {

    private $bdd;
    private $Outil;
    public $msgAlert;
    public $paginator;
    public $id;

    function __construct(){
        $this->bdd = new Database();
        $this->Outil = new Outil();
        $this->msgAlert = new stdClass();
        $this->paginator = new Paginator();

    }

    public function getAllData($param){
        $start = ($param -1)*$this->paginator->itemparPage;
        $this->bdd->query('SELECT * FROM chapter 
        ORDER BY id DESC
        LIMIT 12 OFFSET :offset');
        $this->bdd->bind(':offset', $start, PDO::PARAM_INT);
        return $this->bdd->resultset();
    }

    public function getData($id){
        $this->bdd->query('SELECT * FROM chapter WHERE id=:id');
        $this->bdd->bind(':id', $id);
        return $this->bdd->single();
    }

    public function bcount(){
        $this->bdd->query('SELECT count(*) AS total FROM chapter');
        return $this->bdd->resultset();
    }

    public function count(){
        $this->bdd->query('SELECT count(*) AS total FROM chapter
    INNER JOIN chapter_img
    ON chapter.id = chapter_img.id_chapter');
        return $this->bdd->resultset();
    }

    public function edit($id, $data){
        $msg = false;

        $this->bdd->query('UPDATE chapter SET 
        titre=:titre, 
        description=:description
        WHERE id=:id');
        $this->bdd->bind(':titre',                  $data['titre']);
        $this->bdd->bind(':description',            $data['description']);

        $this->bdd->bind(':id', $id);

        $this->bdd->execute();

        return $msg;
    }

    public function add($post, $title){
        $msg = false;

        $this->bdd->query('INSERT INTO chapter
            (titre, description) 
        VALUES (:titre, :description)');
        $this->bdd->bind(':titre',                  $title);
        $this->bdd->bind(':description',            $post);

        $this->bdd->execute();

        return $msg;
    }

    public function delete($id){

        $this->bdd->query('DELETE FROM chapter WHERE chapter.id=:id');
        $this->bdd->bind(':id', $id);
        $this->bdd->execute();
    }

    public function deleteComment($id_chapter){
        $this->bdd->query('DELETE FROM comment WHERE id_chapter=:id_chapter');
        $this->bdd->bind(':id_chapter', $id_chapter);
        $this->bdd->execute();
    }

    public function deleteImage($id_chapter){
        $this->bdd->query('DELETE FROM chapter_img WHERE id_chapter=:id_chapter');
        $this->bdd->bind(':id_chapter', $id_chapter);
        $this->bdd->execute();
    }
    

    public function getAllDataImg($param){
        $start = ($param -1)*$this->paginator->itemparPage;

        $this->bdd->query('SELECT * FROM chapter
        INNER JOIN chapter_img
        ON chapter.id = chapter_img.id_chapter
        ORDER BY chapter.id 
        LIMIT  12 OFFSET :offset');
        $this->bdd->bind(':offset', $start, PDO::PARAM_INT);

        return $this->bdd->resultset();
    }

    
    
    public function getAllDataImgprincipale($id){
        $this->bdd->query('SELECT * FROM chapter
        LEFT JOIN chapter_img
        ON chapter.id = chapter_img.id_chapter
        WHERE chapter.id='.$id);
        return $this->bdd->resultset();
    }

    public function getLastChapter(){
        $this->bdd->query('SELECT * FROM CHAPTER
        INNER JOIN chapter_img
        ON chapter.id = chapter_img.id_chapter
        ORDER BY chapter.id DESC
        LIMIT  3');
        
        return $this->bdd->resultset();
    }

    

}
