<?php
$form = new Form();
$Auth = new Auth();

$register = null;
if(isset($_POST['register'])){
	
	if($_SESSION['CSRF_token'] == $_POST['CSRF_token']) {
		var_dump($_POST);
		$register = $Auth->register($_POST);
        if($register === true){
        	$Outil->Redirect();
        }
	}
}
?>

<div class="container">
  <form class="form" method="POST">
    <?= $form->CSRF($_SESSION["CSRF_token"]) ?>
  
    <input name="email" type="email" class="form-fields email" id="Email" placeholder="Adresse e-mail">

    <input name="password" type="password" class="form-fields" id="Password" placeholder="Mot de passe">
    
    <input name="password2" type="password" class="form-fields pass" id="Password2" placeholder="Confirmation mot de passe">
    
    <button name="register" type="submit" class="submit" value="register">Enregister</button>
  </form>
</div>
