<?php

     // Mode DEV
     require_once __DIR__ . '/../../util/utilErrOn.php';

     // Init variables form
     include __DIR__ . '/initLikeArt.php';
     $updated = false;
     if(!isset($_GET['numMemb'])) $_GET['numMemb'] = '';
     if(!isset($_GET['numArt'])) $_GET['numArt'] = '';
 
     // controle des saisies du formulaire
 
 
     // insertion classe
     require_once __DIR__ . '/../../CLASS_CRUD/LikeArt.class.php';
     $class = new LIKEART;
 
     // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
     // ajout effectif de l'angle

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['numMemb']) && isset($_POST['numArt']) && isset($_POST['likeA'])){
            $numMemb = $_POST["numMemb"];
            $numArt = $_POST["numArt"];
            $likeA = $_POST["likeA"];

            $class->update($numMemb, $numArt, $likeA);
            $updated = true;
        }

    }else{
        $numMemb = $_GET["numMemb"];
        $numArt = $_GET['numArt'];
    }

    $resultLikeArt = $class->get_1LikeArt($numMemb, $numArt);
    
    if($resultLikeArt){
        $numMemb = $resultLikeArt['numMemb'];
        $numArt = $resultLikeArt['numArt'];
        $likeA = $resultLikeArt['likeA'];
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
    <h2>Modification d'un Like Article</h2>
    <br>
    <form method="post" action=".\updateLikeArt.php" class="ui form">
        <div class="field">
            <label>Numéro du Membre</label>
            <input type="number" name="numMemb" placeholder="N° Membre" value="<? echo $numMemb ?>">
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<? echo $numArt ?>">
        </div>
        <div class="field">
            <label>Like</label>
            <input type="number" min=0 max=1 name="likeA" placeholder="Like" value="<? echo $likeA ?>">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">Le Like Article ' . $numMemb . ' #' . $numArt . ' a été modifié.</p>';
}

require_once __DIR__ . '/footerLikeArt.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>