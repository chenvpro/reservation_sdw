<!-- vue pour la connexion au site de réservation -->
<form action="/user/login" method="POST">
    <label for="email">Email : </label>
    <input type="email" name="email" id="email" placeholder="john.doe@gmail.com">
    <br>
    <label for="pwd">Mot de passe : </label>
    <input type="password" name="pwd" id="pwd">
    <br>
    <input type="submit" name="log_user" value="Se connecter">
</form>
