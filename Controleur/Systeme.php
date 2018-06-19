<?php
class Systeme extends Outil
{
    private $bdd;
    private $Permission;

    public  $Config;


    public function __construct($base = null, $folder ,$module, $page, $param, $param2){
        $this->bdd                  = new Database();


        $f = $this->selectFolder($this->verifVar($folder));

        $this->Config               = new stdClass();
        $this->Config->base         = $base;
        $this->Config->folder       = $f;
        $this->Config->module       = $this->verifVar($module);
        $this->Config->page         = $this->verifVar($page);
        $this->Config->param        = explode("-", $this->verifVar($param));
        $this->Config->param2       = explode("-", $this->verifVar($param2));

        $this->Config->theme        = $f ;

        if (!isset($page) && $folder ==  "s" || !isset( $folder) ){
            $lastChapter = new lastChapter;
            $Outil = new Outil;
        }
        else if (!isset($page) && $folder == "b" && !isset($_SESSION['email'])){
            $loginAuth = new loginAuth();
        }
       
        else{
            switch($page) {
                //site
                case "shownChapter": 
                    $shownChapter = new shownChapter();
                    break;
                case "showDetailChapter": 
                    $showDetailChapter= new showDetailChapter();
                    break;
                case "reportComment":
                    $reportComment = new reportComment();
                    break;

                //backoffice
                case "loginAuth":
                    $loginAuth = new loginAuth();
                    break;
                case "disconnect":
                    $disconnection = new disconnection();
                    break;
                case "addChapter":
                    $addChapter = new addChapter();
                    break;
                case "delChapter":
                    $delChapter = new delChapter();
                    break;
                case "editChapter": 
                    $editChapter  = new editChapter();
                    break;
                case "listingChapter":
                    $listingChapter = new listingChapter();
                    break; 
                
                case "image":
                    $Image = new Image();
                    break;
                case "imageAdd":
                    $imageAdd = new imageAdd();
                    break;
                case "imageDel":
                    $imageDel = new imageDel();
                    break;
                case "listingComment": 
                    $listingComment = new listingComment();
                    break;
                case "editComment":
                    $editComment = new editComment();
                    break;
                case "delComment":
                    $delComment = new delComment();
                    break;
            }
        }

        $this->allowDisplay();
    }

    private function selectFolder($folder){
        if($folder == "b") return "backoffice";
        else return "site";
    }

    public function allowDisplay(){
        include "Theme/". $this->Config->theme ."/inc/head.php";

        if ($this->Config->folder == "backoffice"){
            if(isset($_SESSION['email'])){
                $this->displayHeader();
                $this->displayContent();
                $this->displayFooter();
            }else
                $this->displayContentLogin();
        }elseif ($this->Config->folder == "site"){
            $this->displayHeader();
            $this->displayContent();
            $this->displayFooter();
        }else
            include($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'Controleur/'. $this->Config->folder .'/home/lastChapter.php'); 
    }

    //Affiche le Header
    private function displayHeader(){
        include "Theme/". $this->Config->theme ."/inc/nav.php";
    }
    //Affiche le Content
    public function displayContent(){
        $Systeme = $this;
        $Outil = new Outil();

        if($this->Config->page != null){
            if(file_exists($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'Controleur/'. $this->Config->folder .'/'. $this->Config->module .'/'. $this->Config->page .'.php')){
                include_once($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'Controleur/'. $this->Config->folder .'/'. $this->Config->module .'/'. $this->Config->page .'.php');
            }
            else{
                $redirect = "s/home/lastChapter";
                $Outil->redirect();
                include_once($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'Controleur/site/home/lastChapter.php');var_dump(1);
            }
                
        }else{
            if($this->Config->folder == "backoffice"){
                include_once($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'View/'. $this->Config->folder .'/home.php');
            }
            else
                include_once($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'Controleur/site/home/lastChapter.php');
        }

            
    }
    //dipslay login contant
    public function displayContentLogin(){
        include_once($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/Controleur/'. $this->Config->folder .'/users/loginAuth.php');
    }

    //Affiche le Footer
    private function displayFooter(){
        include "Theme/". $this->Config->theme ."/inc/footer.php";
    }

}