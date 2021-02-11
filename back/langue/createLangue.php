<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initLangue.php';
    $created = false;


    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    require_once __DIR__ . '/../../CLASS_CRUD/getNextNumLang.php';
    $maLangue = new LANGUE;

    require_once __DIR__ . '/../../CLASS_CRUD/pays.class.php';
    $monPays = new PAYS;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la langue


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./createAngle.php");
            die();
        }

        if(!empty($_POST['lib1Lang']) && !empty($_POST['lib2Lang']) && !empty($_POST['numPays'])){
            $maLangue->create(getNextNumLang($_POST['numPays']), $_POST['lib1Lang'], $_POST['lib2Lang'], $_POST['numPays']);
            $created = true;
        }
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
    <form method="post" action=".\createLangue.php" class="ui form">
        <div class="field">
            <label>Désignation</label>
            <input type="text" name="lib1Lang" id="lib1Lang" placeholder="Désignation">
        </div>
        <div class="field">
            <label>Dénomination</label>
            <input type="text" name="lib2Lang" id="lib2Lang" placeholder="Dénomination">
        </div>
        <div class="field">
            <label>Pays</label>
            <select name="numPays" id="numPays"> 
            <?php
                $allPays = $monPays->get_AllPays();
                foreach($allPays as $row){
                    echo '<option value="'.$row["numPays"].'">'.$row["frPays"].'</option>';
                }
            ?>
            </select>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>
<?php

if($created) {
    echo '<p style="color:green;">La langue ' . $_POST['lib2Lang'] . ' a bien été créée.</p>';
}

require_once __DIR__ . '/footerLangue.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
