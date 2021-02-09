<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
$class = new COMMENT;
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
    if(isset($_POST['numSeqCom']) && isset($_POST['numArt']) && !empty($_POST['dtCreCom']) && !empty($_POST['libCom']) && isset($_POST['attModOK']) && isset($_POST['affComOK'])){
        $numSeqCom = $_POST['numSeqCom'];
        $numArt = $_POST['numArt'];

        $class->create($_POST['numSeqCom'], $_POST['numArt'], $_POST['dtCreCom'], $_POST['libCom'], $_POST['attModOK'], $_POST['affComOK'], $_POST['notifComKOAff']);
        $created = true;
    }
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
    <h2>Ajout d'un Commentaire</h2>
    <br>
    <form method="post" action=".\createComment.php" class="ui form">
        <div class="field">
            <label>Numéro du commentaire</label>
            <input type="number" name="numSeqCom" placeholder="N° Commentaire">
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article">
        </div>
            <input type="hidden" name="dtCreCom" value="<? echo date('Y-m-d H:i:s'); ?>">
        <div class="field">
            <label>Commentaire</label>
            <input type="text" name="libCom" placeholder="Commentaire">
        </div>
        <div class="field">
            <label>attModOK</label>
            <input type="number" name="attModOK" placeholder="attModOK">
        </div>
        <div class="field">
            <label>affComOK</label>
            <input type="number" name="affComOK" placeholder="affComOK">
        </div>
        <div class="field">
            <label>notifComKOAff</label>
            <input type="text" name="notifComKOAff" placeholder="notifComKOAff">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
    <?php
    if($created) {
        echo '<p style="color:green;">Le commentaire ' . $numSeqCom . '#' . $numArt . ' a été créé.</p>';
    }

    require_once __DIR__ . '/footerComment.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>