<?php

$id = $Systeme->Config->param[0];
$dirname = "Theme/site/img/img_chapter";

$Image = new Image($id, $dirname, "add");

$Image->delete();