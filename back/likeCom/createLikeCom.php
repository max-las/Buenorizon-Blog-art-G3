<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeCom.class.php';
$class = new LIKECOM;
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

require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
$monComment = new COMMENT;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['numMemb']) && isset($_POST['numSeqCom']) && isset($_POST['numArt']) && isset($_POST['likeC'])){
        $numMemb = $_POST['numMemb'];
        $numSeqCom = $_POST['numSeqCom'];
        $numArt = $_POST['numArt'];
        $likeC = $_POST['likeC'];

        $class->create($numMemb, $numSeqCom, $numArt, $likeC);
        $created = true;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#numArt").change(function(){
                var numArt = $("#numArt").val();
                $(".commentField").hide();
                $("#commentField"+numArt).show();
            });

            $(".commentSelect").change(function(){
                $("#numSeqCom").val($(this).val());
            });
        });
    </script>
</head>

<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD Like Commentaire</h1>
    <h2>Ajout d'un Like Commentaire</h2>
    <br>
    <form method="post" action=".\createLikeCom.php" class="ui form">
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

        <?php foreach($allArticles as $row): 
                $comments = $monComment->get_AllCommentsByArticle($row["numArt"]);    
        ?>
                <div class="field commentField" id="<?= 'commentField'.$row['numArt'] ?>">
                    <label class="control-label" for="<?= 'commentSelect'.$row['numArt'] ?>"><b>Commentaire :</b></label>
                    <select class="commentSelect" name="<?= 'commentSelect'.$row['numArt'] ?>" id="<?= 'commentSelect'.$row['numArt'] ?>">
                        <?php foreach($comments as $raw): ?>
                            <option value="<?= $raw['numSeqCom'] ?>"><?= "[".$raw["numSeqCom"]."] [".$raw["pseudoMemb"]."] ".$raw["libCom"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
        <?php endforeach ?>

        <div class="field">
            <input type="hidden" name="numSeqCom" value="">
        </div>
        <div class="field">
            <input type="hidden" name="likeC" value="1">
        </div>
        <br>
        <button class="ui button" type="submit">Valider</button>
    </form>
    <?php
    if($created) {
        echo '<p style="color:green;">Le like commentaire ' . $numMemb . '#' . $numSeqCom . '#' . $numArt . ' a été créé.</p>';
    }

    require_once __DIR__ . '/footerLikeCom.php';

    require_once __DIR__ . '/footer.php';
    ?>
</body>
</html>