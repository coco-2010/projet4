<?php

$Comment = new Comment();

$id =$Systeme->Config->param[0];
$report = null;
 $Comment->edit($id, $report);
 


?>
 <script>
 document.location.href="View/b/comment/listing" 
 </script>
 
