<?php

$Comment = new Comment();

$data = $Comment->getData($Systeme->Config->param[0]);

$comment = null;
if(isset($_POST['modifier'])){
    $comment = $Comment->edit($Systeme->Config->param[0],$_POST);
}

?>

<div class="page-backoffice">
    <h2 class="page-header">Commentaire : </h2>

    <div class="table-container">
        <form method="POST">
            <div class="form-group">
                <label for="description" class="add-label">Commentaire</label>
                <textarea class="add-textarea" class="description" name="description" maxlength="636" rows="6"><?= $data->description ?></textarea>
            </div>

            <a href="View/b/comment/image/<?= $Systeme->Config->param[0] ?>" class="button-add button-edit-img" role="button" >Modifier les images</a>
            <button name="modifier" type="submit" value="modifier" class="button-add">Modifier</button>
        </form>
    </div>
</div>
           