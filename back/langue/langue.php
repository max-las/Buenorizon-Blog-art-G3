<?php
/////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : langue.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';

global $db;

$maLangue = new LANGUE;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>

    <hr /><br />
    <h2>Nouvelle langue :&nbsp;<a href="./createLangue.php"><i>Créer une langue</i></a></h2>
    <br />
    <hr />
    <h2>Toutes les langues</h2>

    <table border="3" bgcolor="aliceblue">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Désignation&nbsp;</th>
                <th>&nbsp;Dénomination&nbsp;</th>
                <th>&nbsp;Pays&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allLangues = $maLangue->get_AllLanguesByPays();
            foreach ($allLangues as $row) {

                // Appel méthode : tous les statuts en BDD

                // Boucle pour afficher
                //foreach($all as $row) {
            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?php echo $row['numLang']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?php echo $row['lib1Lang']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['lib2Lang']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['frPays']; ?> &nbsp;</td>

                    <td>&nbsp;<a href="./updateLangue.php?id=<?= $row['numLang'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteLangue.php?id=<?= $row['numLang'] ?>"><i>Supprimer</i></a>&nbsp;
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
