

<div class="page-backoffice">

    <div class="">
        <div class="alert">
            <?php //$Image->shownAlert() ?>
        </div>
    </div>

    <div class="album">
        <?php
        foreach($this->file as $k => $v){
            echo "<div class='card'>";
                echo"<img src='$v->dir/$v->name' class='img-card' data-holder-rendered='true'>";
                echo "<a href='b/chapter/imageDel/$this->chapter_id' class='button-delete' role='button' >Supprimer</a>";
            echo "</div>";                                                                                                                           
        }
        
        ?>
    </div>
    <div>
        <?php
        /* if ($Image->img_count <1){*/
                echo "<a href='b/chapter/imageAdd/$id ' class='button-edit' role='button' >Ajouter une image</a>";
            /*}*/
        ?>
    </div>
</div>