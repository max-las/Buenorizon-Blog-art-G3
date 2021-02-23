<?php

    // Mode DEV
    require_once __DIR__ . '/../../util/utilErrOn.php';

    // Init variables form
    include __DIR__ . '/initArticle.php';
    $updated = false;
    if(!isset($_GET['id'])) $_GET['id'] = '';

    // controle des saisies du formulaire


    // insertion classe
    require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
    $monArticle = new ARTICLE;

    require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
    $monAngle = new ANGLE;
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    $maThem = new THEMATIQUE;
    require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
    $maLang = new LANGUE;
    require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
    $monMotCle = new MOTCLE;
    require_once __DIR__ . '/../../CLASS_CRUD/motclearticle.class.php';
    $monMotCleA = new MOTCLEARTICLE;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de l'angle


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST["Submit"] === "Initialiser"){
            header("Location: ./updateArticle.php?id=".$_POST["id"]);
            die();
        }

        $numArt = $_POST["id"];

        $erreur = "";
        $updated = true;

        if(empty($_POST['dtCreArt'])){
            $dtCreArt = '';
            $erreur = $erreur."<li>Il manque la date.</li>";
            $updated = false;
        }else{
            $dtCreArt = $_POST['dtCreArt'];
        }

        if(empty($_POST['libTitrArt'])){
            $libTitrArt = '';
            $erreur = $erreur."<li>Il manque le titre.</li>";
            $updated = false;
        }else{
            $libTitrArt = $_POST['libTitrArt'];
        }

        if(empty($_POST['libChapoArt'])){
            $libChapoArt = '';
            $erreur = $erreur."<li>Il manque le chapeau.</li>";
            $updated = false;
        }else{
            $libChapoArt = $_POST['libChapoArt'];
        }

        if(empty($_POST['libAccrochArt'])){
            $libAccrochArt = '';
            $erreur = $erreur."<li>Il manque l'accroche.</li>";
            $updated = false;
        }else{
            $libAccrochArt = $_POST['libAccrochArt'];
        }

        if(empty($_POST['parag1Art'])){
            $parag1Art = '';
            $erreur = $erreur."<li>Il manque le paragraphe 1.</li>";
            $updated = false;
        }else{
            $parag1Art = $_POST['parag1Art'];
        }

        if(empty($_POST['libSsTitr1Art'])){
            $libSsTitr1Art = '';
            $erreur = $erreur."<li>Il manque le sous-titre 1.</li>";
            $updated = false;
        }else{
            $libSsTitr1Art = $_POST['libSsTitr1Art'];
        }

        if(empty($_POST['parag2Art'])){
            $parag2Art = '';
            $erreur = $erreur."<li>Il manque le paragraphe 2.</li>";
            $updated = false;
        }else{
            $parag2Art = $_POST['parag2Art'];
        }

        if(empty($_POST['libSsTitr2Art'])){
            $libSsTitr2Art = '';
            $erreur = $erreur."<li>Il manque le sous-titre 2.</li>";
            $updated = false;
        }else{
            $libSsTitr2Art = $_POST['libSsTitr2Art'];
        }

        if(empty($_POST['parag3Art'])){
            $parag3Art = '';
            $erreur = $erreur."<li>Il manque le paragraphe 3.</li>";
            $updated = false;
        }else{
            $parag3Art = $_POST['parag3Art'];
        }

        if(empty($_POST['libConclArt'])){
            $libConclArt = '';
            $erreur = $erreur."<li>Il manque la conclusion.</li>";
            $updated = false;
        }else{
            $libConclArt = $_POST['libConclArt'];
        }

        $thisArticle = $monArticle->get_1ArticleWithAngleAndThematique($numArt);
        $urlPhotArt = $thisArticle["urlPhotArt"];
        $filename =  pathinfo($urlPhotArt, PATHINFO_FILENAME);

        if(!$_FILES['imageArt']['size']){
            $newImage = false;
        }else{
            $target_dir = "uploads/";
            $fileType = pathinfo(basename($_FILES["imageArt"]["name"]), PATHINFO_EXTENSION);
            if($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif"){
                $erreur = $erreur."<li>L'image n'est pas au bon format ($fileType). Les formats valides sont JPG, JPEG, PNG et GIF.</li>";
                $created = false;
                $newImage = false;
            }else{
                $urlPhotArt = $filename.".".$fileType;
                $target_file = $target_dir.$urlPhotArt;
                $newImage = true;
            }
        }

        if(empty($_POST['numAngl'])){
            $numAngl = '';
            $erreur = $erreur."<li>Il manque l'angle.</li>";
            $updated = false;
        }else{
            $numAngl = $_POST['numAngl'];
        }

        if(empty($_POST['numThem'])){
            $numThem = '';
            $erreur = $erreur."<li>Il manque la thématique.</li>";
            $upadted = false;
        }else{
            $numThem = $_POST['numThem'];
        }

        if($updated){
            if($newImage){
                unlink("./uploads/".$thisArticle['urlPhotArt']);
                move_uploaded_file($_FILES['imageArt']['tmp_name'], $target_file);
            }
            $monArticle->update($numArt, $_POST['dtCreArt'], $_POST['libTitrArt'], $_POST['libChapoArt'], $_POST['libAccrochArt'], $_POST['parag1Art'], $_POST['libSsTitr1Art'], $_POST['parag2Art'], $_POST['libSsTitr2Art'], $_POST['parag3Art'], $_POST['libConclArt'], $urlPhotArt, $_POST['numAngl'], $_POST['numThem']);
        
            $motcles = $monMotCleArt->get_AllMotClesByArticle($numArt);

            if($motcles){
                foreach($motcles as $row){
                    $monMotCleArt->delete($row['numMotCle'], $numArt);
                }
            }

            $allMotsCles = $monMotCle->get_AllMotCles();
            foreach($allMotsCles as $row){
                if(isset($_POST[$row['numMotCle']])){
                    $monMotCleA->create($row['numMotCle'], $numArt);
                }
            }
        }

    }else{
        $numArt = $_GET["id"];
        $resultArticle = $monArticle->get_1ArticleWithAngleAndThematique($numArt);
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
        $resultThem = $maThem->get_1Thematique($numThem);
        $numLang = $resultThem['numLang'];
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <h2>Ajout d'un article</h2>

    <?php
    if($updated) {
        echo '<p style="color:green;">L\'article "'.$libTitrArt.'" a été bien modifié.</p>';
    } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<p style="color:red;">L\'article n\'a pas été modifié car : </p>';
        echo '<ul style="color:red;">'.$erreur.'</ul>';
    }
    ?>

    <form method="post" action="<?= "./updateArticle.php?id=".$numArt; ?>" enctype="multipart/form-data" class="ui form">

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <div class="field">
                <label class="control-label" for="dtCreArt"><b>Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="dtCreArt" id="dtCreArt" value="<?= date("d-m-Y H:i:s") ?>" disabled /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libTitrArt"><b>Titre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt ?>"/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libChapoArt"><b>Chapeau :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="libChapoArt" id="libChapoArt" cols="80" rows="10"><?= $libChapoArt ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libAccrochArt"><b>Accroche :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libAccrochArt" id="libAccrochArt" size="80" maxlength="80" value="<?= $libAccrochArt ?>"/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="parag1Art"><b>Paragraphe 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="parag1Art" id="parag1Art" cols="80" rows="10"><?= $parag1Art ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libSsTitr1Art"><b>Sous-Titre 1 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" size="80" maxlength="80" value="<?= $libSsTitr1Art ?>"/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="parag2Art"><b>Paragraphe 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="parag2Art" id="parag2Art" cols="80" rows="10"><?= $parag2Art ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libSsTitr2Art"><b>Sous-Titre 2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" size="80" maxlength="80" value="<?= $libSsTitr2Art ?>"/><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="parag3Art"><b>Paragraphe 3 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="parag3Art" id="parag3Art" cols="80" rows="10"><?= $parag3Art ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="libConclArt"><b>Conclusion :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><textarea name="libConclArt" id="libConclArt" cols="80" rows="10"><?= $libConclArt ?></textarea><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="imageArt"><b>Image (laisser vide pour ne pas modifier ) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="file" name="imageArt" id="imageArt" /><br><br>
            </div>

            <div class="field">
                <label class="control-label" for="numLang"><b>Langue :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <br><select name="numLang" id="numLang"> 
                <?php
                    $allLangs = $maLang->get_AllLangues();
                    foreach($allLangs as $row){
                        if($row["numLang"] === $numLang){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        echo '<option value="'.$row["numLang"].'"'.$selected.'>'.$row["numLang"].' - '.$row['lib1Lang'].'</option>';
                    }
                ?>
                </select>
            </div>

            <script>
                $(document).ready(function(){
                    changeSelect();
                    changeThem();
                    changeAngl();

                    $("#numLang").change(function(){
                        changeSelect();
                        changeThem();
                        changeAngl();
                    });
                    $(".themSelect").change(function(){
                        changeThem();
                    });
                    $(".anglSelect").change(function(){
                        changeAngl();
                    });
                });

                function changeThem(){
                    langVal = $("#numLang option:selected").val();
                    themVal = $("#"+langVal).val();
                    $("#numThem").val(themVal);
                }

                function changeAngl(){
                    langVal = $("#numLang option:selected").val();
                    anglVal = $("#ang"+langVal).val();
                    console.log(anglVal);
                    $("#numAngl").val(anglVal);
                }

                function changeSelect(){
                    langVal = $("#numLang option:selected").val();
                    $(".langSelect").hide();
                    $("#them"+langVal).show();
                    $("#angl"+langVal).show();
                    $("#motCle"+langVal).show();

                    $(".checkboxes").prop("checked",false);
                }
            </script>

            <?php 
                foreach($allLangs as $row){
                    $group = $monAngle->get_AllAnglesByLang($row['numLang']);

                    echo "<div class=\"field langSelect\" id=\""."angl".$row['numLang']."\">";
                    echo "<label class=\"control-label\" for=\""."ang".$row['numLang']."\"><b>Angle :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>";
                    echo "<br><select class=\"anglSelect\" name=\""."ang".$row['numLang']."\" id=\""."ang".$row['numLang']."\">";
                    foreach($group as $raw){
                        if($raw["numAngl"] === $numAngl){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        echo '<option value="'.$raw["numAngl"].'"'.$selected.'>'.$raw["libAngl"].'</option>';
                    }
                    echo "</select>";
                    echo "</div>";
                }
            ?>

            <?php
                foreach($allLangs as $row){
                    $group = $maThem->get_AllThematiquesByLang($row['numLang']);
                        
                    echo "<div class=\"field langSelect\" id=\""."them".$row['numLang']."\">";
                    echo "<label class=\"control-label\" for=\"".$row['numLang']."\"><b>Thématique :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>";
                    echo "<br><select class=\"themSelect\" name=\"".$row['numLang']."\" id=\"".$row['numLang']."\">";
                    foreach($group as $raw){
                        if($raw["numThem"] === $numThem){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        echo '<option value="'.$raw["numThem"].'"'.$selected.'>'.$raw["libThem"].'</option>';
                    }
                    echo "</select>";
                    echo "</div>";
                }
            ?>

            <?php 

                $allMotsCles = $monMotCleA->get_AllMotClesByArticle($numArt);

                foreach($allLangs as $row){
                    $group = $monMotCle->get_AllMotClesByLang($row['numLang']);

                    echo "<div class=\"field langSelect\" id=\""."motCle".$row['numLang']."\">";
                    foreach($group as $raw){
                        $checked = "";
                        foreach($allMotsCles as $riw){
                            if($riw['numMotCle'] === $raw['numMotCle']){
                                $checked = "checked";
                            }
                        }
                        

                        echo '<div class="ui checkbox" style="width: 150px; margin-bottom: 10px;">';
                        echo '<input type="checkbox" class="checkboxes" tabindex="0" name="'.$raw['numMotCle'].'"'.$checked.' />';
                        echo '<label>'.$raw['libMotCle'].'</label>';
                        echo '</div>';
                    }
                    echo "</div>";
                }
            ?>

            <input type="hidden" name="numAngl" id="numAngl" value="" />
            <input type="hidden" name="numThem" id="numThem" value="" />
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

require_once __DIR__ . '/footerArticle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
