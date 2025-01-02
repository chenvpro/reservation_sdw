<?php
    class Reservation {

        Use Render;

        public function index() {
            $reservationModel = new ReservationModel();
            $reservations = $reservationModel->getReservationsByUserId($_SESSION['user']['id']);
            
            $data = [
                'title' => 'Liste des réservations',
                'reservations' => $reservations,
                'isAdmin' => $_SESSION['user']
            ]; 

            $this->renderView('reservation/index', $data);
        }

        public function create(int $activityId) {
            $reservationModel = new ReservationModel();
            $createReservation = $reservationModel->createReservation($_SESSION['user']['id'], $activityId);

            $data = [
                'title' => 'Liste des réservations',
                'reservations' => $createReservation,
                'isAdmin' => $_SESSION['user']
            ];
            
            $this->renderView('reservation/list', $data);
        }

        public function show(int $id) {
            
            $reservationModel = new ReservationModel();
            $reservation = $reservationModel->getReservationsByUserId($id);
            
            $data = [
                'title' => 'Détail de la réservation',
                'reservation' => $reservation,
                'isAdmin' => $_SESSION['user']
            ];

            $this->renderView('reservation/show', $data);
        }

        public function cancel (int $id) {
            $reservationModel = new ReservationModel();
            $reservationModel->cancelReservation($id);
        
            // ! afficher
        }
    }