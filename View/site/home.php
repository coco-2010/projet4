<header id="header-home">
    <div id="container-header">
        <div id="title">
            <h1>Un billet simple pour l'alaska</h1>
            <p>Jean Forteroche</p>
            <a class="button" href="s/chapter/shownChapter">Voir les chapitres</a>
        </div>
        <div id="register-login">
            <a class="button" href="b/users/loginAuth">Connexion</a>
        </div>
        
    </div>
</header>

<section id="author">
    
    <div id="container-author">
    <h2 id="title-section">Auteur</h2>
        <div class="row">
            <div id="text">
                <div id="text-center">
                <p class="p-text">Bonjour, je m'appelle Jean Forteroche. <p/>
                <p class="p-text">Ecrivain et aventurier, je m'aventure dans les contrées reculées du globe pour vous les faire découvrir à travers mes romans. </p>
                <p class="p-text">Je publirais mon roman "Un billet simple pour l'Alaska" par chapitre sur ce blog pour que vous puissiez découvrir mes aventures dans cette région inhospitalière du nord-ouest du Canada.  </p>
                <p class="p-text">Bonne lecture </p>
                </div>
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
            <?php 
            foreach ($lastChapter as $keys => $value){
                echo "
                    <a href='s/chapter/showDetailChapter/$value->id_chapter' class='s-last-chapter'>
                        <img src='$value->dir/$value->name' class='img-last-chapter' alt=''>
                        <div class='s-text-last-chapter' >
                            <h2>$value->titre</h2>";
                echo '      <div>'.substr($value->description, 0, 200).'...</div>
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
            <h2 id="title-section">Me contacter</h2>

            <input name="name" type="text" class="form-fields name" placeholder="Nom / prenom" required autofocus>

            <input name="email" type="email" class="form-fields email" placeholder="Adresse e-mail" required autofocus>

            <input name="subject" type="subject" class="form-fields name" placeholder="Sujet" required>
            
            <textarea name="textarea" rows="5" class="form-fields message" placeholder="Message" required></textarea>
            
            <button name="submit" class="submit" type="submit">Envoyer</button>
        </form>
    </div>
</section>