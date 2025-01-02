<?php
    class UserController {
        use Render;

        /**
         * Cette méthode liste les utilisateurs inscrits
         * Page visible uniquement par les administrateurs
         * ! non fini
         */
        public function index() {
            if ($_SESSION['user']['role'] === 'admin') {
                $userModel = new UserModel();
                $users = $userModel->getAllUsers();

                $data = [
                    'title' => 'Liste des utilisateurs',
                    'content' => $users,
                ];

                $this->renderView('user/index', $data);
            } else {
                echo "Vous n'avez pas les droits pour voir ces informations";
            }
        }

        /**
         * Cette méthode permet d'inscrire un nouvel utilisateur
         * ! non fini
         */
        public function register() {
            $userModel = new UserModel();
            $newUser = $userModel->createUser($_POST);
            
            // ! afficher
        }

        /**
         * Cette méthode permet de connecter un utilisateur
         * * validé
         */
        public function login() {
            $logged = false;
            if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
              $logged = true;
            }
        
            if(isset($_POST['log_user'])){
              if(empty(trim($_POST['email']))){
                $_SESSION['errors'][] = 'Email obligatoire';
              }
              if(empty(trim($_POST['pwd']))){
                $_SESSION['errors'][] = 'Mot de passe obligatoire';
              }
        
              $userModel = new UserModel();
              $login = $userModel->logUser($_POST['email'], $_POST['motdepasse']);
        
              if($login == true){
                $logged = true;
              }
            }
        
            require './app/views/user/login.php';
        }

        /**
         * Cette méthode permet de déconnecter l'utilisateur
         * 
         * ! non fini
         */
        public function logout() {
            unset($_SESSION['email']);
            header('location: /user/login');
        }
    }