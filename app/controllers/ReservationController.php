<?php
    class Reservation {
        Use Render;

        /**
         * Méthode qui affiche les réservations de l'utilisateur connecté
         * * validé
         */
        public function index() {
            $reservationModel = new ReservationModel();
            $reservations = $reservationModel->getReservationsByUserId($_SESSION['user']['id']);
            
            $data = [
                'title' => 'Liste des réservations',
                'content' => $reservations,
                'headerTitle' => 'Liste des réservations'
            ]; 

            $this->renderView('reservation/list', $data);
        }

        /**
         * Cette méthode créer une nouvelle réservation pour l'utilisateur connecté
         * * validé
         */
        public function create(int $activityId) {
            $reservationModel = new ReservationModel();
            $createReservation = $reservationModel->createReservation($_SESSION['user']['id'], $activityId);

            if ($createReservation) {
                echo "Réservation effectuée avec succès";
            } else {
                echo "Erreur lors de la réservation";
            }
        }

        /**
         * Méthode qui affiche les détails d'une réservation pour l'utilisateur connecté et affiche le formulaire ou un lien d'annulation
         * * validé
         */
        public function show(int $id) {
            
            $reservationModel = new ReservationModel();
            $reservation = $reservationModel->getReservationsByUserId($id);
            
            $data = [
                'title' => 'Détail de la réservation',
                'content' => $reservation,
                'headerTitle' => 'Détail de la réservation'
            ];

            $this->renderView('reservation/show', $data);
        }

        /**
         * Cette méthode annule une réservation 
         * Changement de l'état de la réservation à 0
         * * validé
         */
        public function cancel (int $id) {
            if ($_SESSION['user']['role'] === 'admin') {
                $db = new mysqli('localhost', 'root', "", "reservation_sdw");

                $sql = "UPDATE reservation SET etat = 0 WHERE id = $id";
                
                if ($db->query($sql) === TRUE) {
                    echo "réservation annulée avec succès";
                } else {
                    echo "Erreur d'annulation de la réservation";
                }

                $db->close();
            } else {
                echo "Vous n'avez pas les droits pour effectuer cette action";
            }
        }
    }