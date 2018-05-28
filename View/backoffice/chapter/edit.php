<?php

$Chapter = new Chapter();

$data = $Chapter->getData($Systeme->Config->param[0]);

$chapter = null;
if(isset($_POST['modifier'])){
    $chapter = $Chapter->edit($Systeme->Config->param[0],$_POST);
}

?>

<div class="page-backoffice">
    <h2 class="page-header">Chapitre : <b style="color: #DD2C00;"><?php echo $data->titre ?></b></h2>

    <div class="table-container">
        <form method="POST">
            <div class="form-group">
                <label for="titre" class="add-label">Titre</label>
                <input type="text" class="add-input" id="titre" name="titre" value="<?= $data->titre ?>">
            </div>
            <div class="form-group">
                <label for="description" class="add-label">Description</label>
                <textarea class="add-textarea" class="description" name="description" maxlength="636" rows="6"><?= $data->description ?></textarea>
            </div>

            <a href="View/b/chapter/image/<?= $Systeme->Config->param[0] ?>" class="button-add button-edit-img" role="button">Modifier les images</a>
            <button name="modifier" type="submit" value="modifier" class="button-add">Modifier</button>
        </form>
    </div>
</div>
           