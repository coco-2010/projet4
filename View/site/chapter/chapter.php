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
        <?php $Chapter->shownAd($param);?>
    </div>
    <?php $Paginator->paginate($param, $param2, $link);?>
</section>