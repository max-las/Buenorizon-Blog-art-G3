<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initArticle.php';
    $created = false;

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    $monArticle = new ARTICLE;

    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    $monAngle = new ANGLE;
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    $maThem = new THEMATIQUE;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./createArticle.php");
            die();
        }

        $erreur = "";
        $created = true;

        if(empty($_POST['dtCreArt'])){
            $dtCreArt = '';
            $erreur = $erreur."<li>Il manque la date.</li>";
            $created = false;
        }else{
            $dtCreArt = $_POST['dtCreArt'];
        }

        if(empty($_POST['libTitrArt'])){
            $libTitrArt = '';
            $erreur = $erreur."<li>Il manque le titre.</li>";
            $created = false;
        }else{
            $libTitrArt = $_POST['libTitrArt'];
        }

        if(empty($_POST['libChapoArt'])){
            $libChapoArt = '';
            $erreur = $erreur."<li>Il manque le chapeau.</li>";
            $created = false;
        }else{
            $libChapoArt = $_POST['libChapoArt'];
        }

        if(empty($_POST['libAccrochArt'])){
            $libAccrochArt = '';
            $erreur = $erreur."<li>Il manque l'accroche.</li>";
            $created = false;
        }else{
            $libAccrochArt = $_POST['libAccrochArt'];
        }

        if(empty($_POST['parag1Art'])){
            $parag1Art = '';
            $erreur = $erreur."<li>Il manque le paragraphe 1.</li>";
            $created = false;
        }else{
            $parag1Art = $_POST['parag1Art'];
        }

        if(empty($_POST['libSsTitr1Art'])){
            $libSsTitr1Art = '';
            $erreur = $erreur."<li>Il manque le sous-titre 1.</li>";
            $created = false;
        }else{
            $libSsTitr1Art = $_POST['libSsTitr1Art'];
        }

        if(empty($_POST['parag2Art'])){
            $parag2Art = '';
            $erreur = $erreur."<li>Il manque le paragraphe 2.</li>";
            $created = false;
        }else{
            $parag2Art = $_POST['parag2Art'];
        }

        if(empty($_POST['libSsTitr2Art'])){
            $libSsTitr2Art = '';
            $erreur = $erreur."<li>Il manque le sous-titre 2.</li>";
            $created = false;
        }else{
            $libSsTitr2Art = $_POST['libSsTitr2Art'];
        }

        if(empty($_POST['parag3Art'])){
            $parag3Art = '';
            $erreur = $erreur."<li>Il manque le paragraphe 3.</li>";
            $created = false;
        }else{
            $parag3Art = $_POST['parag3Art'];
        }

        if(empty($_POST['libConclArt'])){
            $libConclArt = '';
            $erreur = $erreur."<li>Il manque la conclusion.</li>";
            $created = false;
        }else{
            $libConclArt = $_POST['libConclArt'];
        }

        if(empty($_POST['urlPhotArt'])){
            $urlPhotArt = '';
            $erreur = $erreur."<li>Il manque l'url de la photo.</li>";
            $created = false;
        }else{
            $urlPhotArt = $_POST['urlPhotArt'];
        }

        if(empty($_POST['numAngl'])){
            $numAngl = '';
            $erreur = $erreur."<li>Il manque l'angle.</li>";
            $created = false;
        }else{
            $numAngl = $_POST['numAngl'];
        }

        if(empty($_POST['numThem'])){
            $numThem = '';
            $erreur = $erreur."<li>Il manque la thématique.</li>";
            $created = false;
        }else{
            $numThem = $_POST['numThem'];
        }

        if($created){
            $monArticle->create($_POST['dtCreArt'], $_POST['libTitrArt'], $_POST['libChapoArt'], $_POST['libAccrochArt'], $_POST['parag1Art'], $_POST['libSsTitr1Art'], $_POST['parag2Art'], $_POST['libSsTitr2Art'], $_POST['parag3Art'], $_POST['libConclArt'], $_POST['urlPhotArt'], $_POST['numAngl'], $_POST['numThem']);
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
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <h2>Ajout d'un article</h2>

    <form method="post" action="./createArticle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Article...</legend>

        <!-- <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" /> -->

        <div class="control-group">
            <label class="control-label" for="dtCreArt"><b>Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="datetime-local" name="dtCreArt" id="dtCreArt" size="80" maxlength="80" value="<?= $dtCreArt ?>" autofocus/><br><br>

            <label class="control-label" for="libTitrArt"><b>Titre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt ?>"/><br><br>

            <label class="control-label" for="libChapoArt"><b>Chapeau :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><textarea name="libChapoArt" id="libChapoArt" cols="80" rows="10"><?= $libChapoArt ?></textarea><br><br>

            <label class="control-label" for="libAccrochArt"><b>Accroche :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $libAccrochArt ?>"/><br><br>

            <label class="control-label" for="parag1Art"><b>Paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><textarea name="parag1Art" id="parag1Art" cols="80" rows="10"><?= $parag1Art ?></textarea><br><br>

            <label class="control-label" for="libSsTitr1Art"><b>Sous-Titre 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $libSsTitr1Art ?>"/><br><br>

            <label class="control-label" for="parag2Art"><b>Paragraphe 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><textarea name="parag2Art" id="parag2Art" cols="80" rows="10"><?= $parag2Art ?></textarea><br><br>

            <label class="control-label" for="libSsTitr2Art"><b>Sous-Titre 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $libSsTitr2Art ?>"/><br><br>

            <label class="control-label" for="parag3Art"><b>Paragraphe 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><textarea name="parag3Art" id="parag3Art" cols="80" rows="10"><?= $parag3Art ?></textarea><br><br>

            <label class="control-label" for="libConclArt"><b>Conclusion :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><textarea name="libConclArt" id="libConclArt" cols="80" rows="10"><?= $libConclArt ?></textarea><br><br>

            <label class="control-label" for="urlPhotArt"><b>URL Photo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="urlPhotArt" id="urlPhotArt" size="80" maxlength="80" value="<?= $urlPhotArt ?>"/><br><br>

            <label class="control-label" for="numAngl"><b>Angle :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><select name="numAngl" id="numAngl"> 
            <?php
                $allAngles = $monAngle->get_AllAngles();
                foreach($allAngles as $row){
                    echo '<option value="'.$row["numAngl"].'">'.$row["libAngl"].'</option>';
                }
            ?>
            </select><br><br>

            <label class="control-label" for="numThem"><b>Thématique :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <br><select name="numThem" id="numThem"> 
            <?php
                $allThems = $maThem->get_AllThematiques();
                foreach($allThems as $row){
                    echo '<option value="'.$row["numThem"].'">'.$row["libThem"].'</option>';
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

if($created) {
    echo '<p style="color:green;">L\'article "'.$_POST['libTitrArt'].'" a été créé.</p>';
} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<p style="color:red;">L\'article n\'a pas été créé car : </p>';
    echo '<ul style="color:red;">'.$erreur.'</ul>';
}

require_once __DIR__ . '/footerArticle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
