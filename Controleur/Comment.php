<?php
 class Comment extends Outil {

     private $bdd;
     private $Outil;
     private $chapter_id;
     public $msgAlert;
     public $paginator;

     function __construct($param, $action = null){
         $this->chapter_id   = $param;
         $this->bdd = new Database();
         $this->Outil = new Outil();
         $this->msgAlert = new stdClass();
         $this->paginator = new Paginator();
         if($action == null)
             $this->Null();
     }

     public function getAllData(){
         $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report FROM comment WHERE report IS NULL ORDER BY id DESC');
         return $this->bdd->resultset();
     }

     public function getAllDataReport(){
        $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report FROM comment WHERE report = :report ORDER BY date_post DESC');
        $this->bdd->bind(':report', 1);
        return $this->bdd->resultset();
    }


     private function Null(){
         $this->getAllData();

         $this->msgAlert->type = "info ";
         $this->msgAlert->msg = "Le nouveau commentaire a bien ete ajoute";
     }

     public function shownAlert(){
         if(isset($this->msgAlert->type))
             $this->alert($this->msgAlert->type,$this->msgAlert->msg);
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

     public function nb(){
         $count = $this->count();
         $total = $count[0]->total;
         return $total;
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

         return $msg; var_dump($msg);
     }

    public function shownAd($param2){
       $data = $this->getAllDataImg($param2);
         foreach ($data as $keys => $value){
             echo "
                    <div class='comment'>
                        <p><span class='author-comment'>$value->author</span> - $value->date_post</p>
                        <div class='desc-comment'>$value->description</div>
                        <a class='report' href= 'View/s/chapter/report/$value->id'>Signaler</a>
                    </div>";
         }
     }

     public function getAllDataImg($param2){
         $start = ($param2 -1)*$this->paginator->itemparPage;

        $this->bdd->query('SELECT id, id_chapter, description, author, DATE_FORMAT(date_post, \'Le %d/%m/%Y à %Hh %imin %ss\') AS date_post, report FROM comment
        WHERE id_chapter=:id_chapter
        ORDER BY id DESC
        LIMIT  12 OFFSET :offset');
         $this->bdd->bind(':id_chapter', $this->chapter_id);
         $this->bdd->bind(':offset', $start, PDO::PARAM_INT);

         return $this->bdd->resultset();
     }

     public function add($data, $author, $report){
        $msg = false;
        $this->bdd->query('INSERT INTO comment
        (id_chapter, description, author, date_post, report)
    VALUES (:id_chapter, :description,:author, NOW(), :report)');
        $this->bdd->bind(':id_chapter',             $this->chapter_id); 
        $this->bdd->bind(':description',            $data['description']);
        $this->bdd->bind(':author',                 $author);
        $this->bdd->bind(':report',                 $report);

        $this->bdd->execute();

        return $msg;
     }

     public function delete($id){

         $this->bdd->query('DELETE FROM comment WHERE comment.id=:id');
         $this->bdd->bind(':id', $id);
         $this->bdd->execute();
        // $this->Outil->redirect('b/chevaux/edit/'.$id);
     }

 }
