<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initUser.php';
    $created = false;

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
    $monUser = new USER;

    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    $monStatut = new STATUT;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./createUser.php");
            die();
        }
    }

    $erreur = "";
    $created = true;

    if(empty($_POST['pseudoUser'])){
        $pseudoUser = '';
        $erreur = $erreur."<li>Il manque le pseudo.</li>";
        $created = false;
    }else{
        $pseudoUser = $_POST['pseudoUser'];
    }

    if(empty($_POST['passUser'])){
        $passUser = '';
        $erreur = $erreur."<li>Il manque le mot de passe.</li>";
        $created = false;
    }else{
        $passUser = $_POST['passUser'];
    }

    if(empty($_POST['nomUser'])){
        $nomUser = '';
        $erreur = $erreur."<li>Il manque le nom.</li>";
        $created = false;
    }else{
        $nomUser = $_POST['nomUser'];
    }

    if(empty($_POST['prenomUser'])){
        $prenomUser = '';
        $erreur = $erreur."<li>Il manque le prénom.</li>";
        $created = false;
    }else{
        $prenomUser = $_POST['prenomUser'];
    }

    if(empty($_POST['eMailUser'])){
        $eMailUser = '';
        $erreur = $erreur."<li>Il manque l'email.</li>";
        $created = false;
    }else{
        $eMailUser = $_POST['eMailUser'];
    }

    if(empty($_POST['idStat'])){
        $idStat = '';
        $erreur = $erreur."<li>Il manque le statut.</li>";
        $created = false;
    }else{
        $idStat = $_POST['idStat'];
    }

    if($monUser->get_ExistPseudo($pseudoUser)){
        $erreur = $erreur."<li>Ce pseudo existe déjà.</li>";
        $created = false;
    }

    if($created){
        $monUser->create($_POST['pseudoUser'], $_POST['passUser'], $_POST['nomUser'], $_POST['prenomUser'], $_POST['eMailUser'], $_POST['idStat']);
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
    if($created) {
        echo '<p style="color:green;">L\'utilisateur "'.$_POST['pseudoUser'].'" a été créé.</p>';
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<p style="color:red;">L\'utilisateur n\'a pas été créé car : </p>';
        echo '<ul style="color:red;">'.$erreur.'</ul>';
    }
    ?>

    <form method="post" action="./createUser.php" enctype="multipart/form-data" class="ui form">

        <!-- <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" /> -->

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="pseudoUser" id="pseudoUser" size="80" maxlength="80" value="<?= $pseudoUser ?>" /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="passUser"><b>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="passUser" id="passUser" size="80" maxlength="80" value="<?= $passUser ?>" /><br><br>
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
