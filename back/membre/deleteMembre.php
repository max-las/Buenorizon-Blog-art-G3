<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initMembre.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';
    $numLang = '';
    $lib1Lang = '';

    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
    $class = new MEMBRE;

    require_once __DIR__ . '/../../CLASS_CRUD/statut.class.php';
    $monStatut = new STATUT;

    require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
    $monComment = new COMMENT;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./membre.php");
            die();
        }

        $numMemb = $_POST["id"];

        $resultMembre = $class->get_1MembreWithStatut($numMemb);
        
        $comments = $monComment->get_AllCommentsByMembre($numMemb);

        if(!$comments){
            $monMembre->delete($numMemb);
            $deleted = true;
        }else{
            $supprImpossible = true;
        }

    }else{
        $numMemb = $_GET["id"];
        $resultMembre = $class->get_1MembreWithStatut($numMemb);
    }

    if($resultMembre){
        $prenomMemb = $resultMembre['prenomMemb'];
        $nomMemb = $resultMembre['nomMemb'];
        $pseudoMemb = $resultMembre['pseudoMemb'];
        $passMemb = $resultMembre['passMemb'];
        $eMailMemb = $resultMembre['eMailMemb'];
        $souvenirMemb = $resultMembre['souvenirMemb'];
        $accordMemb = $resultMembre['accordMemb'];
        $idStat = $resultMembre['idStat'];
        $libStat = $resultMembre['libStat'];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Suppression d'un Membre</h2>

    <?php 
    if($supprImpossible){
        echo '<div style="color:red;">';
        echo '<p>Impossible de supprimer le membre '.$pseudoMemb.' car il est référencé par les éléments suivant :</p>';
    
        if($comments){
            echo '<p>Table COMMENT :</p>';
            echo '<ul>';
            foreach($comments as $row){
                echo '<li>Commentaire n°'.$row["numSeqCom"].'de l`\'article n°'.$row["numArt"].' ('.$row["pseudoUser"].')</li>';
            }
            echo '</ul>';
        }
    
        echo '</div>';
    
    } elseif($deleted) {
        echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' #' . $numMemb . ' a été supprimé.</p>';
    }
    ?>

    <form method="post" action=".\deleteMembre.php" class="ui form">
    
        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <div class="field">
            <label>Prénom du membre</label>
            <input type="text" name="prenomMemb" placeholder="Prénom" value="<? echo($prenomMemb); ?>" readonly>
        </div>
        <div class="field">
            <label>Nom du membre</label>
            <input type="text" name="nomMemb" placeholder="Nom" value=<? echo($nomMemb); ?> readonly>
        </div>
        <div class="field">
            <label>Pseudo du membre</label>
            <input type="text" name="pseudoMemb" placeholder="Pseudo" value=<? echo($pseudoMemb); ?> readonly>
        </div>
        <div class="field">
            <label>Mot de passe du membre</label>
            <input type="password" name="passMemb" placeholder="Mot de passe" value=<? echo($passMemb); ?> readonly>
        </div>
        <div class="field">
            <label>Email du membre</label>
            <input type="text" name="eMailMemb" placeholder="Email" value=<? echo($eMailMemb); ?> readonly>
        </div>
        <div class="field">
            <label class="control-label" for="idStat"><b>Statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><select name="idStat" id="idStat" disabled> 
                <option value="<?= $deleted ? '' : $idStat; ?>" selected><?php echo $deleted ? '' : $libStat; ?></option>
            </select><br><br>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="souvenirMemb" <? if($souvenirMemb == 1){ echo('checked'); } ?> readonly>
                <label>Se souvenir ?</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" tabindex="0" name="accordMemb" <? if($accordMemb == 1){ echo('checked'); } ?> readonly>
                <label>Accorder les conditions ?</label>
            </div>
        </div>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Annuler" name="Submit" class="ui button">Annuler</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Valider" name="Submit" class="ui button">Valider</button>
    </form>

<?php

require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>

</body>
</html>
