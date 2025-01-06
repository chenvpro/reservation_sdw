<?php
    class ActiviteModel extends Bdd {
        /**
         * @return array
         * 
         * Récupère toutes les activités
         * retourne un tableau
         */
        public function getAllActivities(): array {
            $sql = 'SELECT * FROM activities';

            $select = $this->co->prepare($sql);
            $select->execute();

            return $select->fetchAll();
        }

        /**
         * @param int $id
         * @return array
         * 
         * Récupère une activité en fonction de son id
         * retourne un tableau
         */
        public function getActivityById(int $id): array {
            $sql = 'SELECT * FROM activities WHERE id = :id';
            $params = [
                'id' => $id 
            ];

            $select = $this->co->prepare($sql);
            $select->execute($params);

            return $select->fetch();
        }

        /**
         * @param int $id
         * @return int
         * 
         * Cette méthode permet de récupérer les places disponibles d'une activité
         * retourne un entier
         */
        public function getPlacesLeft(int $id): int {
            $sql = 'SELECT places_disponibles FROM activities WHERE id = :id';
            $params = [
                'id' => $id
            ];

            $select = $this->co->prepare($sql);
            $select->execute($params);

            return (int) $select->fetchColumn();
        }
    }