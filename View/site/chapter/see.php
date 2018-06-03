<?php

//param
$param = (isset($_GET['param']))?intval($_GET['param']):1;
$param2 = (isset($_GET['param2']))?intval($_GET['param2']):1;

$Chapter= new Chapter();
$Comment = new Comment($param);
$Paginator = new Paginator();
$report = null;
//$author = "Visiteur";
if( isset($_SESSION['name'])){
    $author = $_SESSION['name'];
}
else{
    $author = 'Visiteur';
}

$comment = null;
if(isset($_POST['modifier'])){
    $comment = $Comment->add($_POST, $author, $report);
}

//nb de carte
$Paginator->total = $Comment->nb();

// $this->link
    $link = "View/s/chapter/see";
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
    <div>
        <?php $Chapter->shownDetailAd($Systeme->Config->param[0]);?>
    </div>
</section>

<section>
    
</section>

<section id="section-comment">
    <div class="table-container">
        <form method="POST">
                <div id="form-comment">
                    <label for="description" id="label-comment">Laisser un commentaire</label>
                    <textarea class="add-textarea" id="description" name="description" rows="4" cols="7"></textarea>
                </div>
            <button name="modifier" type="submit" value="modifier" class="submit">Ajouter</button>
        </form>              
    </div>

    <?php $Comment->shownAd($param2); ?>
    <?php $Paginator->paginate($param,$param2,$link); ?>
</section>