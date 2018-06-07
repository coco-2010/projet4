<?php

$id = $Systeme->Config->param[0];

$dirname = "Theme/site/img/img_chapter";

$image = new Image($id, $dirname);
?>



<div class="page-backoffice">

    <div class="">
        <div class="alert">
            <?php $image->shownAlert() ?>
        </div>
    </div>

    <div class="album">
    <?php
        foreach($image->file as $k => $v){
            echo "<div class='card'>";
                echo"<img src='$v->dir/$v->name' data-holder-rendered='true'>";
                echo "<a href='View/b/chapter/imageDel/$id' class='button-delete' role='button' >Supprimer</a>";
            echo "</div>";                                                                                                                           
        }
    ?>
</div>
<a href='View/b/chapter/imageAdd/<?= $id ?>' class='button-add' role='button' >Ajouter une image</a>
</div>