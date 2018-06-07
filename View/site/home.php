<?php
$form = new Form;
$Chapter = new Chapter();
$Outil= new Outil();
if(isset($_POST)){
     $Outil->contact($_POST);

}

?>
<header id="header-home">
    <div id="container-header">
        <div id="title">
            <h1>Un billet simple pour l'alaska</h1>
            <p>Jean Forteroche</p>
            <a class="button" href="View/s/chapter/chapter">Voir les chapitres</a>
        </div>
        <div id="register-login">
            <a class="button" href="View/s/register">Inscription</a>
            <a class="button" href="View/s/login">Connexion</a>
        </div>
        
    </div>
</header>

<section id="author">
    
    <div id="container-author">
    <h2 id="title-section">Auteur</h2>
        <div class="row">
            <div id="text">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus eveniet incidunt ad aliquam corporis, sunt qui tempore assumenda totam cupiditate aspernatur, quaerat odit maiores sapiente eligendi tempora. Deserunt, eos eveniet. </p>
            </div>
            <div id="img-author">
                <img id="img" src="Theme/site/img/img_author.jpg" alt="Image jean Forteroche">
            </div>
        </div>
    </div>
</section>

<section id="chapter">
    <div id="container-chapter">
        <h2 id="title-section">Les derniers chapitres</h2>
        <div id="last-chapter-all">
            <?php $lastChapter = $Chapter->showLastChapter();
            foreach ($lastChapter as $keys => $value){
                echo "
                    <a href='View/s/chapter/see/$value->id_chapter' class='s-last-chapter'>
                        <img src='$value->dir/$value->name' class='img-last-chapter' alt=''>
                        <div class='s-text-last-chapter' >
                            <h2>$value->titre</h2>";
                echo '      <p>'.substr($value->description, 0, 100).'...</p>
                            <p class="see-rest">Voir la suite</p> 
                        </div>
                    </a>
                ';
            }?>
        </div>
    </div>
</section>

<section id="contact">
    <div id="container-contact">
        <form class="form" method="POST">
            <?= $form->CSRF($_SESSION["CSRF_token"]) ?>
            <h2 id="title-section">Me contacter</h2>

            <input name="name" type="text" class="form-fields name" placeholder="Nom / prenom" required autofocus>

            <input name="email" type="email" class="form-fields email" placeholder="Adresse e-mail" required autofocus>
            
            <textarea name="textarea" rows="5" class="form-fields message" placeholder="Message" required></textarea>
            
            <button name="submit" class="submit" type="submit">Envoyer</button>
        </form>
    </div>
</section>