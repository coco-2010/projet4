<?php

$id =$Systeme->Config->param[0];

$Comment = new Comment();
 $Comment->delete($id);