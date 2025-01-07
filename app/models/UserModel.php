<?php
    class UserModel extends Bdd {
        public function __construct(){
            parent::__construct();
        }
        /**
         * @param string $email
         * @param string $motdepasse
         * @return array 
         * 
         * Cette méthode permet de vérifier si l'utilisateur existe dans la base de données
         * et si le mot de passe est correct
         * retourne un tableau avec les infos de l'utilisateur si il existe 
         * sinon retourne un tableau vide
         */
        public function logUser(string $email, string $motdepasse): array {
            $sql = 'SELECT * FROM users WHERE email = :email';
            $params = [
                'email' => $email
            ];
            
            $select = $this->co->prepare($sql);
            $select->execute($params);
            
            $user = $select->fetch();
            if (password_verify($motdepasse, $user['motdepasse'])) {
                return $user;
            } else {
                return [];
            }
        }

        /**
         * @param array $data
         * @return bool
         * 
         * Cette méthode permet de créer un utilisateur dans la base de données
         * retourne true si l'utilisateur a été créé
         * sinon retourne false
         */
        public function createUser(array $data): bool {
            if (empty($data['motdepasse'])) {
                throw new InvalidArgumentException('Le mot de passe est obligatoire');
            }

            $sql = 'INSERT INTO users (prenom, nom, email, motdepasse) VALUES (:prenom, :nom, :email, :motdepasse)';
            $params = [
                'prenom' => $data['prenom'],
                'nom' => $data['nom'],
                'email' => $data['email'],
                'motdepasse' => password_hash($data['motdepasse'], PASSWORD_DEFAULT)
            ];

            $insert = $this->co->prepare($sql);
            return $insert->execute($params);
        }

        /**
         * @return array
         * 
         * Cette méthode permet de récupérer tous les utilisateurs de la base de données
         * retourne un tableau d'objets utilisateurs
         */
        public function getAllUsers(): array {
            $sql = 'SELECT * FROM  users';

            $select = $this->co->prepare($sql);
            $select->execute();
            
            return $select->fetchAll(PDO::FETCH_CLASS, 'users');
        }
    }
?>