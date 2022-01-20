<?php
    session_start();
    require_once 'examen.php';
    require_once 'professeur.php';
    require_once 'examen.php';
    
    $prenom = $_SESSION["prenom"];
    $nom = $_SESSION["nom"];
    $matiere = $_REQUEST["matiere"];
    $classe = $_REQUEST["classe"];
    $semestre = $_REQUEST["semestre"];
    $date = $_REQUEST["date"];
    $nbExos = $_REQUEST["nbExos"];
    $exercices = array();
    $i = 1;
    while ($i <= $nbExos) 
    {
        //$numeroExo = $_REQUEST["numExo"];
        $numeroExo = $i;
        if(isset($_REQUEST["nbPointExo"]))
        {
            $nbPointExo = $_REQUEST["nbPointExo".$i];
        }
        $nbQ = $_REQUEST["nbQExo".$i];
        $j = 1;
        $questions = array();
        while ($j <= $nbQ)
        {
            //$numeroQ = $_REQUEST["numQ".$i.$j];
            $numeroQ = $j;
            if(isset($_REQUEST["nbPointQ".$i.$j]))
            {
                $nbPointQ = $_REQUEST["nbPointQ".$i.$j];
            }
            $libelle = $_REQUEST["libelleQ".$i.$j];
            $type = $_REQUEST["typeQ".$i.$j];
            $options = array();
            if ($type == "repUnique" || $type == "repMultiple")
            {
                $nbOptions = $_REQUEST["nbOptionQ".$i.$j];
                $k = 1;
                while($k <= $nbOptions)
                {
                    array_push($options,$_REQUEST["optionQ".$i.$j.$k]);
                    $k++;
                }
            }
            array_push($questions, new Question($j, $nbPointQ, $libelle, $type, $options));
            $j++;
        }
        if (isset($nbPointExo))
        {
            array_push($exercices, new Exercice($i, $nbPointExo, $questions));
        }
        else
        {
            array_push($exercices, new Exercice($i, 0, $questions));
        }
        $i++;
    }
    $professeur = new Professeur($prenom, $nom);
    $examen = new Examen($matiere, $classe, $semestre, $date, $professeur, $exercices);
    Examen::add($examen);
    echo "Examen cree avec succes!";
?>