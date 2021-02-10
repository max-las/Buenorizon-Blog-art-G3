<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initMotCleArticle.php';
    $deleted = false;
    if(!isset($_GET['numArt'])) $_GET['numArt'] = '';
    if(!isset($_GET['numMotCle'])) $_GET['numMotCle'] = '';
    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
    $class = new MOTCLEARTICLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./motCleArticle.php");
            die();
        }

        $numArt = $_POST["numArt"];
        $numMotCle = $_POST['numMotCle'];
        
        $class->delete($numMotCle, $numArt);
        $deleted = true;

    }else{
        $numArt = $_GET["numArt"];
        $numMotCle = $_GET['numMotCle'];
    }

    $resultMotCleArticle = $class->get_1MotCleArticle($numMotCle, $numArt);

    if($resultMotCleArticle){
        $numArt = $resultMotCleArticle['numArt'];
        $numMotCle = $resultMotCleArticle['numMotCle'];
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
    <title>Admin - Gestion du CRUD Mot-Clé Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé Article</h1>
    <h2>Modification d'un Mot-Clé Article</h2>
    <br>
    <form method="post" action=".\deleteMotCleArticle.php" class="ui form">
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<? echo $numArt ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro du Mot-Clé</label>
            <input type="number" name="numMotCle" placeholder="N° Mot-Clé" value="<? echo $numMotCle ?>" readonly>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Annuler">
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>

<?php

if($deleted) {
    echo '<p style="color:green;">Le mot-clé article ' . $numArt . ' #' . $numMotCle . ' a été supprimé.</p>';
}

require_once __DIR__ . '/footerMotCleArticle.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>
