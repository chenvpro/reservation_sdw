<!-- vue pour la création de compte -->
<form action="/user/create" method="POST">
    <label for="prenom">Prénom : </label>
    <input type="text" name="prenom" id="prenom" placeholder="John">
    <label for="nom">Nom : </label>
    <input type="text" name="nom" id="nom" placeholder="Doe">
    <label for="email">Email : </label>
    <input type="email" name="email" id="email" placeholder="john.doe@gmail.com">
    <br>
    <label for="pwd">Mot de passe : </label>
    <input type="password" name="pwd" id="pwd">
    <label for="role">Rôle : </label>
    <input type="text" name="role" id="role">
    <br>
    <input type="submit" name="create_user" value="Créer">
</form>