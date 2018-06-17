<?php
 class Mod_comment extends Outil {

     private $bdd;
     private $Outil;
     private $chapter_id;
     public $msgAlert;
     public $paginator;

     function __construct(){
         $this->bdd = new Database();
         $this->Outil = new Outil();
         $this->msgAlert = new stdClass();
         $this->paginator = new Paginator();

     }

     public function getAllData($param){
        $start = ($param -1)*$this->paginator->itemparPage;
         $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report 
         FROM comment WHERE report IS NULL 
         ORDER BY id DESC
         LIMIT 12 OFFSET :offset');
         $this->bdd->bind(':offset', $start, PDO::PARAM_INT);
         return $this->bdd->resultset();
     }

     public function getAllDataReport(){
        $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report FROM comment WHERE report = :report ORDER BY date_post DESC');
        $this->bdd->bind(':report', 1);
        return $this->bdd->resultset();
    }

     public function getData($id){
         $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report FROM comment WHERE id=:id');
         $this->bdd->bind(':id', $id);
         return $this->bdd->single();
     }

     public function count(){
         $this->bdd->query('SELECT count(*) AS total FROM comment');
         return $this->bdd->resultset();
     }

     public function countId($id){
         $this->bdd->query('SELECT count(*) AS total FROM comment WHERE id_chapter = :id');
         $this->bdd->bind(':id', $id);
         return $this->bdd->resultset();
     }


     public function edit($id, $report){
         $msg = false;

         $this->bdd->query('UPDATE comment SET
            report=:report
            WHERE id=:id');
         $this->bdd->bind(':report',            $report);

         $this->bdd->bind(':id', $id);

         $this->bdd->execute();

         //$this->Outil->redirect('b/edit/'.$id);

         return $msg;
     }

     public function getAllDataImg($param2,$param){
         $start = ($param2 -1)*$this->paginator->itemparPage;

        $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report FROM comment
        WHERE id_chapter=:id_chapter
        ORDER BY id DESC
        LIMIT  12 OFFSET :offset');
         $this->bdd->bind(':id_chapter', $param);
         $this->bdd->bind(':offset', $start, PDO::PARAM_INT);

         return $this->bdd->resultset();
     }

     public function add($data, $author, $report, $param){
        $msg = false;
        $this->bdd->query('INSERT INTO comment
        (id_chapter, description, author, date_post, report)
        VALUES (:id_chapter, :description,:author, NOW(), :report)');
        $this->bdd->bind(':id_chapter',             $param); 
        $this->bdd->bind(':description',            $data);
        $this->bdd->bind(':author',                 $author);
        $this->bdd->bind(':report',                 $report);
        

        $this->bdd->execute();

        return $msg;
     }

     public function delete($id){

         $this->bdd->query('DELETE FROM comment WHERE comment.id=:id');
         $this->bdd->bind(':id', $id);
         $this->bdd->execute();
     }

 }
