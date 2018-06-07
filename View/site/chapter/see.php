<?php

//param
$param = (isset($_GET['param']))?intval($_GET['param']):1;
$param2 = (isset($_GET['param2']))?intval($_GET['param2']):1;

$Chapter= new Chapter();
$Comment = new Comment($param);
$Paginator = new Paginator();
$report = null;
//$author = "Visiteur";


$comment = null;
if(isset($_POST['modifier'])){
    $comment = $Comment->add($_POST, $report);
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
        <?php $detailChapter = $Chapter->shownDetailAd($Systeme->Config->param[0]);
        foreach ($detailChapter as $keys => $value){
            echo "
                <h2 id='title-see-detail'>$value->titre</h2>
                <img class=\"img-responsive\" id='img-see-detail' src='$value->dir/$value->name' alt=''>
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
    <div class="table-container">
        <form method="POST">
                <div id="form-comment">
                    <label for="description" id="label-comment">Laisser un commentaire</label>
                    <textarea class="add-textarea" id="description" name="description" rows="4" cols="7"></textarea>
                </div>
            <button name="modifier" type="submit" value="modifier" class="submit">Ajouter</button>
        </form>              
    </div>

    <?php $data = $Comment->shownAd($param2); 
    foreach ($data as $keys => $value){
        echo "
               <div class='comment'>
                   <p><span class='author-comment'>$value->author</span> - $value->date_post</p>
                   <div class='desc-comment'>$value->description</div>
                   <a class='report' href= 'View/s/chapter/report/$value->id'>Signaler</a>
               </div>";
    }?>
    <?php $Paginator->paginate($param,$param2,$link); ?>
</section>