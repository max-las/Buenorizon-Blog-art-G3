<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
$class = new MEMBRE;

$created = false;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['libStat'])){
//         $monStatut->create($_POST['libStat']);
//         echo('Le statut ' . $_POST['libStat'] . ' a bien été créé.');
//     }
// }else{
//     echo('libStat n\'a pas été renseignée');
// }

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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST["Submit"] === "Initialiser"){
        header("Location: ./createMembre.php");
        die();
    }

    if(!empty($_POST['prenomMemb']) && !empty($_POST['nomMemb']) && !empty($_POST['pseudoMemb']) && !empty($_POST['passMemb']) && !empty($_POST['eMailMemb']) && !empty($_POST['souvenirMemb']) && !empty($_POST['accordMemb'])){
        $class->create($_POST['prenomMemb'],$_POST['nomMemb'],$_POST['pseudoMemb'],$_POST['passMemb'],$_POST['eMailMemb'],date('Y-m-d H:i:s'),$souvenirMemb, $accordMemb);
        $created = true;
    }
}

?>
<!DOCTYPE html>
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
    <h2>Ajout d'un Membre</h2>
    <br>

    <?php
    if($created) {
        echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été créé.</p>';
    }
    ?>

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
            <input type="password" name="passMemb" placeholder="Mot de passe">
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