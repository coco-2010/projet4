<?php
class Systeme extends Outil
{
    private $bdd;
    private $Permission;

    public  $Config;

    public function __construct($base = null, $folder ,$module, $directory, $page, $param){
        $this->bdd                  = new Database();
        $this->Permission           = new Permission();

        if($module == null){$module = "site";}

        $m = $this->selectFolder($this->verifVar($module));

        $this->Config               = new stdClass();
        $this->Config->base         = $base;
        $this->Config->folder       = $this->verifVar($folder); ;
        $this->Config->module       = $m;
        $this->Config->directory    = $this->verifVar($directory);
        $this->Config->page         = $this->verifVar($page);
        $this->Config->param        = explode("-", $this->verifVar($param));

        $this->Config->theme        = $m ;

        $this->allowDisplay();
    }

    private function selectFolder($module){
        if($module == "b")return "backoffice";
        else return "site";
    }

    public function allowDisplay(){
        include "Theme/". $this->Config->theme ."/inc/head.php";

        if ($this->Config->module == "backoffice"){
            if($this->Permission->access("backoffice") == true){
                $this->displayHeader();
                $this->displayContent();
                $this->displayFooter();
            }else
                $this->displayContentLogin();
        }elseif ($this->Config->module == "site"){
            $this->displayHeader();
            $this->displayContent();
            $this->displayFooter();
        }else
            include($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/'. $this->Config->folder .'/site/home.php');
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
            if(file_exists($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/'. $this->Config->folder .'/'. $this->Config->module.'/'. $this->Config->page .'.php')){
                include($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/'. $this->Config->folder .'/'. $this->Config->module.'/'. $this->Config->page .'.php');
            } 
            else if (file_exists($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/'. $this->Config->folder .'/'. $this->Config->module .'/'. $this->Config->directory .'/'. $this->Config->page .'.php')){
                include($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/'. $this->Config->folder .'/'. $this->Config->module .'/'. $this->Config->directory .'/'. $this->Config->page .'.php');
            }
                
        }else
            include($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/View/'. $this->Config->module .'/home.php');
    }
    //dipslay login contant
    public function displayContentLogin(){
        include($_SERVER["DOCUMENT_ROOT"] .'/'. $this->Config->base .'/'. $this->Config->folder .'/'. $this->Config->module .'/login.php');
    }

    //Affiche le Footer
    private function displayFooter(){
        include "Theme/". $this->Config->theme ."/inc/footer.php";
    }

}