<?php
    require_once 'question.php';

    class Exercice
    {
        public $numero;
        public $nbPoint;
        public $questions;

        public function __construct($numero, $nbPoint, $questions)
        {
            $this->numero=$numero;
            $this->nbPoint=$nbPoint;
            $this->questions=$questions;
        }
        public static function add($exo, $exam)
        {
            $exercice = $exam->addChild("exercice");
            $exercice->addAttribute("numero", $exo->numero);
            $exercice->addAttribute("nbPoint", $exo->nbPoint);
            foreach ($exo->questions as $question) 
            {
                Question::add($question, $exercice);
            }
        }
        public function get()
        {
            
        }
        
    }
?>