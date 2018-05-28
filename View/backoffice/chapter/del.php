<?php

$id =$Systeme->Config->param[0];

$Chapter = new Chapter();
 $Chapter->delete($id);
