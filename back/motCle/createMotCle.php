<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initMotCle.php';
    $created = false;

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
    $monMotCle = new MOTCLE;

    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    $maLangue = new LANGUE;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./createMotCle.php");
            die();
        }

        $erreur = "";
        $created = true;

        if(empty($_POST['libMotCle'])){
            $libMotCle = '';
            $erreur = $erreur."<li>Il manque le libellé.</li>";
            $created = false;
        }else{
            $libMotCle = $_POST['libMotCle'];
        }

        if(empty($_POST['numLang'])){
            $numLang = '';
            $erreur = $erreur."<li>Il manque la langue.</li>";
            $created = false;
        }else{
            $numLang = $_POST['numLang'];
        }

        if($created){
            $monMotCle->create($_POST['libMotCle'], $_POST['numLang']);
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mot-Clé</h1>
    <h2>Ajout d'un mot-clé</h2>

    <form method="post" action="./createMotCle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Mot-Clé...</legend>

        <!-- <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" /> -->

        <div class="control-group">
            <label class="control-label" for="libMotCle"><b>Libellé :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libMotCle" id="libMotCle" size="80" maxlength="80" value="<?= $libMotCle ?>"/><br><br>

            <label class="control-label" for="numLang"><b>Langue :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><select name="numLang" id="numLang"> 
            <?php
                $allLangues = $maLangue->get_AllLangues();
                foreach($allLangues as $row){
                    echo '<option value="'.$row["numLang"].'">'.$row["lib1Lang"].'</option>';
                }
            ?>
            </select><br><br>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
<?php

if($created) {
    echo '<p style="color:green;">Le mot-clé "'.$_POST['libMotCle'].'" a été créé.</p>';
} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<p style="color:red;">Le mot-clé n\'a pas été créé car : </p>';
    echo '<ul style="color:red;">'.$erreur.'</ul>';
}

require_once __DIR__ . '/footerMotCle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
