<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initUser.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe USER
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    $monUser = new USER;

    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    $monStatut = new STATUT;



    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./user.php");
            die();
        }

        $pseudoUser = $_POST["id"];
        $resultUser = $monUser->get_1UserWithStatut($pseudoUser);

        $monUser->delete($pseudoUser);
        $deleted = true;
    }else{
        $pseudoUser = $_GET["id"];
        $resultUser = $monUser->get_1UserWithStatut($pseudoUser);
    }

    if($resultUser){
        $passUser = $resultUser['passUser'];
        $nomUser = $resultUser['nomUser'];
        $prenomUser = $resultUser['prenomUser'];
        $eMailUser = $resultUser['eMailUser'];
        $idStat = $resultUser['idStat'];
        $libStat = $resultUser['libStat'];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" />
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
    </style> -->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD User</h1>
    <h2>Suppression d'un utilisateur</h2>

    <?php
    if($deleted) {
        echo '<p style="color:green;">L\'utilisateur "'.$pseudoUser.'" a été supprimé.</p>';
    }
    ?>

    <form method="post" action="<?= "./deleteUser.php?id=".$pseudoUser; ?>" enctype="multipart/form-data" class="ui form">

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="pseudoUser" id="pseudoUser" size="80" maxlength="80" value="<?= $deleted ? '' : $pseudoUser ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="passUser"><b>Mot de passe (chiffré) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="passUser" id="passUser" size="80" maxlength="80" value="<?= $deleted ? '' :  $passUser ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="nomUser"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="nomUser" id="nomUser" size="80" maxlength="80" value="<?= $deleted ? '' : $nomUser ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="prenomUser"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="prenomUser" id="prenomUser" size="80" maxlength="80" value="<?= $deleted ? '' : $prenomUser ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="eMailUser"><b>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="eMailUser" id="eMailUser" size="80" maxlength="80" value="<?= $deleted ? '' : $eMailUser ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="idStat"><b>Statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><select name="idStat" id="idStat" disabled> 
                    <option value="<?= $deleted ? '' : $idStat; ?>" selected><?php echo $deleted ? '' : $libStat; ?></option>
                </select>
            </div>

        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" /> -->
                <button type="submit" value="Annuler" name="Submit" class="ui button">Annuler</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" /> -->
                <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
                <br>
            </div>
        </div>
      </fieldset>
    </form>
    <br>
<?php

require_once __DIR__ . '/footerUser.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
