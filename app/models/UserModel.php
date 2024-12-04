<?php
    class UserModel {
        public function logUser(string $email, string $motdepasse): array {
            $email = htmlspecialchars(trim($POST['email']));
            $pwd = htmlspecialchars(trim($POST['pwd']));

            $sql = 'SELECT email, motdepasse FROM users WHERE email = :email LIMIT 1';
            $params = [
                'email' => $email
            ];

            $select = $this->co->prepare($sql);
            $select->execute($params);

            if($select->rowCount() == 1){
                $user = $select->fetch();
                if(password_verify($pwd, $user['motdepasse'])){
                    $_SESSION['email'] = $user['email'];
                    return true;
                }
                else{
                    $_SESSION['errors'][] = 'Identifiant ou mot de passe incorrect';
                    return false;
                }
            } else {
                return false;
            }
        }

        public function createUser(array $data) : bool {
            $prenom = htmlspecialchars(trim($POST['prenom']));
            $nom = htmlspecialchars(trim($POST['nom']));
            $email = htmlspecialchars(trim($POST['email']));
            $motdepasse = htmlspecialchars(trim($POST['motdepasse']));
            $role = htmlspecialchars(trim($POST['role']));

            $sql = 'INSERT INTO users(prenom, nom, email, motdepasse, role) VALUES (:prenom, :nom, :email, :motdepasse)';
            $params = [
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $email,
                'motdepasse' => password_hash(
                    $pwd, 
                    PASSWORD_BCRYPT
                    )
                ];

            $insert = $this->co->prepare($sql);
            $insert->execute($params);

            return true;
        }

        public function getAllUsers(): array {
            $users = $this->co->prepare('SELECT prenom, nom FROM users');
            $users->execute();

            return $users->fetchAll(PDO::FETCH_CLASS, 'users');
        }
    }
?>