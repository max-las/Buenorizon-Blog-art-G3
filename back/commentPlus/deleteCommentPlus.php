<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/commentPlus.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
$class = new COMMENTPLUS;
$comment = new COMMENT;
$article = new ARTICLE;
$deleted = false;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['libStat'])){
//         $monStatut->create($_POST['libStat']);
//         echo('Le statut ' . $_POST['libStat'] . ' a bien été créé.');
//     }
// }else{
//     echo('libStat n\'a pas été renseignée');
// }

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if ($_POST["Submit"] === "Annuler") {
        header("Location: ./commentPlus.php");
        die();
    }

    $numSeqCom = $_POST["numSeqCom"];
    $numArt = $_POST["numArt"];
    $numSeqComR = $_POST['numSeqComR'];

    $resultCommentPlus = $class->get_1CommentR($numArt, $numSeqCom, $numSeqComR);

    $class->delete($numArt, $numSeqCom, $numSeqComR);
    $deleted = true;
} else {
    $numSeqCom = $_GET['numSeqCom'];
    $numArt = $_GET['numArt'];
    $numSeqComR = $_GET['numSeqComR'];

    $resultCommentPlus = $class->get_1CommentR($numArt, $numSeqCom, $numSeqComR);
}

if ($resultCommentPlus) {
    $numSeqCom = $resultCommentPlus['numSeqCom'];
    $numArt = $resultCommentPlus['numArt'];
    $numSeqComR = $resultCommentPlus['numSeqComR'];
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
    <form method="post" action=".\deleteCommentPlus.php" class="ui form">
        <div class="field">
            <label>Numéro du commentaire</label>
            <input type="number" name="numSeqCom" placeholder="N° Commentaire" value="<?= $numSeqCom ?>" readonly>
        </div>
        <div class="field">
            <label>Commentaire</label>
            <input type="text" name="libCom" placeholder="Commentaire" value="<? 
                $resultComment = $comment->get_1Comment($numSeqCom, $numArt);
                echo $resultComment['libCom'];
            ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<?= $numArt ?>" readonly>
        </div>
        <div class="field">
            <label>Titre de l'Article</label>
            <input type="text" name="libCom" placeholder="Commentaire" value="<? 
                $resultArticle = $article->get_1Article($numArt);
                echo $resultArticle['libTitrArt']; 
            ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro du Commentaire Réponse</label>
            <input type="number" name="numSeqComR" placeholder="Commentaire" value="<?= $numSeqComR ?>" readonly>
        </div>
        <div class="field">
            <label>Commentaire Réponse</label>
            <input type="text" name="libComR" placeholder="Commentaire" value="<? 
                $resultLib = $class->get_1CommentR($numArt, $numSeqCom, $numSeqComR);
                echo $resultLib['libCom'];
            ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro de l'Article Réponse</label>
            <input type="number" name="numArtR" placeholder="N° Article Réponse" value="<?= $numArt ?>" readonly>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Annuler">
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>
    <?php
    if ($deleted) {
        echo '<p style="color:green;">Le commentairePlus ' . $numSeqCom . '#' . $numArt . '#' . $numSeqComR . ' a été supprimé.</p>';
    }

    require_once __DIR__ . '/footerCommentPlus.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>