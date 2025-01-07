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

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $errors = [];
                if (!isset($_POST['nom']) || empty(trim($_POST['nom']))) {
                    $errors[] = 'Nom obligatoire';
                }
                if (!isset($_POST['prenom']) || empty(trim($_POST['prenom']))) {
                    $errors[] = 'Prénom obligatoire';
                }
                if (!isset($_POST['email']) || empty(trim($_POST['email']))) {
                    $errors[] = 'Email obligatoire';
                }
                if (!isset($_POST['password']) || empty(trim($_POST['password']))) {
                    $errors[] = 'Mot de passe obligatoire';
                }

                if (empty($errors)) {
                    $userModel = new UserModel();
                    $newUser = $userModel->createUser($_POST);

                    if ($newUser > 0) {
                        header('location: /user/login');
                    } else {
                        echo '<p>Une erreur est survenue</p>';
                    }
                } else {  
                    foreach ($errors as $error) {
                        echo '<p>' . $error . '</p>';
                    }
                }
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
              if(empty(trim($_POST['password']))){
                $_SESSION['errors'][] = 'Mot de passe obligatoire';
              }
        
              $userModel = new UserModel();
              $login = $userModel->logUser($_POST['email'], $_POST['password']);
        
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