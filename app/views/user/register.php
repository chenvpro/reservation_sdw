<form action="/user/register" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="lastname" required>
    <br>
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="firstname" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" name="log_user" value="Se connecter">
</form>