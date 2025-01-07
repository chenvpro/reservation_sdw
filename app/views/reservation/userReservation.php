<?php  
    echo '<h3> Vous avez : ' . $reservations->count() . ' réservations </h3>';
    echo '<ul>';
    foreach ($reservations as $reservation) {
        echo '<li><p>ID de la réservation : </p>' . $reservation->getId() . '<p>ID de l\'activité :</p>' . $reservation->getActivityId() . '</li>';
    }
    echo '</ul>';

