<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/getNextNumThem.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
$lang = new LANGUE;
$class = new THEMATIQUE;
$created = false;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['libStat'])){
//         $monStatut->create($_POST['libStat']);
//         echo('Le statut ' . $_POST['libStat'] . ' a bien été créé.');
//     }
// }else{
//     echo('libStat n\'a pas été renseignée');
// }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST["Submit"] === "Initialiser"){
        header("Location: ./createThematique.php");
        die();
    }

    if(isset($_POST['libThem']) && isset($_POST['numLang'])){
        $libThem = $_POST['libThem'];
        $numLang = $_POST['numLang'];
        $numThem = getNextNumThem($numLang);

        $class->create($numThem, $libThem, $numLang);
        $created = true;
    }
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
    <h2>Ajout d'une Thématique</h2>
    <br>

    <?php
    if($created) {
        echo '<p style="color:green;">La thématique ' . $libThem . '#' .  $numThem . ' a été créée.</p>';
    }
    ?>

    <form method="post" action=".\createThematique.php" class="ui form">
        <div class="field">
            <label>Libellé de la Thématique</label>
            <input type="text" name="libThem" placeholder="Thématique">
        </div>
        <div class="field">
            <label>Numéro de la Langue</label>
            <select name="numLang" id="numLang">
            <? 
                $allLangs = $lang->get_AllLangues();
                foreach($allLangs as $row){
                    echo('<option value="'.$row['numLang'].'">'.$row['numLang'].' - '.$row["lib1Lang"].'</option>');
                }
            ?>
            </select>
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Initialiser" name="Submit" class="ui button">Initialiser</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
    </form>
    <?php

    require_once __DIR__ . '/footerThematique.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>