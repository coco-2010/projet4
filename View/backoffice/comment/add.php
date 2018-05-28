<?php

$Comment = new Comment();

$comment = null;
if(isset($_POST['modifier'])){
    $comment = $Comment->add($_POST);
}
?>

<div class="page-backoffice">
    <h2 class="page-header">Ajouter un nouveau commentaire</h1>
    

    <div class="">
        <div class="alert">
            <?php
               if (isset($_POST['modifier'])){
                $Comment->shownAlert();}
            ?>
        </div>
    </div>

    <div class="table-container ">
        <form method="POST">
                <div class=" form-group">
                    <label for="description" class="add-label">Commentaire</label>
                    <textarea class="add-textarea" class="description" name="description" rows="6"></textarea>
                </div>
            <button name="modifier" type="submit" value="modifier" class="button-add">Ajouter</button>
        </form>              
    </div>
</div>