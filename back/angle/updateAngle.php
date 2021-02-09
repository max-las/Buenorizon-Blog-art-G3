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

    <form method="post" action="<?= "./updateAngle.php?id=".$numAngl; ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libAngl"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAngl" id="libAngl" size="80" maxlength="80" value="<?= isset($libAngl) ? $libAngl : ''; ?>"/><br><br>

            <label class="control-label" for="numLang"><b>Pays :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <select name="numLang" id="numLang"> 
            <?php
                $allLangues = $maLangue->get_AllLangues();
                foreach($allLangues as $row){
                    if($row["numLang"] === $numLang){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    echo '<option value="'.$row["numLang"].'" '.$selected.'>'.$row["lib1Lang"].'</option>';
                }
            ?>
            </select>
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

if($updated) {
    echo '<p style="color:green;">L\'angle "'.$libAngl.'" a été bien modifié.</p>';
}

require_once __DIR__ . '/footerAngle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
