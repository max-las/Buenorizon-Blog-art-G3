<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/commentPlus.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
$class = new COMMENTPLUS;
$comment = new COMMENT;
$article = new ARTICLE;
$created = false;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['libStat'])){
//         $monStatut->create($_POST['libStat']);
//         echo('Le statut ' . $_POST['libStat'] . ' a bien été créé.');
//     }
// }else{
//     echo('libStat n\'a pas été renseignée');
// }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['numSeqCom']) && isset($_POST['numArt']) && isset($_POST['numSeqComR'])){
        $numSeqCom = $_POST['numSeqCom'];
        $numArt = $_POST['numArt'];
        $numSeqComR = $_POST['numSeqComR'];

        $class->create($numArt, $numSeqCom, $numSeqComR);
        $created = true;
    }
}

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
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD CommentairePlus</h1>
    <h2>Suppression d'un CommentairePlus</h2>
    <br>
    <form method="post" action=".\createCommentPlus.php" class="ui form">
        <div class="field">
            <label>Numéro du commentaire</label>
            <input type="number" name="numSeqCom" placeholder="N° Commentaire">
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article">
        </div>
        <div class="field">
            <label>Numéro du Commentaire Réponse</label>
            <input type="number" name="numSeqComR" placeholder="N° Commentaire Réponse">
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>
    <?php
    if($created) {
        echo '<p style="color:green;">Le commentairePlus ' . $numSeqCom . '#' . $numArt . '#' . $numSeqComR . ' a été créé.</p>';
    }

    require_once __DIR__ . '/footerCommentPlus.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>