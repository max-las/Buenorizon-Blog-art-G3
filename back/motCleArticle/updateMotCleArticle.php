<?php

     // Mode DEV
     require_once __DIR__ . '/../../util/utilErrOn.php';

     // Init variables form
     include __DIR__ . '/initMotCleArticle.php';
     $updated = false;
     if(!isset($_GET['numArt'])) $_GET['numArt'] = '';
     if(!isset($_GET['numMotCle'])) $_GET['numMotCle'] = '';
 
     // controle des saisies du formulaire
 
 
     // insertion classe
     require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
     $class = new MOTCLEARTICLE;
 
     // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
     // ajout effectif de l'angle

    $numArt = $_GET["numArt"];
    $numMotCle = $_GET['numMotCle'];

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['numArt']) && isset($_POST['numMotCle'])){
            $newNumArt = $_POST["numArt"];
            $newNumMotCle = $_POST['numMotCle'];

            $class->update($newNumMotCle, $newNumArt, $numMotCle, $numArt);
            $updated = true;

            $resultMotCleArticle = $class->get_1MotCleArticle($newNumMotCle, $newNumArt);
        }

    }else{
        $resultMotCleArticle = $class->get_1MotCleArticle($numMotCle, $numArt);
    }
    
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé Article</h1>
    <h2>Modification d'un Mot-Clé Article</h2>
    <br>
    <form method="post" action=".\updateMotCleArticle.php?numArt=<?= $numArt ?>&numMotCle=<?= $numMotCle ?>" class="ui form">
        <div class="field">
            <label>Numéro de l'Article</label>
            <input type="number" name="numArt" placeholder="N° Article" value="<? echo $numArt ?>">
        </div>
        <div class="field">
            <label>Numéro du Mot-Clé</label>
            <input type="number" name="numMotCle" placeholder="N° Mot-Clé" value="<? echo $numMotCle ?>">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">Le mot-clé article ' . $numArt . '#' . $numMotCle . ' a été modifié.</p>';
}

require_once __DIR__ . '/footerMotCleArticle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>