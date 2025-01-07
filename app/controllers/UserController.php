<?php
    class UserController {
        use Render;

        /**
         * Cette méthode liste les utilisateurs inscrits
         * Page visible uniquement par les administrateurs
         */
        public function index() {
            if ($_SESSION['user']['role'] === 'admin') {
                $userModel = new UserModel();
                $users = $userModel->getAllUsers();

                $data = [
                    'title' => 'Liste des utilisateurs',
                    'users' => $users,
                ];

                $this->renderView('user/listUser', $data);
            } else {
                echo "Vous n'avez pas les droits pour voir ces informations";
            }
        }

        /**
         * Cette méthode permet d'inscrire un nouvel utilisateur
         */
        public function register() {
            require './app/views/user/register.php';

            if(empty(trim($_POST['nom']))){
              die('<p>Nom obligatoire</p>');
            }
            if(empty(trim($_POST['prenom']))){
              die('<p>Prénom obligatoire</p>');
            }
            if(empty(trim($_POST['email']))){
              die('<p>Email obligatoire</p>');
            }
            if(empty(trim($_POST['password']))){
              die('<p>Mot de passe obligatoire</p>');
            }

            $userModel = new UserModel();
            $newUser = $userModel->createUser($_POST);

            if ($newUser > 0) {
              header('location: /user/login');
            } else {
              die('<p>Une erreur est survenue</p>');
            }
        }
        

        /**
         * Cette méthode permet de connecter un utilisateur
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
              if(empty(trim($_POST['motdepasse']))){
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
         */
        public function logout() {
            unset($_SESSION['email']);
            header('location: /user/login');
        }
    }