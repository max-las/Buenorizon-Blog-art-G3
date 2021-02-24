<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initLikeArt.php';
    $deleted = false;
    if(!isset($_GET['numMemb'])) $_GET['numMemb'] = '';
    if(!isset($_GET['numArt'])) $_GET['numArt'] = '';
    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
    $class = new LIKEART;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./likeArt.php");
            die();
        }

        $numMemb = $_POST["numMemb"];
        $numArt = $_POST['numArt'];

        $deleted = true;
    }else{
        $numMemb = $_GET["numMemb"];
        $numArt = $_GET['numArt'];
    }

    $resultLikeArt = $class->get_1LikeArtWithMembreAndArticle($numMemb, $numArt);
    if($resultLikeArt){
        $likeA = $resultLikeArt['likeA'];
        $pseudoMemb = $resultLikeArt['pseudoMemb'];
        $libTitrArt = $resultLikeArt['libTitrArt'];
    }else{
        $pseudoMemb = "";
        $libTitrArt = "";
        $likeA = "";
    }

    if($deleted){
        $class->delete($numMemb, $numArt);
    }


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

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
    <h2>Suppression d'un Like Article</h2>
    <br>
    <form method="post" action=".\deleteLikeArt.php" class="ui form">
        <div class="field">
            <label class="control-label" for="numMemb"><b>Membre :</b></label>
            <select name="numMemb" id="numMemb" class="ui dropdown" readonly> 
                <option value="<?= $numMemb ?>" selected><?= $deleted ? '' : $pseudoMemb ?></option>
            </select>
        </div>
        <div class="field">
            <label class="control-label" for="numArt"><b>Article :</b></label>
            <select name="numArt" id="numArt" class="ui dropdown" readonly> 
                <option value="<?= $numArt ?>"><?= $deleted ? '' : $libTitrArt ?></option>
            </select>
        </div>
        <div class="field">
            <label>Like</label>
            <input type="number" min=0 max=1 name="likeA" placeholder="Like" value="<?=  $deleted ? '' : $likeA ?>" readonly>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Annuler">
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>

<?php

if($deleted) {
    echo '<p style="color:green;">Le like du membre ' . $pseudoMemb . ' sur l\'article ' . $libTitrArt . ' a été supprimé.</p>';
}

require_once __DIR__ . '/footerLikeArt.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>
