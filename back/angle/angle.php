<?php
/////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : angle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';

global $db;

$monAngle = new ANGLE;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Angle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Angle</h1>

    <hr /><br />
    <h2>Nouvel Angle :&nbsp;<a href="./createAngle.php"><i>Créer un angle</i></a></h2>
    <br />
    <hr />
    <h2>Tous les angles</h2>

    <table border="3" bgcolor="aliceblue">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Nom&nbsp;</th>
                <th>&nbsp;Langue&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allAngles = $monAngle->get_AllAnglesWithLang();
            foreach ($allAngles as $row) {

                // Appel méthode : tous les statuts en BDD

                // Boucle pour afficher
                //foreach($all as $row) {
            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?php echo $row['numAngl']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?php echo $row['libAngl']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['lib1Lang']; ?> &nbsp;</td>

                    <td>&nbsp;<a href="./updateAngle.php?id=<?= $row['numAngl'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteAngle.php?id=<?= $row['numAngl'] ?>"><i>Supprimer</i></a>&nbsp;
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
