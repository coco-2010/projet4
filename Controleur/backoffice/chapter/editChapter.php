<?php 
class editChapter {
    public $id;

    function __construct(){
        $this->mod_chapter = new Mod_chapter();
        $this->Outil = new Outil();
        $id = $_GET['param'];
        
        $this->getData($id);

        if(isset($_POST['modifier'])){
            $this->edit($id,$_POST);
        }
    }

    //recupere les infos du chapitre
    public function getData($id){
        $chapter = $this->mod_chapter->getData($id);
        require "View/backoffice/chapter/edit.php";
        
    }

    //modifie le chapitre 
    public function edit($id,$data){
        $this->mod_chapter->edit($id, $data);
        $redirect = "/projet4/b/chapter/listingChapter";
        $this->Outil->redirect($redirect);
    }
}

