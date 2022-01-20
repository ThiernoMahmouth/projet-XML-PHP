<?php

    class Professeur
    {
        public $nom;
        public $prenom;

        public function __construct($nom, $prenom)
        {
            $this->nom=$nom;
            $this->prenom=$prenom;
        }
    }
?>