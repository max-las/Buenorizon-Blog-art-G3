<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initLangue.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';
    $numPays = '';
    $frPays = '';

    // controle des saisies du formulaire


    // insertion classe LANGUE
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    $maLangue = new LANGUE;

    require_once __DIR__ . '/../../CLASS_CRUD/pays.class.php';
    $monPays = new PAYS;

    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
    $maThematique = new THEMATIQUE;
    $monAngle = new ANGLE;
    $monMotCle = new MOTCLE;



    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./langue.php");
            die();
        }

        $numLang = $_POST["id"];
        $resultLangue = $maLangue->get_1LangueByPays($numLang);

        $thematiques = $maThematique->get_AllThematiquesByLang($numLang);
        $angles = $monAngle->get_AllAnglesByLang($numLang);
        $motcles = $monMotCle->get_AllMotClesByLang($numLang);

        if(!$thematiques && !$angles && !$motcles){
            $maLangue->delete($numLang);
            $deleted = true;
        }else{
            $supprImpossible = true;
        }
    }else{
        $numLang = $_GET["id"];
        $resultLangue = $maLangue->get_1LangueByPays($numLang);
    }

    if($resultLangue){
        $lib1Lang = $resultLangue["lib1Lang"];
        $lib2Lang = $resultLangue["lib2Lang"];
        $numPays = $resultLangue["numPays"];
        $frPays = $resultLangue["frPays"];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
    <h2>Suppression d'une Langue</h2>
    <br>
    <form method="post" action=".\updateLangue.php" class="ui form">
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <div class="field">
            <label>Désignation</label>
            <input type="text" name="lib1Lang" id="lib1Lang" placeholder="Désignation" value="<?= isset($lib1Lang) ? $lib1Lang : ''; ?>" disabled>
        </div>
        <div class="field">
            <label>Dénomination</label>
            <input type="text" name="lib2Lang" id="lib2Lang" placeholder="Dénomination" value="<?= isset($lib2Lang) ? $lib2Lang : ''; ?>" disabled>
        </div>
        <div class="field">
            <label>Pays</label>
            <input type="text" name="numPays" id="numPays" value="<?
                $allPays = $monPays->get_1Pays($numPays);
                echo $allPays['frPays'];
            ?>" disabled>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>
    <br>
<?php

if($supprImpossible){
    echo '<p style="color:red;">Impossible de supprimer la langue "'.$lib2Lang.'" car elle est référencée par les éléments suivant :</p>';

    if($thematiques){
        echo '<p>Table THEMATIQUE :</p>';
        echo '<ul>';
        foreach($thematiques as $row){
            echo '<li>'.$row["libThem"].'</li>';
        }
        echo '</ul>';
    }

    if($angles){
        echo '<p>Table ANGLE :</p>';
        echo '<ul>';
        foreach($angles as $row){
            echo '<li>'.$row["libAngl"].'</li>';
        }
        echo '</ul>';
    }

    if($motcles){
        echo '<p>Table MOTCLE :</p>';
        echo '<ul>';
        foreach($motcles as $row){
            echo '<li>'.$row["libMotCle"].'</li>';
        }
        echo '</ul>';
    }

} elseif($deleted) {
    echo '<p style="color:green;">La langue "'.$lib2Lang.'" a été supprimée.</p>';
}

require_once __DIR__ . '/footerLangue.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
