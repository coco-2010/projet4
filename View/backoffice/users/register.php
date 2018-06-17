<?php
$registerAuth = new registerAuth();
?>

<div class="container">
  <form class="form" method="POST">
  
    <input name="email" type="email" class="form-fields email" id="Email" placeholder="Adresse e-mail">

    <input name="password" type="password" class="form-fields" id="Password" placeholder="Mot de passe">
    
    <input name="password2" type="password" class="form-fields pass" id="Password2" placeholder="Confirmation mot de passe">
    
    <button name="register" type="submit" class="submit" value="register">Enregister</button>
  </form>
</div>
