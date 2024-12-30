<?php
    class Activity {
        private int $id;
        private string $nom;
        private int $type_id;
        private int $places_disponibles;
        private string $description;
        private datetime $datetime_debut;
        private string $duree;

        public function getId(): int {
            return $this->id;
        }

        public function setNom(string $nom): self {
            $this->nom = $nom;
            return $this;
        }
        public function getNom(): string {
            return $this->nom;
        }

        public function setTypeId(int $type_id): self {
            $this->type_id = $type_id;
            return $this;
        }
        public function getTypeId(): int {
            return $this->type_id;
        }

        public function setPlacesDisponibles(int $places_disponibles): self {
            $this->places_disponibles = $places_disponibles;
            return $this;
        }
        public function getPlacesDisponibles(): int {
            return $this->places_disponibles;
        }

        public function setDescription(string $description): self {
            $this->description = $description;
            return $this;
        }
        public function getDescription(): string {
            return $this->description;
        }

        public function setDatetimeDebut(datetime $datetime_debut): self {
            $this->datetime_debut = $datetime_debut;
            return $this;
        }
        public function getDatetimeDebut(): datetime {
            return $this->datetime_debut;
        }

        public function setDuree(string $duree): self {
            $this->duree = $duree;
            return $this;
        }
        public function getDuree(): string {
            return $this->duree;
        }
    }