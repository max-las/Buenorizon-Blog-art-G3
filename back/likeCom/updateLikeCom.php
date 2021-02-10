<?php

     // Mode DEV
     require_once __DIR__ . '/../../util/utilErrOn.php';

     // Init variables form
     include __DIR__ . '/initLikeCom.php';
     $updated = false;
     if(!isset($_GET['numMemb'])) $_GET['numMemb'] = '';
     if(!isset($_GET['numArt'])) $_GET['numArt'] = '';
 
     // controle des saisies du formulaire
 
 
     // insertion classe
     require_once __DIR__ . '/../../CLASS_CRUD/LikeCom.class.php';
     $class = new LIKECOM;
 
     // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
     // ajout effectif de l'angle

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['numMemb']) && isset($_POST['numSeqCom']) && isset($_POST['numArt']) && isset($_POST['likeC'])){
            $numMemb = $_POST["numMemb"];
            $numSeqCom = $_POST['numSeqCom'];
            $numArt = $_POST["numArt"];
            $likeC = $_POST["likeC"];

            $class->update($numMemb, $numSeqCom, $numArt, $likeC);
            $updated = true;
        }

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Like Commentaire</h1>
    <h2>Modification d'un Like Commentaire</h2>
    <br>
    <form method="post" action=".\updateLikeCom.php" class="ui form">
        <div class="field">
            <label>Numéro du Membre</label>
            <input type="number" name="numMemb" placeholder="N° Membre" value="<? echo $numMemb ?>">
        </div>
        <div class="field">
            <label>Numéro du Commentaire</label>
            <input type="number" name="numSeqCom" placeholder="N° Commentaire" value="<? echo $numSeqCom ?>">
        </div>
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<? echo $numArt ?>">
        </div>
        <div class="field">
            <label>Like</label>
            <input type="number" min=0 max=1 name="likeC" placeholder="Like" value="<? echo $likeC ?>">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">Le like commentaire ' . $numMemb . '#' . $numSeqCom . ' #' . $numArt . ' a été modifié.</p>';
}

require_once __DIR__ . '/footerLikeCom.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>