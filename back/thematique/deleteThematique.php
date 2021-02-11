<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initThematique.php';
    $deleted = false;
    if(!isset($_GET['numThem'])) $_GET['numThem'] = '';
    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    $lang = new LANGUE;
    $class = new THEMATIQUE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./thematique.php");
            die();
        }

        $numThem = $_POST["numThem"];
        
        $class->delete($numThem);
        $deleted = true;

    }else{
        $numThem = $_GET["numThem"];
    }

    $resultThematique = $class->get_1Thematique($numThem);

    if($resultThematique){
        $numThem = $resultThematique['numThem'];
        $libThem = $resultThematique['libThem'];
        $numLang = $resultThematique['numLang'];
    }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Thématique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Thématique</h1>
    <h2>Suppression d'une Thématique</h2>
    <br>

    <?php
    if($deleted) {
        echo '<p style="color:green;">La thématique ' . $libThem . '#' . $numThem . ' a été supprimée.</p>';
    }
    ?>

    <form method="post" action=".\deleteThematique.php" class="ui form">
        <input type="hidden" name="numThem" value="<?= $numThem ?>">
        <div class="field">
            <label>Libellé de la Thématique</label>
            <input type="text" name="libThem" placeholder="Thématique" value="<?= $libThem ?>" readonly>
        </div>
        <div class="field">
            <label>Numéro de la Langue</label>
            <input type="text" name="numLang" placeholder="N° Langue" value="<?= $numLang ?>" readonly>
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Annuler" name="Submit" class="ui button">Annuler</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
    </form>

<?php

require_once __DIR__ . '/footerThematique.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>
