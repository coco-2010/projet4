<div class="page-backoffice">
    <h2 class="page-header">Chapitre : <b style="color: #DD2C00;"><?php echo $chapter->titre ?></b></h2>

    <div class="table-container">
        <form method="POST">
            <div class="form-group">
                <label for="titre" class="add-label">Titre</label>
                <input type="text" class="add-input" id="titre" name="titre" value="<?= $chapter->titre ?>">
            </div>
            <div class="form-group">
                <label for="description" class="add-label">Description</label>
                <textarea class="add-textarea" class="description" name="description" maxlength="636" rows="6"><?= $chapter->description ?></textarea>
            </div>

            <a href="b/chapter/image/<?= $chapter->id ?>" class="link-button" role="button">Modifier les images</a>
            <button name="modifier" type="submit" value="modifier" class="high-button">Modifier</button>
        </form>
    </div>
</div>

