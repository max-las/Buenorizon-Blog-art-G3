<?php

     // Mode DEV
     require_once __DIR__ . '/../../util/utilErrOn.php';

     // Init variables form
     include __DIR__ . '/initMembre.php';
     $updated = false;
     if(!isset($_GET['id'])) $_GET['id'] = '';
     if(!isset($_GET['date'])) $_GET['date'] = '';
 
     // controle des saisies du formulaire
 
 
     // insertion classe
     require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
     $class = new MEMBRE;
 
     // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
     // ajout effectif de l'angle

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./updateMembre.php?id=".$_POST["id"]);
            die();
        }

        $numMemb = $_POST["id"];
        $dtCreaMemb = $_POST["date"];
        $passMemb = $_POST['passMemb'];

        if(isset($_POST['prenomMemb']) && isset($_POST['nomMemb']) && isset($_POST['pseudoMemb']) && isset($_POST['eMailMemb'])){
            if(isset($_POST['souvenirMemb'])){
                $souvenirMemb = 1;
            }else{
                $souvenirMemb = 0;
            }
            if(isset($_POST['accordMemb'])){
                $accordMemb = 1;
            }else{
                $accordMemb = 0;
            }

            $class->update($numMemb, $_POST['prenomMemb'], $_POST['nomMemb'], $_POST['pseudoMemb'], $_POST['passMemb'], $_POST['eMailMemb'], $dtCreaMemb, $souvenirMemb, $accordMemb);
            $updated = true;
        }

    }else{
        $numMemb = $_GET["id"];
        $dtCreaMemb = $_GET['date'];
        $passMemb = "";
    }

    $resultMembre = $class->get_1Membre($numMemb);
    
    if($resultMembre){
        $prenomMemb = $resultMembre['prenomMemb'];
        $nomMemb = $resultMembre['nomMemb'];
        $pseudoMemb = $resultMembre['pseudoMemb'];
        $eMailMemb = $resultMembre['eMailMemb'];
        $souvenirMemb = $resultMembre['souvenirMemb'];
        $accordMemb = $resultMembre['accordMemb'];
    }

?>
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
    <h2>Modification d'un Membre</h2>

    <?php
    if($updated) {
        echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été bien modifié.</p>';
    }
    ?>

    <form method="post" action=".\updateMembre.php" class="ui form">
    
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <input type="hidden" id="date" name="date" value="<?= $_GET['date']; ?>" />
        <div class="field">
            <label>Prénom du membre</label>
            <input type="text" name="prenomMemb" placeholder="Prénom" value=<? echo($prenomMemb); ?>>
        </div>
        <div class="field">
            <label>Nom du membre</label>
            <input type="text" name="nomMemb" placeholder="Nom" value=<? echo($nomMemb); ?>>
        </div>
        <div class="field">
            <label>Pseudo du membre</label>
            <input type="text" name="pseudoMemb" placeholder="Pseudo" value=<? echo($pseudoMemb); ?>>
        </div>
        <div class="field">
            <label>Mot de passe du membre</label>
            <input type="password" name="passMemb" placeholder="Mot de passe" value=<? echo($passMemb); ?>  placeholder="(Laisser vide pour ne pas changer)">
        </div>
        <div class="field">
            <label>Email du membre</label>
            <input type="text" name="eMailMemb" placeholder="Email" value=<? echo($eMailMemb); ?>>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="souvenirMemb" <? if($souvenirMemb == 1){ echo('checked'); } ?>>
                <label>Se souvenir ?</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="accordMemb" <? if($accordMemb == 1){ echo('checked'); } ?>>
                <label>Accorder les conditions ?</label>
            </div>
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Initialiser" name="Submit" class="ui button">Initialiser</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
    </form>
<?php

require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>