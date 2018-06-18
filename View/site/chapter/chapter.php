<header id="header-chapter">
    <div id="container-header-chapter">
        <div  id="title-chapter">
            <h1 id="title-header-chapter">Un billet simple pour l'alaska</h1>
            <p>Jean Forteroche</p>
        </div>
    </div>
</header>
 
<section>
    <div id="container-chapter-all">
    <?php 
    foreach ($allChapter as $keys => $value){
        echo "<a href='s/chapter/showDetailChapter/$value->id_chapter' class='s-chapter'>
            <img class='s-card-img' src='/projet4/$value->dir/$value->name' alt=''>
            <div class='s-text-chapter'>
                <h4 class=''>$value->titre</h4>";
        echo'       <div class="owerflow">'.substr($value->description, 0, 722).' ...</div>
                <p class="see-rest">Voir la suite</p>
            </div>
        </a>';
    }?>
    </div>
</section> 