<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initLangue.php';
    $updated = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    $maLangue = new LANGUE;

    require_once __DIR__ . '/../../CLASS_CRUD/pays.class.php';
    $monPays = new PAYS;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la langue


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./createLangue.php");
            die();
        }

        $numLang = $_POST["id"];

        if(isset($_POST['lib1Lang']) && isset($_POST['lib2Lang']) && isset($_POST['numPays'])){
            $maLangue->update($numLang, $_POST['lib1Lang'], $_POST['lib2Lang'], $_POST['numPays']);
            $updated = true;
        }

    }else{
        $numLang = $_GET["id"];
    }

    $resultLangue = $maLangue->get_1LangueByPays($numLang);
    
    if($resultLangue){
        $lib1Lang = $resultLangue["lib1Lang"];
        $lib2Lang = $resultLangue["lib2Lang"];
        $numPays = $resultLangue["numPays"];
        $frPays = $resultLangue["frPays"];
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
    <h2>Modification d'une Langue</h2>
    <br>
    <form method="post" action=".\updateLangue.php" class="ui form">
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <div class="field">
            <label>Désignation</label>
            <input type="text" name="lib1Lang" id="lib1Lang" placeholder="Désignation" value="<?= isset($lib1Lang) ? $lib1Lang : ''; ?>">
        </div>
        <div class="field">
            <label>Dénomination</label>
            <input type="text" name="lib2Lang" id="lib2Lang" placeholder="Dénomination" value="<?= isset($lib2Lang) ? $lib2Lang : ''; ?>">
        </div>
        <div class="field">
            <label>Pays</label>
            <select name="numPays" id="numPays"> 
            <?php
                $allPays = $monPays->get_AllPays();
                foreach($allPays as $row){
                    if($row["numPays"] === $numPays){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    echo '<option value="'.$row["numPays"].'" '.$selected.'>'.$row["frPays"].'</option>';
                }
            ?>
            </select>
        </div>
        <br>
        <input class="ui button" type="submit" name="Submit" value="Valider">
    </form>
<?php

if($updated) {
    echo '<p style="color:green;">La langue "'.$lib2Lang.'" a été bien modifiée.</p>';
}

require_once __DIR__ . '/footerLangue.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
