<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
$class = new COMMENT;
$deleted = false;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['libStat'])){
//         $monStatut->create($_POST['libStat']);
//         echo('Le statut ' . $_POST['libStat'] . ' a bien été créé.');
//     }
// }else{
//     echo('libStat n\'a pas été renseignée');
// }

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if($_POST["Submit"] === "Annuler"){
        header("Location: ./comment.php");
        die();
    }

    $numSeqCom = $_POST["numSeqCom"];
    $numArt = $_POST["numArt"];

    $resultComment = $class->get_1Comment(intval($numSeqCom), intval($numArt));
    
    $class->delete(intval($numSeqCom), intval($numArt));
    $deleted = true;

}else{
    $numSeqCom = $_GET['numSeqCom'];
    $numArt = $_GET['numArt'];

    $resultComment = $class->get_1Comment(intval($numSeqCom), intval($numArt));
}

if($resultComment){
    $numSeqCom = $resultComment['numSeqCom'];
    $numArt = $resultComment['numArt'];
    $dtCreCom = $resultComment['dtCreCom'];
    $libCom = $resultComment['libCom'];
    $attModOK = $resultComment['attModOK'];
    $affComOK = $resultComment['affComOK'];
    $notifComKOAff = $resultComment['notifComKOAff'];
}

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
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>
    <h2>Suppression d'un Commentaire</h2>
    <br>
    <form method="post" action=".\deleteComment.php" class="ui form">
        <div class="field">
            <label>Numéro du commentaire</label>
            <input type="number" name="numSeqCom" placeholder="N° Commentaire" value="<? echo($numSeqCom); ?>">
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<? echo($numArt); ?>">
        </div>
            <input type="hidden" name="dtCreCom" value="<? echo($dtCreCom); ?>">
        <div class="field">
            <label>Commentaire</label>
            <input type="text" name="libCom" placeholder="Commentaire" value="<? echo($libCom); ?>">
        </div>
        <div class="field">
            <label>attModOK</label>
            <input type="number" name="attModOK" placeholder="attModOK" value="<? echo($attModOK); ?>">
        </div>
        <div class="field">
            <label>affComOK</label>
            <input type="number" name="affComOK" placeholder="affComOK" value="<? echo($affComOK); ?>">
        </div>
        <div class="field">
            <label>notifComKOAff</label>
            <input type="text" name="notifComKOAff" placeholder="notifComKOAff" value="<? echo($notifComKOAff); ?>">
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Annuler">
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>
    <?php
    if($deleted) {
        echo '<p style="color:green;">Le commentaire ' . $numSeqCom . '#' . $numArt . ' a été supprimé.</p>';
    }

    require_once __DIR__ . '/footerComment.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>