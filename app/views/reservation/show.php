<!-- Affichage des détails d'une réservation -->
<?php if (!empty($reservation)): ?>
    <?= htmlspecialchars($reservation['activite_id']) ?>
    <?= htmlspecialchars($reservation['date_reservation']) ?>
    <?= htmlspecialchars($reservation['etat']) ?>
<?php endif; ?>
<form action="POST">
    <label for="userId">Annuler</label>
    <input type="submit" name="cancel" value="Annuler">
</form>