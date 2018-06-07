<?php
$param = null;
$id =$Systeme->Config->param[0];

$Comment = new Comment($param);
 $Comment->delete($id);