<?php
    session_start();

    require_once 'examen.php';

    //$nomFic = $_REQUEST["fichier"];
    $nomFic = "examGestionDESCAF22021-11-03.xml";
    $examen = Examen::get($nomFic);

?>
<!Doctype html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <title>Visualisation Exam</title>
        <!-- ajout bootstrap ajout de css-->
        <!--<link rel="stylesheet"  href="css/bootstrap.css"/>-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="card mt-4">
                <h5 class="card-header text-center">ECOLE SUPERIEURE POLYTECHNIQUE</h5>
                <div class="card-body">
                    <p class="card-text"><?php echo "Professeur: Mr ".$examen->professeur->prenom." ".$examen->professeur->nom ?></p>
                    <p class="card-text"><?php echo "Classe: ".$examen->classe ?></p>
                    <p class="card-text"><?php echo "Semestre: ".$examen->semestre ?></p>
                    <h5 class="card-title text-center">EPREUVE DE <?php echo $examen->matiere ?> </h5>
                    <?php
                        foreach ($examen->exercices as $exercice) 
                        {
                            ?>
                            
                                <h4 >Exercice <?php 
                                    if ($exercice->nbPoint != 0)
                                    {
                                        echo $exercice->numero." (".$exercice->nbPoint."pts)";
                                    }
                                    else 
                                    {
                                        echo $exercice->numero;
                                    } ?>
                                        <?php
                                            foreach ($exercice->questions as $question)
                                            {
                                        ?>
                                            <h6>Question <?php echo $question->numero." (".$question->nbPoint."pts)"?></h6>
                                            <p class="card-text"><?php echo $question->libelle ?></p>
                                        <?php 
                                            switch($question->type)
                                            {
                                                case "repCourte":
                                        ?>
                                                    <input class="form-control" type="text" name="reponse1">
                                        <?php
                                                break;
                                                case "repLongue":
                                        ?>
                                                    <textarea class="form-control" name="" id=""></textarea>
                                        <?php
                                                break;
                                                case "repUnique":
                                                    foreach ($question->options as $option) 
                                                    {
                                        ?>
                                                    <div>
                                                        <input type="radio" id="<?php echo $option?>" name="<?php echo $question->numero?>" value="<?php echo $option?>">
                                                        <label for="<?php echo $option?>"><?php echo $option ?></label>
                                                    </div>
                                        <?php
                                                    }
                                        

                                                break;
                                                case "repMultiple":
                                                    foreach ($question->options as $option) 
                                                    {
                                        ?>
                                                    <div>
                                                        <input type="checkbox" id="<?php echo $option?>" name="<?php echo $question->numero?>" value="<?php echo $option?>">
                                                        <label for="<?php echo $option?>"><?php echo $option ?></label>
                                                    </div>
                                        <?php
                                                    }
                                                break;
                                            }
                                        ?>
                                        <?php
                                            }
                                        ?>
                        <?php
                        } 
                    ?>
                    </div>
                    <a href="#" class="btn btn-primary mt-2">Soumettre</a>
                </div>
            </div>
        </div> 
    </body>
</html>

