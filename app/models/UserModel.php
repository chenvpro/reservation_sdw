<?php
    class UserModel {
        public function logUser(string $email, string $motdepasse): array {
            
        }

        public function createUser(array $data) : bool {
            $prenom = htmlspecialchars(trim($POST['prenom']));
            $nom = htmlspecialchars(trim($POST['nom']));
            $email = htmlspecialchars(trim($POST['email']));
            $pwd = htmlspecialchars(trim($POST['pwd']));
            $role = htmlspecialchars(trim($POST['role']));

            $sql = 'INSERT INTO users(prenom, nom, email, motdepasse, role) VALUES (:prenom, :nom, :email, :pwd)';
            $params = [
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $email,
                'pwd' => password_hash(
                    $pwd, 
                    PASSWORD_BCRYPT
                    )
                ];

            $insert = $this->co->prepare($sql);
            $insert->execute($params);

            return true;
        }

        public function getAllUsers(): array {
            $users = $this->co->prepare('SELECT prenom, nom FROM User');
            $users->execute();

            return $users->fetchAll(PDO::FETCH_CLASS, 'User');
        }
    }
?>