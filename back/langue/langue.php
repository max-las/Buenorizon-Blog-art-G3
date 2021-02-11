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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!--<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body>

    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
        <hr>
        <h2><a href="./createLangue.php">Nouvelle Langue</a></h2>
        <hr>
        <h2>Toutes les Langues</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Désignation</th>
                    <th>Dénomination</th>
                    <th>Pays</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allLangues = $maLangue->get_AllLanguesByPays();
                    foreach ($allLangues as $row) { ?>
                    <tr>
                        <td><?= $row['numLang'] ?></td>
                        <td><?= $row['lib1Lang'] ?></td>
                        <td><?= $row['lib2Lang'] ?></td>
                        <td><?= $row['frPays'] ?></td>
                        <td>&nbsp;<a href="./updateLangue.php?id=<?= $row['numLang'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                        </td>
                        <td>&nbsp;<a href="./deleteLangue.php?id=<?= $row['numLang'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
