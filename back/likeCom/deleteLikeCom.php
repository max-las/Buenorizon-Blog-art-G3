<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initLikeCom.php';
    $deleted = false;
    if(!isset($_GET['numMemb'])) $_GET['numMemb'] = '';
    if(!isset($_GET['numArt'])) $_GET['numArt'] = '';
    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . '/../../CLASS_CRUD/likeCom.class.php';
    $class = new LIKECOM;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./likeCom.php");
            die();
        }

        $numMemb = $_POST["numMemb"];
        $numSeqCom = $_POST['numSeqCom'];
        $numArt = $_POST['numArt'];
        $likeC = $_POST['likeC'];
        
        $class->delete($numMemb, $numSeqCom, $numArt);
        $deleted = true;

    }else{
        $numMemb = $_GET["numMemb"];
        $numSeqCom = $_GET['numSeqCom'];
        $numArt = $_GET['numArt'];
    }

    $resultLikeCom = $class->get_1LikeCom($numMemb, $numSeqCom, $numArt);

    if($resultLikeCom){
        $numMemb = $resultLikeCom['numMemb'];
        $numArt = $resultLikeCom['numArt'];
        $likeC = $resultLikeCom['likeC'];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #p1 {
            max-width: 600px;
            width: 600px;
            max-height: 200px;
            height: 200px;
            border: 1px solid #000000;
            background-color: whitesmoke;
            /* Coins arrondis et couleur du cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
    <h2>Modification d'un Like Article</h2>
    <br>
    <form method="post" action=".\deleteLikeCom.php" class="ui form">
        <div class="field">
            <label>Numéro du Membre</label>
            <input type="number" name="numMemb" placeholder="N° Membre" value="<? echo $numMemb ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro du Commentaire</label>
            <input type="number" name="numSeqCom" placeholder="N° Commentaire" value="<? echo $numSeqCom ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<? echo $numArt ?>" readonly>
        </div>
        <div class="field">
            <label>Like</label>
            <input type="number" min=0 max=1 name="likeC" placeholder="Like" value="<? echo $likeC ?>" readonly>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Annuler">
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>

<?php

if($deleted) {
    echo '<p style="color:green;">Le like commentaire ' . $numMemb . '#' . $numSeqCom . ' #' . $numArt . ' a été supprimé.</p>';
}

require_once __DIR__ . '/footerLikeCom.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>
