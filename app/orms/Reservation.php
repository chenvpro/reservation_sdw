<?php
    class Reservation {
        private int $id;
        private int $user_id;
        private int $activite_id;
        private string $date_reservation;
        private bool $etat;
    
        public function getId(): int {
            return $this->id;
        } 

        public function setUserId(int $user_id): self {
            $this->user_id = $user_id;
            return $this;
        }
        public function getUserId(): int {
            return $this->user_id;
        }

        public function setActiviteId(int $activite_id): self {
            $this->activite_id = $activite_id;
            return $this;
        }
        public function getActiviteId(): int {
            return $this->activite_id;
        }

        public function setDataReservation(string $date_reservation): self {
            $this->date_reservation = $date_reservation;
            return $this;
        }
        public function getDataReservation(): string {
            return $this->date_reservation;
        }

        public function setEtat(bool $etat): self {
            $this->etat = $etat;
            return $this;
        }
        public function getEtat(): bool {
            return $this->etat;
        }
    }
?>