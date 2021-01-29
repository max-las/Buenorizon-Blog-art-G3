<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteStatut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initStatut.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    $monStatut = new STATUT;

    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    $monUser = new USER;



    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./statut.php");
            die();
        }

        $idStat = $_POST["id"];
        $resultStatut = $monStatut->get_1Statut($idStat);

        $users = $monUser->get_AllUsersByStat($idStat);
        if(!$users){
            $monStatut->delete($idStat);
            $deleted = true;
        }else{
            $supprImpossible = true;
        }
    }else{
        $idStat = $_GET["id"];
        $resultStatut = $monStatut->get_1Statut($idStat);
    }
    
    if($resultStatut){
        $libStat = $resultStatut["libStat"];
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #p1 {
            max-width: 600px;
            width: 600px;
            max-height: 200px;
            height: 200px;
            border: 1px solid #000000;
            background-color: whitesmoke;
            /* Coins arrondis et couleur du cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>
    <h2>Suppression d'un statut</h2>
<?php
    // Supp : récup id à supprimer



?>    <form method="post" action="<?= "./deleteStatut.php?id=".$idStat; ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Statut...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libStat"><b>Nom du statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $deleted ? '' : $libStat; ?>" disabled="disabled" />
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
    <br>
<?php

if($supprImpossible){
    echo '<p style="color:red;">Impossible de supprimer le statut '.$libStat.' car il est référencé par les utilisateurs suivant :</p>';
    echo '<ul>';
    foreach($users as $value){
        echo '<li>'.$value["pseudoUser"].'</li>';
    }
    echo '</ul>';
} elseif($deleted) {
    echo '<p style="color:green;">La langue "'.$libStat.'" a été supprimée.</p>';
}

require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
