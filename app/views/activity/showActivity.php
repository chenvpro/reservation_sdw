Cette méthode permet d'afficher les détails d'une activité et affiche le formulaire de réservation
Si l'utilisateur est un administrateur, il peut modifier ou supprimer l'activité 

<?php
    /* Affichage du détail d'une activité */
    echo '<p>' . $activityDetails->getId() . $activityDetails->getNom() . $activityDetails->getTypeId() . $activityDetails->getPlacesDisponibles() . $activityDetails->getDescription() . $activityDetails->getDatetimeDebut() . $activityDetails->getDuree() . '</p>';
    /* Partie admin modification ou suppression de l'activité */

    if ($_SESSION['user']['role'] === 'admin'): ?>
        <!-- Permet de modifier l'activité -->
        <form action="/activity/showActivity" method="PATCH">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="type_id">Type ID :</label>
            <input type="text" name="type_id" id="type_id">
            <br>
            <label for="places_disponibles">places disponibles</label>
            <input type="text" name="places_disponibles" id="places_disponibles">
            <br>
            <label for="description">Description :</label>
            <input type="text" name="description" id="description">
            <br>
            <label for="datetime_debut">Date de début :</label>
            <input type="text" name="datetime_debut" id="datetime_debut">
            <br>
            <label for="duree">Durée :</label>
            <input type="text" name="duree" id="duree">
            <br>
            <input type="submit" value="Modifier">
        </form>
        <!-- Permet de supprimer l'activité -->
        <form action="activity/showActivity" method="DELETE">
            <input type="submit" value="Supprimer l'activité">
        </form>
    <?php endif; ?>

