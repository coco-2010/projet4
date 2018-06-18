<div class="page-backoffice">
    <h2 class="page-header">Ajouter un nouveau chapitre</h1>
    

    <div class="">
        <div class="alert">
             <?php echo "<div class='alert alert-$this->type' role='alert'>$this->msg</div>";
            ?>
        </div>
    </div>

    <div class="table-container ">
         <form method="post">
                <div class="form-group ">
                    <label for="titre" class="add-label">Titre</label>
                    <input type="text" class="add-input" id="titre" name="titre" required>
                </div>
                <div class=" form-group">
                    <label for="description" class="add-label">Description</label>
                    <textarea class="add-textarea" class="add-input" name="description" rows="6"></textarea>
                </div>
            <button name="modifier" type="submit" value="modifier" class="high-button">Ajouter</button>
        </form>              
    </div>
</div>