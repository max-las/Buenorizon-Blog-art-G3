<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initAngle.php';
    $updated = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    $monAngle = new ANGLE;

    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    $maLangue = new LANGUE;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de l'angle


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $numAngl = $_POST["id"];

        if(isset($_POST['libAngl']) && isset($_POST['numLang'])){
            $monAngle->update($numAngl, $_POST['libAngl'], $_POST['numLang']);
            $updated = true;
        }

    }else{
        $numAngl = $_GET["id"];
    }

    $resultAngle = $monAngle->get_1AngleWithLang($numAngl);
    
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

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Angle</h1>
    <h2>Ajout d'un angle</h2>

    <form method="post" action=".\createMembre.php" class="ui form">
        <div class="field">
            <label>Prénom du membre</label>
            <input type="text" name="prenomMemb" placeholder="Prénom">
        </div>
        <div class="field">
            <label>Nom du membre</label>
            <input type="text" name="nomMemb" placeholder="Nom">
        </div>
        <div class="field">
            <label>Pseudo du membre</label>
            <input type="text" name="pseudoMemb" placeholder="Pseudo">
        </div>
        <div class="field">
            <label>Mot de passe du membre</label>
            <input type="text" name="passMemb" placeholder="Mot de passe">
        </div>
        <div class="field">
            <label>Email du membre</label>
            <input type="text" name="eMailMemb" placeholder="Email">
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="souvenirMemb">
                <label>Se souvenir ?</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="accordMemb">
                <label>Accorder les conditions ?</label>
            </div>
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">L\'angle "'.$libAngl.'" a été bien modifié.</p>';
}

require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
