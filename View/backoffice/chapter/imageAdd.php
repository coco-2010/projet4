<div class="page-backoffice">
    <div class="">
        <div class="alert">
        <?php 
            echo "<div class='alert alert-$this->type' role='alert'>$this->msg
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button></div>";
            ?>
        </div>
    </div>
    <div class="table-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img">Nouvelle Image</label>
                <input type="file" name="img"  id="img" class="form-control-file" />
            </div>
            <div class="form-group">
                <button name="add" type="submit" value="add" class="high-button">Add</button>
            </div>
            <div class="form-group">
                <a href='b/chapter/image/<?= $id ?>' class='link-button button-img-back' role='button' >Revenir a la liste des images</a>
            </div>

        </form>
    
    </div>
   
</div>
