<?php
    class ReservationModel extends Bdd {
        public function createReservation(int $userId, int $activityId) {
            $userId = htmlspecialchars(trim($POST['user_id']));
            $activityId = htmlspecialchars(trim($POST['activite_id']))

            $sql = 'INSERT INTO reservations(user_id, activite_id) VALUES (:userId, :activiteId)';
            $params = [
                'user_id' => $userId,
                'activite_id' => $activiteId
            ];

            $insert = $this->co->prepare($sql);
            $insert->execute($params);

            return true;
        }

        public function getReservationByUserId(int $userId): array {
            $userId = htmlspecialchars(trim($POST['user_id']));

            $sql = 'SELECT * FROM reservations WHERE user_id = :userId'
            $params = [
                'user_id' => $userId
            ];

            $select = $this->co->prepare($sql);
            $select->execute($params);
        }

        public function cancelReservation(int $reservationId): bool {
            $reservationId = htmlspecialchars(trim($POST['id']));

            $sql = 'DELETE * FROM reservations WHERE id = :reservationId'.
            $params = [
                'id' = $reservationId
            ];

            $delete = $this->co->prepare($sql);
            $delete->execute($params);
        }
    }