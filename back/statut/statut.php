<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : statut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire


// insertion classe STATUT

require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';

global $db;

$monStatut = new STATUT;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Gestion du Statut</title>
    <meta charset="utf-8" />
    <meta n ame="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <style type="text/css">
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>

    <hr /><br />
    <h2>Nouveau statut :&nbsp;<a href="./createStatut.php"><i>Créer un statut</i></a></h2>
    <br />
    <hr />
    <h2>Tous les statuts</h2>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Nom&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allStatuts = $monStatut->get_AllStatuts();
            foreach ($allStatuts as $row) {

                // Appel méthode : tous les statuts en BDD

                // Boucle pour afficher
                //foreach($all as $row) {
            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?php echo $row['idStat']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?php echo $row['libStat']; ?> &nbsp;</td>

                    <td>&nbsp;<a href="./updateStatut.php?id=<?= $row['idStat'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteStatut.php?id=<?= $row['idStat'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                </tr>
            <?php
            }
            //}	// End of foreach
            ?>
        </tbody>
    </table>
    <br><br>
    <?php
    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>