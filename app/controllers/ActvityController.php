<?php
    class ActivityController {
        use Render;

        /**
         * @return void
         * Cette méthode permet d'afficher toutes les activités
         * Si l'utilisateur est un administrateur, il peut ajouter une activité
         * * Validé
         */
        public function index() {
            $activityModel = new ActiviteModel();
            $activities = $activityModel->getAllActivities();
            
            $data = [
                'title' => 'Liste des activités',
                'content' => $activities,
                'headerTitle' => 'Liste des activités'
            ];

            $this->renderView('activity/show', $data);
        }

        /**
         * @return void
         * Cette méthode permet d'afficher les détails d'une activité et affiche le formulaire de réservation
         * Si l'utilisateur est un administrateur, il peut modifier ou supprimer l'activité 
         * ! non fini
         */
        public function show(int $id) {
            $activityModel = new ActiviteModel();
            $activityDetails = $activityModel->getActivityById($id);

            $data = [
                'title' => 'Détails de l\'activité',
                'content' => $activityDetails,
            ];

            if ($_SESSION['user']['role'] === 'admin') {
                $this->renderView('activity/show', $data);
            }
        }

        /**
         * Méthode qui permet d'éditer une activité
         * Page visible uniquement par les administrateurs
         * * validé
         */
        public function update(int $id, array $data) {
            if ($_SESSION['user']['role'] === 'admin') {
                $db = new mysqli('localhost', 'root', "", "reservation_sdw");
                
                $name = $db->real_escape_string($data['name']);
                $type_id = $db->real_escape_string($data['type_id']);
                $places_disponibles = $db->real_escape_string($data['places_disponibles']);
                $description = $db->real_escape_string($data['description']);
                $datetime_debut = $db->real_escape_string($data['datetime_debut']);
                $duree = $db->real_escape_string($data['duree']);

                $sql = "UPDATE activities SET name = '$name', type_id = '$type_id', places_disponibles = '$places_disponibles', description = '$description', datetime_debut = '$datetime_debut', duree = '$duree' WHERE id = $id";
                
                if ($db->query($sql) === TRUE) {
                    echo "Succès de la mise à jour";
                } else {
                    echo "Erreur dans la mise à jour";
                }

                $db->close();
            } else {
                echo "Vous n'avez pas les droits pour effectuer cette action";
            }
        }


        /**
         * Permet de supprimer une activité
         * Page visible et accessible que par les administrateurs
         * * validé
         */
        public function cancel (int $id) {
            if ($_SESSION['user']['role'] === 'admin') {
                $db = new mysqli('localhost', 'root', "", "reservation_sdw");
                
                $sql = "DELETE FROM activities WHERE id = $id";
                
                if ($db->query($sql) === TRUE) {
                    echo "Succès de la mise à jour";
                } else {
                    echo "Erreur dans la mise à jour";
                }

                $db->close();
            } else {
                echo "Vous n'avez pas les droits pour effectuer cette action";
            }
        }
    }