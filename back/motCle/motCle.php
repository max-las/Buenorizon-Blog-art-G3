<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php
/////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : motCle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

global $db;

require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
$monMotCle = new MOTCLE;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mot-Clé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!--<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body>

    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé</h1>
        <hr>
        <h2><a href="./createMotCle.php">Nouveau Mot-Clé</a></h2>
        <hr>
        <h2>Tous les Mots-Clé</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Libellé</th>
                    <th>Langue</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allMotCles = $monMotCle->get_AllMotClesWithLang();
                    foreach ($allMotCles as $row) { ?>
                    <tr>
                        <td><?= $row['numMotCle'] ?></td>
                        <td><?= $row['libMotCle'] ?></td>
                        <td><?= $row['lib1Lang'] ?></td>
                        <td>&nbsp;<a href="./updateMotCle.php?id=<?= $row['numMotCle'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                        </td>
                        <td>&nbsp;<a href="./deleteMotCle.php?id=<?= $row['numMotCle'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <br><br>

<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
