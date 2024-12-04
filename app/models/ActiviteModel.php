<?php
    class ActiviteModel extends Bdd {
        public function getAllActivities(): array {
            $activities = $this->co->prepare('SELECT nom FROM activities');
            $activities->execute();

            return $activities->fetchAll(PDO::FETCH_CLASS, 'activities');
        }

        public function getActivityById(int $id): array {
            $activity = $this->co->prepare('SELECT nom FROM activities WHERE id = :id LIMIT 1');
            $activity->setFetchMode(PDO::FETCH_CLASS, 'activities');
            $activity->execute([
            'id' => $id
            ]);
        
            return $activity->fetch();
        }

        public getPlacesLeft(): int {
            $placesLeft = $this->co->prepare('SELECT place_disponibles FROM activities');
            $placesLeft->execute();
        
            return $placesLeft->fetchAll(PDO::FETCH_CLASS, 'activities');
        }
    }