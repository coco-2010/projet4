<?php
class reportComment extends Outil {

    function __construct(){
        $this->mod_comment  = new Mod_comment();
        $this->edit();
    }
    
    public function edit(){
        $id = $_GET['param'];
        $report = 1;
        $this->mod_comment->edit($id, $report);
        require "View/site/chapter/report.php";
    }
}

