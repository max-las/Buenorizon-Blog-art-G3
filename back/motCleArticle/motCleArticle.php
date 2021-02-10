<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
$class = new MOTCLEARTICLE;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD MotCleArticle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé Article</h1>
        <hr>
        <h2><a href="./createMotCleArticle.php">Nouveau Mot-Clé Article</a></h2>
        <hr>
        <h2>Tous les Mots-clés Articles</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro Article</th>
                    <th>Numéro Mot-Clé</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allMotCle = $class->get_AllMotCle();
                foreach ($allMotCle as $row) { ?>
                    <tr>
                        <td><?= $row['numArt'] ?></td>
                        <td><?= $row['numMotCle'] ?></td>
                        <td>&nbsp;<a href="./updateMotCleArticle.php?numArt=<?= $row['numArt']; ?>&numMotCle=<?= $row['numMotCle']; ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteMotCleArticle.php?numArt=<?= $row['numArt']; ?>&numMotCle=<?= $row['numMotCle']; ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require_once __DIR__ . '/footerMotCleArticle.php';
        require_once __DIR__ . '/footer.php';
        ?>
    </div>
</body>

</html>