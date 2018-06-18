<header id="header-chapter">
    <div id="container-header-chapter">
        <div  id="title-chapter">
            <h1 id="title-header-chapter">Un billet simple pour l'alaska</h1>
            <p>Jean Forteroche</p>
        </div>
    </div>
</header>

<section>
    <div>
        <?php 
        foreach ($detailChapter as $keys => $value){
            echo "
                <h2 id='title-see-detail'>$value->titre</h2>
                <img class='img-responsive' id='img-see-detail' src='/projet4/$value->dir/$value->name' alt=''>
                <div id='container-text-see'>
                <div id='text-see-detail'>$value->description</div>
                <p id='author-see-detail'>Jean Forteroche</p>
                </div>";
        }?>
    </div>
</section>

<section>
    
</section> 
    
<section id="section-comment">
    <div class="">
        <div class="alert">
            <?php echo "<div class='alert alert-$type' role='alert'>$msg</div>";
            ?>
        </div>
    </div>
    <div class="table-container">
        <form method="POST">
            <div id="form-comment">
                <h3>Laisser un commentaire</h3>
                <label for="pseudo" class="label-comment">Pseudo (Optionnel)</label>
                <input type="text" id="input-pseudo" name="pseudo">
                <label for="description" id="label-comment">Commentaire</label>
                <textarea class="add-textarea" id="description" name="description" rows="4" cols="7" required></textarea>
            </div>
            <button name="modifier" type="submit" value="modifier" class="submit">Ajouter</button>
        </form>              
    </div>

    <?php 
    foreach ($data as $keys => $value){
        echo "
               <div class='comment'>
                   <p><span class='author-comment'>$value->author</span> - $value->date_post</p>
                   <div class='desc-comment'>$value->description</div>
                   <a class='report' href= 's/comment/reportComment/$value->id'>Signaler</a>
               </div>";
    }?>
</section>