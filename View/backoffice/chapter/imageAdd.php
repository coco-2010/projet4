<div class="page-backoffice">
    <div class="">
        <div class="alert">
            <?php//$Imageadd->shownAlert() ?>
        </div>
    </div>
    <div class="table-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img">Nouvelle Image</label>
                <input type="file" name="img"  id="img" class="form-control-file" />
            </div>
            <div class="form-group">
                <button name="add" type="submit" value="add" class="button-add">Add</button>
            </div>
            <div class="form-group">
                <a href='b/chapter/image/<?= $id ?>' class='button-add button-edit ' role='button' >Revenir a la liste des images</a>
            </div>

        </form>
    
    </div>
   
</div>
