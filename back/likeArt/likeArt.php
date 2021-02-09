<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
$class = new LIKEART;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD LikeArt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
        <hr>
        <h2><a href="./createLikeArt.php">Nouveau Like Article</a></h2>
        <hr>
        <h2>Tous les Likes Articles</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro Membre</th>
                    <th>Numéro Article</th>
                    <th>Like</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allLikesArt = $class->get_AllLikesArt();
                foreach ($allLikesArt as $row) { ?>
                    <tr>
                        <td><?= $row['numMemb'] ?></td>
                        <td><?= $row['numArt'] ?></td>
                        <td><?= $row['likeA'] ?></td>
                        <td>&nbsp;<a href="./updateLikeArt.php?numMemb=<?= $row['numMemb'] ?>&numArt=<?= $row['numArt'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteLikeArt.php?numMemb=<?= $row['numMemb'] ?>&numArt=<?= $row['numArt'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require_once __DIR__ . '/footerLikeArt.php';
        require_once __DIR__ . '/footer.php';
        ?>
    </div>
</body>

</html>