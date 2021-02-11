<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initUser.php';
    $updated = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    $monUser = new USER;

    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    $monStatut = new STATUT;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de l'user


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./updateUser.php?id=".$_POST["id"]);
            die();
        }

        $pseudoUser = $_POST["id"];
        
        $erreur = "";
        $updated = true;
    
        $passUser = $_POST['passUser'];
    
        if(empty($_POST['nomUser'])){
            $nomUser = '';
            $erreur = $erreur."<li>Il manque le nom.</li>";
            $updated = false;
        }else{
            $nomUser = $_POST['nomUser'];
        }
    
        if(empty($_POST['prenomUser'])){
            $prenomUser = '';
            $erreur = $erreur."<li>Il manque le prénom.</li>";
            $updated = false;
        }else{
            $prenomUser = $_POST['prenomUser'];
        }
    
        if(empty($_POST['eMailUser'])){
            $eMailUser = '';
            $erreur = $erreur."<li>Il manque l'email.</li>";
            $updated = false;
        }else{
            $eMailUser = $_POST['eMailUser'];
        }
    
        if(empty($_POST['idStat'])){
            $idStat = '';
            $erreur = $erreur."<li>Il manque le statut.</li>";
            $updated = false;
        }else{
            $idStat = $_POST['idStat'];
        }

        if($updated){
            $monUser->update($pseudoUser, $_POST['passUser'], $_POST['nomUser'], $_POST['prenomUser'], $_POST['eMailUser'], $_POST['idStat']);
        }

    }else{
        $pseudoUser = $_GET["id"];
        $resultUser = $monUser->get_1UserWithStatut($pseudoUser);
        $passUser = "";
        $nomUser = $resultUser['nomUser'];
        $prenomUser = $resultUser['prenomUser'];
        $eMailUser = $resultUser['eMailUser'];
        $idStat = $resultUser['idStat'];
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
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD User</h1>
    <h2>Ajout d'un utilisateur</h2>

    <?php
    if($updated) {
        echo '<p style="color:green;">L\'utilisateur "'.$pseudoUser.'" a été modifié.</p>';
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<p style="color:red;">L\'utilisateur n\'a pas été modifié car : </p>';
        echo '<ul style="color:red;">'.$erreur.'</ul>';
    }
    ?>

    <form method="post" action="<?= "./updateUser.php?id=".$pseudoUser; ?>" enctype="multipart/form-data" class="ui form">

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="pseudoUser" id="pseudoUser" size="80" maxlength="80" value="<?= $pseudoUser ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="passUser"><b>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="passUser" id="passUser" size="80" maxlength="80" value="<?= $passUser ?>" placeholder="(Laisser vide pour ne pas changer)" /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="nomUser"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="nomUser" id="nomUser" size="80" maxlength="80" value="<?= $nomUser ?>" /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="prenomUser"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="prenomUser" id="prenomUser" size="80" maxlength="80" value="<?= $prenomUser ?>" /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="eMailUser"><b>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="eMailUser" id="eMailUser" size="80" maxlength="80" value="<?= $eMailUser ?>" /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="idStat"><b>Statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><select name="idStat" id="idStat"> 
                <?php
                    $allStatuts = $monStatut->get_AllStatuts();
                    foreach($allStatuts as $row){
                        if($row["idStat"] === $idStat){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        echo '<option value="'.$row["idStat"].'" '.$selected.'>'.$row["libStat"].'</option>';
                    }
                ?>
                </select>
            </div>

        </div>

        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" /> -->
                <button type="submit" value="Initialiser" name="Submit" class="ui button">Initialiser</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" /> -->
                <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
                <br>
            </div>
        </div>

    </form>
<?php

require_once __DIR__ . '/footerUser.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
