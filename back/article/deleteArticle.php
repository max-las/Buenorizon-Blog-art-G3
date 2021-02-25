<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // Init variables form
    include __DIR__ . '/initArticle.php';
    $supprImpossible = false;
    $deleted = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe ARTICLE
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    $monArticle = new ARTICLE;

    // Ctrl CIR
    require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
    $monComment = new COMMENT;
    require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
    $monLikeArt = new LIKEART;
    require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
    $monMotCleArt = new MOTCLEARTICLE;



    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective du statut
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if($_POST["Submit"] === "Annuler"){
            header("Location: ./article.php");
            die();
        }

        $numArt = $_POST["id"];

        $resultArticle = $monArticle->get_1ArticleWithAngleAndThematique($numArt);
        $comments = $monComment->get_AllCommentsByArticle($numArt);
        $likearts = $monLikeArt->get_AllLikesArtByArticle($numArt);
        $motcles = $monMotCleArt->get_AllMotClesByArticle($numArt);

        if($motcles){
            foreach($motcles as $row){
                $monMotCleArt->delete($row['numMotCle'], $numArt);
            }
        }

        if(!$comments && !$likearts){
            $monArticle->delete($numArt);
            if(file_exists("./uploads/".$resultArticle['urlPhotArt'])){
                unlink("./uploads/".$resultArticle['urlPhotArt']);
            }
            $deleted = true;
        }else{
            $supprImpossible = true;
        }
    }else{
        $numArt = $_GET["id"];
        $resultArticle = $monArticle->get_1ArticleWithAngleAndThematique($numArt);
    }

    if($resultArticle){
        $dtCreArt = $resultArticle['dtCreArt'];
        $libTitrArt = $resultArticle['libTitrArt'];
        $libChapoArt = $resultArticle['libChapoArt'];
        $libAccrochArt = $resultArticle['libAccrochArt'];
        $parag1Art = $resultArticle['parag1Art'];
        $libSsTitr1Art = $resultArticle['libSsTitr1Art'];
        $parag2Art = $resultArticle['parag2Art'];
        $libSsTitr2Art = $resultArticle['libSsTitr2Art'];
        $parag3Art = $resultArticle['parag3Art'];
        $libConclArt = $resultArticle['libConclArt'];
        $urlPhotArt = $resultArticle['urlPhotArt'];
        $numAngl = $resultArticle['numAngl'];
        $numThem = $resultArticle['numThem'];
        $libAngl = $resultArticle['libAngl'];
        $libThem = $resultArticle['libThem'];
    }

    if($dtCreArt){
        $dtCreArt = date('Y-m-d\TH:i', strtotime($dtCreArt));
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
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <h2>Suppression d'un article</h2>

    <?php 
    if($supprImpossible){
        echo '<div style="color:red;">';
        echo '<p>Impossible de supprimer l\'article "'.$libTitrArt.'" car il est référencé par les éléments suivants :</p>';
    
        if($comments){
            echo '<p>Table COMMENT (numéros valables pour cet article uniquement) :</p>';
            echo '<ul>';
            foreach($comments as $row){
                echo '<li>Commentaire n°'.$row["numSeqCom"].' ('.$row["libCom"].')</li>';
            }
            echo '</ul>';
        }
    
        if($likearts){
            echo '<p>Table LIKEART :</p>';
            echo '<ul>';
            foreach($likearts as $row){
                echo '<li>Membre n°'.$row["numMemb"].' ('.$row["pseudoMemb"].')</li>';
            }
            echo '</ul>';
        }
    
        echo '</div>';
    
    } elseif($deleted) {
        echo '<p style="color:green;">L\'article "'.$libTitrArt.'" a été supprimé.</p>';
    }
    ?>

   <form method="post" action="<?= "./deleteArticle.php?id=".$numArt; ?>" enctype="multipart/form-data" class="ui form">

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="dtCreArt"><b>Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="datetime-local" name="dtCreArt" id="dtCreArt" size="80" maxlength="80" value="<?= $deleted ? '' : $dtCreArt ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libTitrArt"><b>Titre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $deleted ? '' : $libTitrArt ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libChapoArt"><b>Chapeau :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="libChapoArt" id="libChapoArt" cols="80" rows="10" disabled><?= $deleted ? '' : $libChapoArt ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libAccrochArt"><b>Accroche :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $deleted ? '' : $libAccrochArt ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="parag1Art"><b>Paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="parag1Art" id="parag1Art" cols="80" rows="10" disabled><?= $deleted ? '' : $parag1Art ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libSsTitr1Art"><b>Sous-Titre 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $deleted ? '' : $libSsTitr1Art ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="parag2Art"><b>Paragraphe 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="parag2Art" id="parag2Art" cols="80" rows="10" disabled><?= $deleted ? '' : $parag2Art ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libSsTitr2Art"><b>Sous-Titre 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $deleted ? '' : $libSsTitr2Art ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="parag3Art"><b>Paragraphe 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="parag3Art" id="parag3Art" cols="80" rows="10" disabled><?= $deleted ? '' : $parag3Art ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libConclArt"><b>Conclusion :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="libConclArt" id="libConclArt" cols="80" rows="10" disabled><?= $deleted ? '' : $libConclArt ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="urlPhotArt"><b>URL Photo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="urlPhotArt" id="urlPhotArt" size="80" maxlength="80" value="<?= $deleted ? '' : $urlPhotArt ?>" disabled/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="numAngl"><b>Angle :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><select name="numAngl" id="numAngl" disabled> 
                    <option value="<?= $deleted ? '' : $numAngl; ?>" selected><?php echo $deleted ? '' : $libAngl; ?></option>
                </select><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="numThem"><b>Thématique :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><select name="numThem" id="numThem" disabled> 
                    <option value="<?= $deleted ? '' : $numThem; ?>" selected><?php echo $deleted ? '' : $libThem; ?></option>
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
    </form>
    <br>
<?php

require_once __DIR__ . '/footerArticle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
