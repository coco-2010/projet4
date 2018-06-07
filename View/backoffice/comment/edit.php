<?php
$param = null;
$Comment = new Comment($param);

$id =$Systeme->Config->param[0];
$report = null;
 $Comment->edit($id, $report);
 


?>
 <script>
 document.location.href="View/b/comment/listing" 
 </script>
 
