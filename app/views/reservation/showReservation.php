<!-- Affichage des détails d'une réservation -->
<?php if (!empty($reservation)): ?>
    <?= '<p>ID de la réservation : </p>' . $reservation->getId(); ?>
    <?= '<p>ID de l\'activité :</p>' . $reservation->getActivityId(); ?>
    <?= '<p>Date de la réservation :</p>' . $reservation->getReservationDate(); ?>
    <?= '<p>Etat de la réservation :</p>' . $reservation->getState(); ?>
<?php endif; ?>

<?php if ($reservation->getState() > 0): ?>
    <form action="reservation/showReservation" method="PATCH">
        <label for="userId">Annuler la réservation</label>
        <input type="submit" name="cancel" value="Annuler">
    </form>
<?php else: ?>
    <form action="reservation/showReservation" method="POST">
        <label for="userId">Effectuer une réservation</label>
        <input type="submit" name="reserver" value="Réserver">
    </form>
<?php endif; ?>