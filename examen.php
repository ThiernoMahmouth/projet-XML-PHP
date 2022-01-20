<?php
    require_once 'exercice.php';
    require_once 'question.php';
    require_once 'professeur.php';

    class Examen 
    {
        public $matiere;
        public $classe;
        public $semestre;
        public $date;
        public $professeur;
        public $exercices;
        
        function __construct($matiere,$classe, $semestre, $date, $professeur, $exercices)
        {
            $this->matiere=$matiere;
            $this->classe=$classe;
            $this->semestre=$semestre;
            $this->date=$date;
            $this->professeur=$professeur;
            $this->exercices=$exercices;  
        }   
        public static function add($examen)
        {
            $exam = simplexml_load_file("root.xml");
            // Description
            $description = $exam->addChild("description");
            $description->addAttribute("classe", $examen->classe);
            $description->addAttribute("matiere", $examen->matiere);
            $description->addAttribute("semestre", $examen->semestre);
            $description->addAttribute("date", $examen->date);
            // Professeur
            $professeur = $exam->addChild("professeur");
            $professeur->addChild("prenom", $examen->professeur->prenom);
            $professeur->addChild("nom", $examen->professeur->nom);
            $exam->professeur->prenom = $examen->professeur->prenom;
            $exam->professeur->nom = $examen->professeur->nom;
            // Exercices
            foreach($examen->exercices as $exo)
            {
                Exercice::add($exo, $exam);
            }
            
            $exam->asXml("exam".$examen->matiere.$examen->classe.$examen->date.".xml");
        }
        public static function get($xmlFile)
        {
            $exam = simplexml_load_file($xmlFile);
            $matiere = $exam->description["matiere"];
            $classe = $exam->description["classe"];
            $semestre = $exam->description["semestre"];
            $date = $exam->description["date"];
            $prenomProf = $exam->professeur->prenom;
            $nomProf = $exam->professeur->nom; 
            $professeur = new Professeur($nomProf, $prenomProf);
            $exercices = array();
            //$exercices = new stdClass;
            foreach($exam->exercice as $exo)
            {
                $numExo = $exo["numero"];
                $nbPointExo = $exo["nbPoint"];
                $questions= array();
                //$questions= new stdClass;
                foreach ($exo->question as $question) 
                {
                    $numQuestion = $question["numero"];
                    $nbPointQ = $question["nbPoint"];
                    $type = $question["type"];
                    $libelle = $question->libelle;
                    $options = array();
                    //$options = new stdClass;
                    foreach ($question->option as $option) 
                    {
                        array_push($options, $option);
                    }
                    //print_r($options);
                    array_push($questions, new Question($numQuestion, $nbPointQ, $libelle, $type, $options));
                }
                array_push($exercices, new Exercice($numExo, $nbPointExo, $questions)); 
            }
            //var_dump($exercices);
            return new Examen($matiere, $classe, $semestre, $date, $professeur, $exercices);
        }
    }
?>
