<?php
    class Reservation {
        public function index() {
            $reservationModel = new ReservationModel();
            $reservations = $reservationModel->getReservationsByUserId($_SESSION['user']['id']); // ! à vérifier et comprendre
            
            // ! afficher
        }

        public function create(int $activityId) {
            
        }

        public function show(int $id) {
            
        }

        public function cancel (int $id) {
            $reservationModel = new ReservationModel();
            $reservationModel->cancelReservation($id);
        
            // ! afficher
        }
    }