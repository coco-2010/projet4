<?php
$form = new Form();
$Auth = new Auth();
$Outil = new Outil();


//$login = null;
if(isset($_POST['login'])){
    if($_SESSION['CSRF_token'] == $_POST['CSRF_token']) {
        $login = $Auth->login($_POST);
        if($login === true){
            if(isset($_POST['remember'])){
                $mdp = $_POST['password'];
                $password = sha1($Auth->salt.$mdp);
                $Cookie->Set('annonce_email', $_POST['email'], time() + 86400 * 365);
                $Cookie->Set('annonce_password', $password, time() + 86400 * 365);
            }
        }
    }
}
?>


<div class="container">
    <form class="form" method="POST">
        <?= $form->CSRF($_SESSION["CSRF_token"]) ?>
        <h2 id="title-login">Connectez-vous</h2>

        <input name="email" type="email" class="form-fields email" placeholder="Adresse e-mail" required autofocus>
        
        <input name="password" type="password" class="form-fields pass" placeholder="Mot de passe" required>

        <div class="checkbox">
            <label><input type="checkbox" value="remember-me"> Rester connecté</label>
        </div>
        <button name="login" class="submit" type="submit">Connexion</button>
    </form>
</div>