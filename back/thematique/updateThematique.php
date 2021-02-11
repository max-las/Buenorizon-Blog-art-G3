<?php

     // Mode DEV
     require_once __DIR__ . '/../../util/utilErrOn.php';

     // Init variables form
     include __DIR__ . '/initThematique.php';
     $updated = false;
     if(!isset($_GET['numThem'])) $_GET['numThem'] = '';
     if(!isset($_GET['numLang'])) $_GET['numLang'] = '';
 
     // controle des saisies du formulaire
 
 
     // insertion classe
     require_once __DIR__ . '/../../CLASS_CRUD/getNextNumThem.php';
     require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
     require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
     $lang = new LANGUE;
     $class = new THEMATIQUE;
 
     // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
     // ajout effectif de l'angle

    $prevNumThem = $_GET['numThem'];
    $prevNumLang = $_GET['numLang'];

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./updateThematique.php?id=".$_POST["id"]);
            die();
        }

        if(isset($_POST['libThem']) && isset($_POST['numLang'])){
            $libThem = $_POST['libThem'];
            $numLang = $_POST['numLang'];
            
            if($prevNumLang == $numLang){
                $numThem = $prevNumThem;
            }else{
                $numThem = getNextNumThem($numLang);
            }

            $class->update($numThem, $prevNumThem, $libThem, $numLang);
            $updated = true;
        }

    }else{
        $libThem = $_GET['libThem'];
        $numLang = $_GET['numLang'];
    }

    $resultThematique = $class->get_1Thematique($numThem);
    
    if($resultThematique){
        $libThem = $resultThematique['libThem'];
        $numLang = $resultThematique['numLang'];
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
    <h2>Modification d'une Thématique</h2>
    <br>

    <?php
    if($updated) {
        echo '<p style="color:green;">La thématique ' . $libThem . '#' . $numThem . ' a été modifiée.</p>';
    }
    ?>

    <form method="post" action=".\updateThematique.php?numThem=<?= $prevNumThem ?>&numLang=<?= $prevNumLang ?>" class="ui form">
        <div class="field">
            <label>Libellé de la Thématique</label>
            <input type="text" name="libThem" placeholder="Thématique" value="<?= $libThem ?>">
        </div>
        <div class="field">
            <label>Numéro de la Langue</label>
            <select name="numLang" id="numLang">
            <? 
                $allLangs = $lang->get_AllLangues();
                foreach($allLangs as $row){
                    if($row['numLang'] == $numLang){
                        $selected = 'selected';
                    }else{
                        $selected = '';
                    }
                    echo('<option value="'.$row['numLang'].'" '.$selected.'>'.$row['numLang'].' - '.$row["lib1Lang"].'</option>');
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