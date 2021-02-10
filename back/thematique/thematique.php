<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
$class = new THEMATIQUE;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Thématique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Thématique</h1>
        <hr>
        <h2><a href="./createThematique.php">Nouveau Thématique</a></h2>
        <hr>
        <h2>Tous les Thématiques</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro Thématique</th>
                    <th>Libellé Thématique</th>
                    <th>Numéro Langue</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allThematiques = $class->get_AllThematiques();
                foreach ($allThematiques as $row) { ?>
                    <tr>
                        <td><?= $row['numThem'] ?></td>
                        <td><?= $row['libThem'] ?></td>
                        <td><?= $row['numLang'] ?></td>
                        <td>&nbsp;<a href="./updateThematique.php?numThem=<?= $row['numThem']; ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteThematique.php?numThem=<?= $row['numThem']; ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require_once __DIR__ . '/footerThematique.php';
        require_once __DIR__ . '/footer.php';
        ?>
    </div>
</body>

</html>