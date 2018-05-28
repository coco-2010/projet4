<?php
 class Comment extends Outil {

     private $bdd;
     private $Outil;
     public $msgAlert;
    // public $paginator;
     public $id;

     function __construct($action = null){
         $this->bdd = new Database();
         $this->Outil = new Outil();
         $this->msgAlert = new stdClass();
        //$this->paginator = new Paginator();
         if($action == null)
             $this->Null();
     }

     public function getAllData(){
         $this->bdd->query('SELECT * FROM comment');
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
         $this->bdd->query('SELECT * FROM comment WHERE id=:id');
         $this->bdd->bind(':id', $id);
         return $this->bdd->single();
     }

    /* public function count(){
         $this->bdd->query('SELECT count(*) AS total FROM chapter
        LEFT JOIN rockymountain_img
        ON rockymountain.id = rockymountain_img.id_rockymountain');
         return $this->bdd->resultset();
     }*/

     public function nb(){
         $count = $this->count();
         $total = $count[0]->total;
         return $total;
     }

     public function edit($id, $data){
         $msg = false;

         $this->bdd->query('UPDATE comment SET
            description=:description
            WHERE id=:id');
         $this->bdd->bind(':description',            $data['description']);

         $this->bdd->bind(':id', $id);

         $this->bdd->execute();

         $this->Outil->redirect('b/edit/'.$id);

         return $msg;
     }

    /* public function shownAd($param){
     //    $data = $this->getAllDataImg($param);
         foreach ($data as $keys => $value){
             echo "
                    <div class='col-lg-4 col-sm-6 portfolio-item'>
                        <div class='card h-100'>
                            <img class='card-img-top' src='$value->dir/$value->name' alt=''>
                            <div class='card-body'>
                                <h4 class='card-title'>$value->titre</h4>
                                <p class='card-text'>$value->description</p>
                            </div>
                        </div>
                    </div>";
         }
     }*/

    /* public function getAllDataImg($param){
         $start = ($param -1)*$this->paginator->itemparPage;

         $this->bdd->query('SELECT * FROM rockymountain
        LEFT JOIN rockymountain_img
        ON rockymountain.id = rockymountain_img.id_rockymountain
        ORDER BY rockymountain.id DESC
        LIMIT  12 OFFSET :offset');
         $this->bdd->bind(':offset', $start, PDO::PARAM_INT);

         return $this->bdd->resultset();
     }*/

     public function add($data){
         $msg = false;

         $this->bdd->query('INSERT INTO comment
         (description)
        VALUES (:description)');
         $this->bdd->bind(':description',            $data['description']);

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
