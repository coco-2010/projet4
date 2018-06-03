
<?php
$param = null;
$Comment = new Comment($param);
$id =$Systeme->Config->param[0];
$report = 1;
var_dump($id);
var_dump($report);
$Comment->edit($id, $report);

?>

<?php
header("location:".  $_SERVER['HTTP_REFERER']); 
?>