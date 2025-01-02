<?php if (!empty($content)): ?>
    <ul>
        <?php foreach ($content as $reservation): ?>
            <li>
                Réservation ID: <?= htmlspecialchars($reservation->getId()) ?>,
                Utilisateur ID: <?= htmlspecialchars($reservation->getUserId()) ?>,
                Activité ID: <?= htmlspecialchars($reservation->getActiviteId()) ?>,
                Date de réservation: <?= htmlspecialchars($reservation->getDataReservation()) ?>,
                État: <?= htmlspecialchars($reservation->getEtat() ? 'Active' : 'Annulée') ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune réservation à afficher</p>
<?php endif; ?>