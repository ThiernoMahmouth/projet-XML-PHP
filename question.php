<?php
    
    class Question
    {
        public $numero;
        public $nbPoint;
        public $libelle;
        public $type;
        public $options;

        public function __construct($numero, $nbPoint, $libelle, $type, $options)
        {
            $this->numero=$numero;
            $this->nbPoint=$nbPoint;
            $this->libelle=$libelle;
            $this->type=$type;
            $this->options=$options;
        }
        public static function add($quest, $exercice)
        {
            $question = $exercice->addChild("question");
            $question->addAttribute("numero", $quest->numero);
            $question->addAttribute("nbPoint", $quest->nbPoint);
            $question->addAttribute("type", $quest->type);
            $question->addChild("libelle", $quest->libelle);
            if ($quest->type == "repUnique" || $quest->type == "repMultiple")
            {
                foreach ($quest->options as $option) 
                {
                    $question->addChild("option", $option);
                }
            }
        }
        public function get()
        {
            
        }
    }
?>