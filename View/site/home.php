<?php
$form = new Form;
?>

<header>
    <div id="container-header">
        <div id="title">
            <h1>Un billet simple pour l'alaska</h1>
            <p>Jean Forteroche</p>
            <a class="button" href="View/site/chapitre">Voir les chapitres</a>
        </div>
        <div id="register-login">
            <a class="button" href="View/site/inscription">Inscription</a>
            <a class="button" href="View/site/login">Connexion</a>
        </div>
        
    </div>
</header>

<section id="author">
    
    <div id="container-author">
    <h2 id="title-section">Auteur</h2>
        <div class="row">
            <div id="text">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit adipisci eveniet quis ad animi, 
                    at quod eos dolor explicabo necessitatibus ipsum impedit a sunt corporis vel, sit iure architecto doloribus! 
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia fugit nemo fugiat? Ad officia id nesciunt facere, 
                    impedit explicabo exercitationem autem officiis, omnis delectus, quibusdam quisquam reiciendis! Necessitatibus, nostrum nesciunt!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laborum, non rem est aliquid nisi officiis itaque veniam illo accusantium 
                    sapiente placeat aut perferendis illum saepe assumenda molestias distinctio minima.</p>
            </div>
            <div id="img-author">
                <img src="Theme/site/img/img_author.png" alt="Image jean Forteroche">
            </div>
        </div>
    </div>
</section>

<section id="chapter">
    <div id="container-chapter">
        <h2 id="title-section">Les derniers chapitre</h2>
        <div id="chapter">
            php
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