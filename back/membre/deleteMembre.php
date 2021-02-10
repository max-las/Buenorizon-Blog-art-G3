<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initMembre.php';
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';
    $numLang = '';
    $lib1Lang = '';

    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
    $class = new MEMBRE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./membre.php");
            die();
        }

        $numMemb = $_POST["id"];

        $resultMembre = $class->get_1Membre($numMemb);
        
        $class->delete($numMemb);
        $deleted = true;

    }else{
        $numMemb = $_GET["id"];
        $resultMembre = $class->get_1Membre($numMemb);
    }

    if($resultMembre){
        $prenomMemb = $resultMembre['prenomMemb'];
        $nomMemb = $resultMembre['nomMemb'];
        $pseudoMemb = $resultMembre['pseudoMemb'];
        $passMemb = $resultMembre['passMemb'];
        $eMailMemb = $resultMembre['eMailMemb'];
        $souvenirMemb = $resultMembre['souvenirMemb'];
        $accordMemb = $resultMembre['accordMemb'];
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
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Suppression d'un Membre</h2>

    <form method="post" action=".\deleteMembre.php" class="ui form">
    
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <input type="hidden" id="date" name="date" value="<?= $_GET['date']; ?>" />
        <div class="field">
            <label>Prénom du membre</label>
            <input type="text" name="prenomMemb" placeholder="Prénom" value="<? echo($prenomMemb); ?>" readonly>
        </div>
        <div class="field">
            <label>Nom du membre</label>
            <input type="text" name="nomMemb" placeholder="Nom" value=<? echo($nomMemb); ?> readonly>
        </div>
        <div class="field">
            <label>Pseudo du membre</label>
            <input type="text" name="pseudoMemb" placeholder="Pseudo" value=<? echo($pseudoMemb); ?> readonly>
        </div>
        <div class="field">
            <label>Mot de passe du membre</label>
            <input type="password" name="passMemb" placeholder="Mot de passe" value=<? echo($passMemb); ?> readonly>
        </div>
        <div class="field">
            <label>Email du membre</label>
            <input type="text" name="eMailMemb" placeholder="Email" value=<? echo($eMailMemb); ?> readonly>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="souvenirMemb" <? if($souvenirMemb == 1){ echo('checked'); } ?> readonly>
                <label>Se souvenir ?</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="accordMemb" <? if($accordMemb == 1){ echo('checked'); } ?> readonly>
                <label>Accorder les conditions ?</label>
            </div>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Annuler">
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>

<?php

if($deleted) {
    echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été supprimé.</p>';
}

require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>
