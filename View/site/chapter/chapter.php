<?php

$Chapter = new Chapter();
$Paginator = new Paginator();
//param
$param = (isset($_GET['param']))?intval($_GET['param']):1;
$param2 = null;
//nb de carte
$Paginator->total = $Chapter->nb();

// $this->link
    $link = "View/s/chapter/chapter";
?>

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
    <?php $allChapter = $Chapter->shownAd($param);
    foreach ($allChapter as $keys => $value){
        echo "<a href='View/s/chapter/see/$value->id_chapter' class='s-chapter'>
            <img class='s-card-img' src='$value->dir/$value->name' alt=''>
            <div class='s-text-chapter'>
                <h4 class=''>$value->titre</h4>";
        echo'       <p>'.substr($value->description, 0, 722).' ...</p>
                <p class="see-rest">Voir la suite</p>
            </div>
        </a>';
    }?>
    </div>
    <?php $Paginator->paginate($param, $param2, $link);?>
</section> 