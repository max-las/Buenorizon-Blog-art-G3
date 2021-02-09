<?php
/////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : comment.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
$class = new COMMENT;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!--<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>
        <hr>
        <h2><a href="./createComment.php">Nouveau commentaire</a></h2>
        <hr>
        <h2>Tous les commentaires</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro Commentaire</th>
                    <th>Numéro Article</th>
                    <th>Date de création</th>
                    <th>Commentaire</th>
                    <th>attModOK</th>
                    <th>affComOK</th>
                    <th>notifComKOAff</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allComments = $class->get_AllComments();
                foreach ($allComments as $row) { ?>
                    <tr>
                        <td><?= $row['numSeqCom'] ?></td>
                        <td><?= $row['numArt'] ?></td>
                        <td><?= $row['dtCreCom'] ?></td>
                        <td><?= $row['libCom'] ?></td>
                        <td><?= $row['attModOK'] ?></td>
                        <td><?= $row['affComOK'] ?></td>
                        <td><?= $row['notifComKOAff'] ?></td>
                        <td>&nbsp;<a href="./updateComment.php?numSeqCom=<?= $row['numSeqCom'] ?>&numArt=<?= $row['numArt'] ?>&date=<?= $row['dtCreCom'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                        </td>
                        <td>&nbsp;<a href="./deleteComment.php?numSeqCom=<?= $row['numSeqCom'] ?>&numArt=<?= $row['numArt'] ?>&date=<?= $row['dtCreCom'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php
require_once __DIR__ . '/footerComment.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
