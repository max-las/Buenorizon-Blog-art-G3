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
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé</h1>
    <h2>Suppression d'un mot-clé</h2>
<?php
    // Supp : récup id à supprimer



?>    <form method="post" action="<?= "./deleteMotCle.php?id=".$numMotCle; ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Mot-Clé...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libMotCle"><b>Titre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libMotCle" id="libMotCle" size="80" maxlength="80" value="<?= $deleted ? '' : $libMotCle ?>" disabled/><br><br>

            <label class="control-label" for="numLang"><b>Thématique :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><select name="numLang" id="numLang" disabled> 
                <option value="<?= $deleted ? '' : $numLang; ?>" selected><?php echo $deleted ? '' : $lib1Lang; ?></option>
            </select>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
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

require_once __DIR__ . '/footerMotCle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
