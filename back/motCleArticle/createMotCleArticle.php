<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
$class = new MOTCLEARTICLE;
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
    if(isset($_POST['numArt']) && isset($_POST['numMotCle'])){
        $numArt = $_POST['numArt'];
        $numMotCle = $_POST['numMotCle'];

        $class->create($numMotCle, $numArt);
        $created = true;
    }
}

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

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé Article</h1>
    <h2>Ajout d'un Mot-Clé Article</h2>
    <br>
    <form method="post" action=".\createMotCleArticle.php" class="ui form">
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article">
        </div>
        <div class="field">
            <label>Numéro du Mot-Clé</label>
            <input type="number" name="numMotCle" placeholder="N° Mot-Clé">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
    <?php
    if($created) {
        echo '<p style="color:green;">Le mot-clé d\'article ' . $numArt . '#' .  $numMotCle . ' a été créé.</p>';
    }

    require_once __DIR__ . '/footerMotCleArticle.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>