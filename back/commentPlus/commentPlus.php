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
require_once __DIR__ . '/../../CLASS_CRUD/commentPlus.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
$class = new COMMENTPLUS;
$comment = new COMMENT;
$article = new ARTICLE;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD CommentairePlus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!--<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD CommentairePlus</h1>
        <hr>
        <h2><a href="./createCommentPlus.php">Nouveau commentairePlus</a></h2>
        <hr>
        <h2>Tous les commentairesPlus</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Numéro Commentaire</th>
                    <th>Libellé Commentaire</th>
                    <th>Numéro Article</th>
                    <th>Titre Article</th>
                    <th>Numéro Commentaire Réponse</th>
                    <th>Libellé Commentaire Réponse</th>
                    <th>Numéro Article Réponse</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allCommentsPlus = $class->get_AllCommentsR();
                foreach ($allCommentsPlus as $row) { ?>
                    <tr>
                        <td><?= $row['numSeqCom'] ?></td>
                        <td><?
                            $resultComment = $comment->get_1Comment($row['numSeqCom'], $row['numArt']);
                            echo $resultComment['libCom'];
                        ?></td>
                        <td><?= $row['numArt'] ?></td>
                        <td><?
                            $resultArticle = $article->get_1Article($row['numArt']);
                            echo $resultArticle['libTitrArt']; 
                        ?></td>
                        <td><?= $row['numSeqComR'] ?></td>
                        <td><?= $row['libCom'] ?></td>
                        <td><?= $row['numArtR'] ?></td>
                        <td>&nbsp;<a href="./updateCommentPlus.php?numSeqCom=<?= $row['numSeqCom'] ?>&numArt=<?= $row['numArt'] ?>&numSeqComR=<?= $row['numSeqComR'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                        </td>
                        <td>&nbsp;<a href="./deleteCommentPlus.php?numSeqCom=<?= $row['numSeqCom'] ?>&numArt=<?= $row['numArt'] ?>&numSeqComR=<?= $row['numSeqComR'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php
require_once __DIR__ . '/footerCommentPlus.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
