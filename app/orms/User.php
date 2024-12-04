<?php
    class User {
        private int $id;
        private string $prenom;
        private string $nom;
        private string $email;
        private string $pwd;
        private string $role;

        public function getId(): int {
            return $this->id;
        }

        public function setPrenom(): self {
            $this->prenom = $prenom;
            return $this;
        }
        public function getPrenom(): string {
            return $this->prenom;
        }

        public function setNom(): self {
            $this->nom = $nom;
            return $this;
        }
        public function getNom(): string {
            return $this->nom;
        }

        public function setEmail(): self {
            $this->email = $email;
            return $this;
        }
        public function getEmail(): string {
            return $this->email;
        }

        public function setPwd(): self {
            $this->pwd = $pwd;
            return $this;
        }
        public function getPwd(): string {
            return $this->pwd;
        }

        public function setRole(): self {
            $this->role = $role;
            return $this;
        }
        public function getRole(): string {
            return $this->role;
        }
    }
?>