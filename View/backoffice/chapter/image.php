

<div class="page-backoffice">

    <div class="">
        <div class="alert">
        <?php 
            echo "<div class='alert alert-$this->type' role='alert'>$this->msg</div>";
            ?>
        </div>
    </div>

    <div class="album">
        <?php
        foreach($this->file as $k => $v){
            echo "<div class='card'>";
                echo"<img src='$v->dir/$v->name' class='img-card' data-holder-rendered='true'>";
                echo "<a href='b/chapter/imageDel/$this->chapter_id' class='small-button button-red button-img' role='button' >Supprimer</a>";
            echo "</div>";                                                                                                                           
        }
        
        ?>
    </div>
    <div>
        <?php 
         if ($this->img_count <1){
                echo "<a href='b/chapter/imageAdd/$this->chapter_id ' class='link-button link-button-img' role='button' >Ajouter une image</a>";
        }
        ?>
    </div>
</div>