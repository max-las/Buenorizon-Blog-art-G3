<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php
    ///////////////////////////////////////////////////////////////
    //
    //  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
    //
    //  Script  : createStatut.php  (ETUD)   -   BLOGART21
    //
    ///////////////////////////////////////////////////////////////

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initStatut.php';
    $created = false;


    // controle des saisies du formulaire


    // insertion classe STATUT

    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    $monStatut = new STATUT;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./createStatut.php");
            die();
        }

        $erreur = "";
        $created = true;

        if(empty($_POST['libStat'])){
            $libStat = '';
            $erreur = $erreur."<li>Il manque le libellé.</li>";
            $created = false;
        }else{
            $libStat = $_POST['libStat'];
        }

        if($created){
            $monStatut->create($_POST['libStat']);
        }
    }





?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!--<link href="../css/style.css" rel="stylesheet" type="text/css" />-->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>
    <h2>Ajout d'un statut</h2>

    <?php
    if($created) {
        echo '<p style="color:green;">Le statut "'.$_POST['libStat'].'" a été créé.</p>';
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<p style="color:red;">Le statut n\'a pas été créé car : </p>';
        echo '<ul style="color:red;">'.$erreur.'</ul>';
    }
    ?>

    <form method="post" action="./createStatut.php" enctype="multipart/form-data" class="ui form">

        <!-- <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" /> -->

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="libStat"><b>Nom du statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat; ?>" autofocus="autofocus" />
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" value="Initialiser" name="Submit" class="ui button">Initialiser</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
                <br>
            </div>
        </div>
    </form>
<?php
require_once __DIR__ . '/footerStatut.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
