<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initMotCle.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe MOTCLE
    require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
    $monMotCle = new MOTCLE;

    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
    $monMotCleArt = new MOTCLEARTICLE;

    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    $maLangue = new LANGUE;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./motcle.php");
            die();
        }

        $numMotCle = $_POST["id"];
        $resultMotCle = $monMotCle->get_1MotCleWithLang($numMotCle);
        $motclearts = $monMotCleArt->get_AllArticlesByMotCle($numMotCle);

        if(!$motclearts){
            $monMotCle->delete($numMotCle);
            $deleted = true;
        }else{
            $supprImpossible = true;
        }
    }else{
        $numMotCle = $_GET["id"];
        $resultMotCle = $monMotCle->get_1MotCleWithLang($numMotCle);
    }

    if($resultMotCle){
        $libMotCle = $resultMotCle['libMotCle'];
        $numLang = $resultMotCle['numLang'];
        $lib1Lang = $resultMotCle['lib1Lang'];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mot-Clé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!--<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé</h1>
    <h2>Suppression d'un Mot-Clé</h2>
    <br>

    <?php
        if($supprImpossible){
            echo '<div style="color:red;">';
            echo '<p>Impossible de supprimer le mot-clé "'.$libMotCle.'" car il est référencé par les éléments suivants :</p>';

            if($motclearts){
                echo '<p>Table MOTCLEARTICLE :</p>';
                echo '<ul>';
                foreach($motclearts as $row){
                    echo '<li>Article n°'.$row["numArt"].' ('.$row["libTitrArt"].')</li>';
                }
                echo '</ul>';
            }

            echo '</div>';

        } elseif($deleted) {
            echo '<p style="color:green;">Le mot-clé "'.$libMotCle.'" a été supprimé.</p>';
        }
    ?>

    <form method="post" action=".\deleteMotCle.php?id=<?= $numMotCle ?>" class="ui form">
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <div class="field">
            <label>Libellé</label>
            <input type="text" name="libMotCle" id="libMotCle" placeholder="Désignation" value="<?= $libMotCle ?>" disabled>
        </div>
        <div class="field">
            <label>Langue</label>
            <input name="numLang" id="numLang" value="<?
                $lang = $maLangue->get_1Langue($numLang);
                echo $lang['lib1Lang'];
            ?>" disabled>
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Annuler" name="Submit" class="ui button">Annuler</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
    </form>
    <br>
<?php

require_once __DIR__ . '/footerMotCle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
