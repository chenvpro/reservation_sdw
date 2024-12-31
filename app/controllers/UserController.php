<?php
    class UserController {

        public function index() {
            $userModel = new UserModel();
            $users = $userModel->getAllUsers();
            
            // ! afficher
        }

        public function register() {
            $userModel = new UserModel();
            $newUser = $userModel->createUser($_POST);
            
            // ! afficher
        }

        public function login() {
            $userModel = new UserModel();
            $userLogin = $userModel->logUser($_POST['email'], $_POST['motdepasse']);

            // ! afficher
        }

        /**
         * Cette méthode permet de déconnecter l'utilisateur
         * 
         * ! à tester !
         */
        public function logout() {
            unset($_SESSION['email']);
            header('location: /user/login');
        }
    }