<?php
 class Chapter extends Outil {

    private $bdd;
    private $Outil;
    public $msgAlert;
    public $paginator;
    public $id;

    function __construct($action = null){
        $this->bdd = new Database();
        $this->Outil = new Outil();
        $this->msgAlert = new stdClass();
        $this->paginator = new Paginator();
        if($action == null)
            $this->Null();
    }

    public function getAllData(){
        $this->bdd->query('SELECT * FROM chapter ORDER BY id DESC');
        return $this->bdd->resultset();
    }

    private function Null(){
        $this->getAllData();

        $this->msgAlert->type = "info ";
        $this->msgAlert->msg = "Le nouveau chapitre à bien été enregistré";
    }

    public function shownAlert(){
        if(isset($this->msgAlert->type))
            $this->alert($this->msgAlert->type,$this->msgAlert->msg);
    }

    public function getData($id){
        $this->bdd->query('SELECT * FROM chapter WHERE id=:id');
        $this->bdd->bind(':id', $id);
        return $this->bdd->single();
    }

    public function count(){
        $this->bdd->query('SELECT count(*) AS total FROM chapter
    INNER JOIN chapter_img
    ON chapter.id = chapter_img.id_chapter');
        return $this->bdd->resultset();
    }

    public function nb(){
        $count = $this->count();
        $total = $count[0]->total;
        return $total;
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

        $this->Outil->redirect('b/edit/'.$id);

        return $msg;
    }

    public function add($data){
        $msg = false;

        $this->bdd->query('INSERT INTO chapter
            (titre, description) 
        VALUES (:titre, :description)');
        $this->bdd->bind(':titre',                  $data['titre']);
        $this->bdd->bind(':description',            $data['description']);

        $this->bdd->execute();

        return $msg;
    }

    public function delete($id){

        $this->bdd->query('DELETE FROM chapter WHERE chapter.id=:id');
        $this->bdd->bind(':id', $id);
        $this->bdd->execute();
    // $this->Outil->redirect('View/b/chapter/edit/'.$id);
    }

    public function shownAd($param){
        $data = $this->getAllDataImg($param);
        foreach ($data as $keys => $value){
            echo "<a href='View/s/chapter/see/$value->id_chapter' class='s-chapter'>
                <img class='s-card-img' src='$value->dir/$value->name' alt=''>
                <div class='s-text-chapter'>
                    <h4 class=''>$value->titre</h4>";
            echo'       <p>'.substr($value->description, 0, 722).' ...</p>
                    <p class="see-rest">Voir la suite</p>
                </div>
            </a>';
        }
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

    public function shownDetailAd($id){
        $data = $this->getAllDataImgprincipale($id);
        foreach ($data as $keys => $value){
            echo "
                <h2 id='title-see-detail'>$value->titre</h2>
                <img class=\"img-responsive\" id='img-see-detail' src='$value->dir/$value->name' alt=''>
                <div id='container-text-see'>
                <div id='text-see-detail'>$value->description</div>
                <p id='author-see-detail'>Jean Forteroche</p>
                </div>"; 
        }
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

    public function showLastChapter(){
        $data = $this->getLastChapter();
        foreach ($data as $keys => $value){
            echo "
                <a href='View/s/chapter/see/$value->id_chapter' class='s-last-chapter'>
                    <img src='$value->dir/$value->name' class='img-last-chapter' alt=''>
                    <div class='s-text-last-chapter' >
                        <h2>$value->titre</h2>";
            echo '      <p>'.substr($value->description, 0, 100).'...</p>
                        <p class="see-rest">Voir la suite</p> 
                    </div>
                </a>
            ';
        }
    }

}
