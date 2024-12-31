<?php
    class ActivityController {
        use Render;

        public function index() {
            $activityModel = new ActiviteModel();
            $activities = $activityModel->getAllActivities();
            
            $data = [
                'title' => 'Liste des activités',
                'activities' => $activities
            ];   

            // ! afficher
        }

        public function show(int $id) {
            $activityModel = new ActiviteModel();
            $activityDetails = $activityModel->getActivityById($id);

            $data = [
                'title' => 'Détails de l\'activité',
                'activity' => $activityDetails
            ];

            // ! afficher

        }

        public function update(int $id, array $data) {

        }

        public function cancel (int $id) {
        }
    }