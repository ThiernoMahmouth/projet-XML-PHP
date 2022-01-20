<?php 
    session_start();
    $_SESSION["nom"] = "DIALLO";
    $_SESSION["prenom"] = "Gallo";
?>
<!Doctype html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <title>Creation Exam</title>
        <!-- ajout bootstrap ajout de css-->
        <link rel="stylesheet"  href="css/bootstrap.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Formulaire de creation d'un examen </h2>
            <hr>
            <p>Bienvenue </p>
    </div> 
    <form id="examen" action="creerExamen.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="classe">Classe</label>
                <input class="form-control" type="text" id="classe" name="classe" placeholder="classe"/> 
            </div>
            <div class="form-group col-md-3">
                <label for="matiere">La matière concernée</label>
                <input class="form-control" type="text" id="matiere" name="matiere" placeholder="matiere"/> 
            </div>
            <div class="form-group col-md-3">
                <label for="semestre">Le semestre concerné</label>
                <input class="form-control" type="text" id="semestre" name="semestre" placeholder="semestre" />
            </div>
            <div class="form-group col-md-3">
                <label for="date"> la date </label>
                <input class="form-control" type="date" id="date" name="date" /> 
            </div>
        </div>
        <div id="divExos" class="">
            <div class="form-group col-md-3">
                <button style="margin-right: 10px" class="btn btn-success" id="addExo"><i class="fa fa-plus"></i> Exercice </button>
                <input class="form-control" type="hidden" id="nbExos" name="nbExos" /> 
            </div>
            
        </div>     
        <button class="btn btn-primary" type="submit" name="valider"> Valider </button>
        </form> 
        </div>
    
        <!-- integration jquery-->
        <script src="examen.js"> </script>
        <script src="js/jquery-3.5.1.min.js"> </script>
        <!-- integration bootstrap.js-->
        <script src="js/bootstrap.js"> </script>
    </body>    
</html>