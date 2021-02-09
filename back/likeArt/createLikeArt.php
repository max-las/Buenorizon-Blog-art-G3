<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
$class = new LIKEART;
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
    if(isset($_POST['numMemb']) && isset($_POST['numArt']) && isset($_POST['likeA'])){
        $numMemb = $_POST['numMemb'];
        $numArt = $_POST['numArt'];
        $likeA = $_POST['likeA'];

        $class->create($numMemb, $numArt, $likeA);
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
    <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
    <h2>Ajout d'un Like Article</h2>
    <br>
    <form method="post" action=".\createLikeArt.php" class="ui form">
        <div class="field">
            <label>Numéro du Membre</label>
            <input type="number" name="numMemb" placeholder="N° Membre">
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article">
        </div>
        <div class="field">
            <label>Like</label>
            <input type="number" min=0 max=1 name="likeA" placeholder="Like">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
    <?php
    if($created) {
        echo '<p style="color:green;">Le commentaire ' . $numMemb . '#' . $numArt . ' a été créé.</p>';
    }

    require_once __DIR__ . '/footerLikeArt.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>