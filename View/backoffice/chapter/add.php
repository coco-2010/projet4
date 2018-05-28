<?php

$Chapter = new Chapter();

$chapter = null;
if(isset($_POST['modifier'])){
    $chapter = $Chapter->add($_POST);
}
?>

<div class="page-backoffice">
    <h2 class="page-header">Ajouter un nouveau chapitre</h1>
    

    <div class="">
        <div class="alert">
            <?php
               if (isset($_POST['modifier'])){
                $Chapter->shownAlert();}
            ?>
        </div>
    </div>

    <div class="table-container ">
        <form method="POST">
                <div class="form-group ">
                    <label for="titre" class="add-label">Titre</label>
                    <input type="text" class="add-input" id="titre" name="titre">
                </div>
                <div class=" form-group">
                    <label for="description" class="add-label">Description</label>
                    <textarea class="add-textarea" class="description" name="description" rows="6"></textarea>
                </div>
            <button name="modifier" type="submit" value="modifier" class="button-add">Ajouter</button>
        </form>              
    </div>
</div>