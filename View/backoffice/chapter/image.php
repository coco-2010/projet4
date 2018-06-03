<?php

$id = $Systeme->Config->param[0];

$dirname = "Theme/site/img/img_chapter";

$Image = new Image($id, $dirname);
?>
<style>
.album {
    min-height: 40rem; 
    background-color: #f7f7f7;
}
.card {
    float: left;
    width: 33.333%;
    padding: .75rem;
    margin-bottom: 2rem;
    border: 0;
}
.card > img {margin-bottom: .75rem;}

</style>



<div class="page-backoffice">

    <div class="">
        <div class="alert">
            <?php $Image->shownAlert() ?>
        </div>
    </div>

    <div class="album">
    <?php
        foreach($Image->file as $k => $v){
            echo "<div class='card'>";
                echo"<img src='$v->dir/$v->name' data-holder-rendered='true'>";
                echo "<a href='View/b/chapter/imageDel/$id' class='button-delete' role='button' >Supprimer</a>";
            echo "</div>";                                                                                                                           
        }
    ?>
</div>
<a href='View/b/chapter/imageAdd/<?= $id ?>' class='button-add' role='button' >Ajouter une image</a>
</div>