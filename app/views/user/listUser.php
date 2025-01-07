<?php
    if (empty($users)) {
        echo "<p>Aucun utilisateur inscrit</p>";
    } else {
        foreach($users as $user) {
            echo "<p>" .$user->getNom() . $user->getPrenom() . $user->getEmail() . "</p>";
        }
    }