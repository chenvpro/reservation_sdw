<?php
    class Reservation {
        Use Render;

        /**
         * Méthode qui affiche les réservations de l'utilisateur connecté
         */
        public function index() {
            $reservationModel = new ReservationModel();
            $reservations = $reservationModel->getReservationsByUserId($_SESSION['user']['id']);
            
            $data = [
                'title' => 'Liste des réservations',
                'reservations' => $reservations,
            ]; 

            $this->renderView('reservation/userReservation', $data);
        }

        /**
         * Cette méthode créer une nouvelle réservation pour l'utilisateur connecté
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
         */
        public function show(int $id) {
            $reservationModel = new ReservationModel();
            $reservation = $reservationModel->getReservationsByUserId($id);
            
            $data = [
                'title' => 'Détail de la réservation',
                'reservation' => $reservation,
            ];

            $this->renderView('reservation/showReservation', $data);
        }

        /**
         * Cette méthode annule une réservation 
         * Changement de l'état de la réservation à 0
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