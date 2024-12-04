<?php
    class ActiviteModel {
        public function getAllActivities(): array {
            $activities = $this->co->prepare('SELECT nom FROM activities');
            $activities->execute();

            return $activities->fetchAll(PDO::FETCH_CLASS, 'activities');
        }

        public function getActivityById(int $id): array {
            $activitie = $this->co->prepare('SELECT nom FROM activities WHERE id = :id LIMIT 1');
            $activitie->setFetchMode(PDO::FETCH_CLASS, 'activities');
            $activitie->execute([
            'id' => $id
            ]);
        
            return $activitie->fetch();
        }

        public getPlacesLeft(): int {
            $users = $this->co->prepare('SELECT place_disponibles FROM activities');
            $users->execute();
        
            return $users->fetchAll(PDO::FETCH_CLASS, 'activities');
        }
    }