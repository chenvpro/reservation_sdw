<?php
    class ReservationModel extends Bdd {
        public function createReservation(int $userId, int $activityId): bool {
            $sql = 'INSERT INTO reservation (user_id, activite_id, date_reservation, etat) VALUES (:user_id, :activite_id, NOW(), 1)';
            $params = [
                'user_id' => $userId,
                'activite_id' => $activityId
            ];

            $insert = $this->co->prepare($sql);
            return $insert->execute($params);
        }

        public function getReservationsByUserId(int $userId): array {
            $sql = 'SELECT * FROM reservation WHERE user_id = :user_id';
            $params = [
                'user_id' => $userId
            ];

            $select = $this->co->prepare($sql);
            $select->execute($params);

            return $select->fetchAll(PDO::FETCH_CLASS, 'Reservation');
        }

        public function cancelReservation(int $reservationId): bool {
            $sql = 'UPDATE reservation SET etat = 0 WHERE id_reservation = :id_reervation';
            $params = [
                'reservation_id' => $reservationId
            ];
            
            $update = $this->co->prepare($sql);
            return $update->execute($params);
        }
    }