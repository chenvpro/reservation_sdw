<?php 
    if($logged === true){
      echo 'Connecté';
    }
    else{
      echo 'Pas connecté';
    }
?>

<form action="/user/login" method="POST">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="motdepasse">Mot de passe :</label>
    <input type="password" name="motdepasse" id="motdepasse" required>
    <br>
    <input type="submit" name="log_user" value="Se connecter">
</form>