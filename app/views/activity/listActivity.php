    <!-- Affichage d'une liste de toutes les activités -->
    <?php if (!empty($activities)): ?>
        <ul>
            <?php 
                foreach ($activities as $activity) {
                    echo '<li><a>' . $activity->getNom() . $activity->getDescription() . '</a></li>';
                }
            ?>
        </ul>
    <?php else: ?>
        <p>Aucune activité à afficher</p>
    <?php endif; ?>
    <!-- Partie de l'administrateur pour ajouter une activité -->
    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <h3>Ajout d'une activité</h3>
        <form action="/activity/listActivity" method="POST">
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
    <?php endif; ?>
