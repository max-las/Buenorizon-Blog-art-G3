<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php';
$class = new LIKEART;
$created = false;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(!empty($_POST['libStat'])){
//         $monStatut->create($_POST['libStat']);
//         echo('Le statut ' . $_POST['libStat'] . ' a bien été créé.');
//     }
// }else{
//     echo('libStat n\'a pas été renseignée');
// }

require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;

require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
$monArticle = new ARTICLE;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['numMemb']) && isset($_POST['numArt']) && isset($_POST['likeA'])){
        $numMemb = $_POST['numMemb'];
        $numArt = $_POST['numArt'];
        $likeA = $_POST['likeA'];

        $class->create($numMemb, $numArt, $likeA);
        $created = true;

        $pseudoMemb = $monMembre->get_1Membre($numMemb)["pseudoMemb"];
        $libTitrArt = $monArticle->get_1Article($numArt)["libTitrArt"];

    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
    <h2>Ajout d'un Like Article</h2>
    <br>
    <form method="post" action=".\createLikeArt.php" class="ui form">
        <div class="field">
            <label class="control-label" for="numMemb"><b>Membre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <select name="numMemb" id="numMemb" class="ui dropdown"> 
            <?php
                $allMembres = $monMembre->get_AllMembres();
                foreach($allMembres as $row){
                    echo '<option value="'.$row["numMemb"].'">'.$row["pseudoMemb"].'</option>';
                }
            ?>
            </select>
        </div>
        <div class="field">
            <label class="control-label" for="numArt"><b>Article :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <select name="numArt" id="numArt" class="ui dropdown"> 
            <?php
                $allArticles = $monArticle->get_AllArticles();
                foreach($allArticles as $row){
                    echo '<option value="'.$row["numArt"].'">'.$row["libTitrArt"].'</option>';
                }
            ?>
            </select>
        </div>
        <div class="field">
            <input type="hidden" name="likeA" value="1">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
    <?php
    if($created) {
        echo '<p style="color:green;">Le membre ' . $pseudoMemb . ' a liké l\'article ' . $libTitrArt . '.</p>';
    }

    require_once __DIR__ . '/footerLikeArt.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>