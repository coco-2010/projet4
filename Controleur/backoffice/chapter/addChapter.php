<?php 
class addChapter extends Outil{
    public $msgAlert;
    public $outil;
    public $type;
    public  $msg;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Outil = new Outil();
        $this->msgAlert = new stdClass();
        $this->paginator = new Paginator();
        $this->msg = null;
        $this->type = null;

        $this->alertChapter();
        if(isset($_POST['modifier'])){
            $this->add($_POST);
        }
        
        require  "View/backoffice/chapter/add.php";
    }

    public function shownAlert(){
        if(isset($this->msgAlert->type))
        $this->msg = $this->msgAlert->msg;
        $this->type = $this->msgAlert->type;
    }

    private function alertChapter(){
        $this->msgAlert->type = "info ";
        $this->msgAlert->msg = "Le nouveau chapitre à bien été enregistré";
    }

    //ajoute un chapitre
    public function add(){
        $post = trim($_POST['description']);
        $title = trim($_POST['titre'] );

        if(!empty ($post) && !empty ($title)){ 
            $this->mod_chapter->add($post, $title );

            if (isset($_POST['modifier'])){
                $this->shownAlert();
            }
        }
         
    }

}