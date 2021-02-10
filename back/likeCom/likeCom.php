<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeCom.class.php';
$class = new LIKECOM;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD LikeCom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Like Commentaire</h1>
        <hr>
        <h2><a href="./createLikeCom.php">Nouveau Like Commentaire</a></h2>
        <hr>
        <h2>Tous les Likes Commentaires</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro Membre</th>
                    <th>Numéro Commentaire</th>
                    <th>Numéro Article</th>
                    <th>Like</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allLikesCom = $class->get_AllLikesCom();
                foreach ($allLikesCom as $row) { ?>
                    <tr>
                        <td><?= $row['numMemb'] ?></td>
                        <td><?= $row['numSeqCom'] ?></td>
                        <td><?= $row['numArt'] ?></td>
                        <td><?= $row['likeC'] ?></td>
                        <td>&nbsp;<a href="./updateLikeCom.php?numMemb=<?= $row['numMemb'] ?>&numSeqCom=<?= $row['numSeqCom'] ?>&numArt=<?= $row['numArt'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteLikeCom.php?numMemb=<?= $row['numMemb'] ?>&numSeqCom=<?= $row['numSeqCom'] ?>&numArt=<?= $row['numArt'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require_once __DIR__ . '/footerLikeCom.php';
        require_once __DIR__ . '/footer.php';
        ?>
    </div>
</body>

</html>