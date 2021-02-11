<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initAngle.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';
    $numLang = '';
    $lib1Lang = '';

    // controle des saisies du formulaire


    // insertion classe ANGLE
    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    $monAngle = new ANGLE;

    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    $monArticle = new ARTICLE;



    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./angle.php");
            die();
        }

        $numAngl = $_POST["id"];

        $resultAngle = $monAngle->get_1AngleWithLang($numAngl);
        $articles = $monArticle->get_AllArticlesByAngle($numAngl);

        if(!$articles){
            $monAngle->delete($numAngl);
            $deleted = true;
        }else{
            $supprImpossible = true;
        }
    }else{
        $numAngl = $_GET["id"];
        $resultAngle = $monAngle->get_1AngleWithLang($numAngl);
    }

    if($resultAngle){
        $libAngl = $resultAngle["libAngl"];
        $numLang = $resultAngle["numLang"];
        $lib1Lang = $resultAngle["lib1Lang"];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Angle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" />
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
    </style>  -->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Angle</h1>
    <h2>Suppression d'un angle</h2>

    <form method="post" action="<?= "./deleteAngle.php?id=".$numAngl; ?>" enctype="multipart/form-data" class="ui form">

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="libAngl"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= $deleted ? '' : $libAngl; ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="numLang"><b>Langue :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <select name="numLang" id="numLang" disabled> 
                    <option value="<?= $deleted ? '' : $numLang; ?>" selected><?php echo $deleted ? '' : $lib1Lang; ?></option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" /> -->
                <button type="submit" value="Annuler" name="Submit" class="ui button">Annuler</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" /> -->
                <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
                <br>
            </div>
        </div>
    </form>
    <br>
<?php

if($supprImpossible){
    echo '<p style="color:red;">Impossible de supprimer l\'angle : "'.$libAngl.'" car il est référencé par les articles suivants :</p>';

    echo '<ul>';
    foreach($articles as $row){
        echo '<li>'.$row["libTitrArt"].'</li>';
    }
    echo '</ul>';

} elseif($deleted) {
    echo '<p style="color:green;">L\'angle "'.$libAngl.'" a été supprimé.</p>';
}

require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
