<?php
require_once('../commons/header.php');

require_once __DIR__ . '/../../../CLASS_CRUD/article.class.php';
$monArticle = new ARTICLE;
require_once __DIR__ . '/../../../CLASS_CRUD/comment.class.php';
$monComment = new COMMENT;
require_once __DIR__ . '/../../../CLASS_CRUD/commentPlus.class.php';
$monCommentPlus = new COMMENTPLUS;
require_once __DIR__ . '/../../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;

$numArt = isset($_GET["id"]) ? $_GET["id"] : "";
$e = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ . '/../../../CLASS_CRUD/getNextNumCom.php';
    if(/*Déterminer si c'est un commentaire ou une réponse*/){
        if(isset($_SESSION['pseudoMemb'])){
            $numMemb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb'])['numMemb'];
            $libCom = $_POST['libCom'];
    
            if(!empty($libCom)){
                $monComment->create(getNextNumCom($numArt), $numArt, date('Y-m-d H:i:s'), $libCom, 0, 0, 0, $numMemb);
            }else{
                $e = 'Veuillez spécifier votre commentaire.';
            }
        }else{
            $e = 'Vous ne vous êtes pas connecté(e).';
        }
    }
}

$libTitrArt = 'Dronisos';
$libChapoArt = 'Comment dompter les drones ?';
$libAccrochArt = "Le cirque a présenté une première: un spectacle de domptage de drones. Une gracieuse performance, un ballet illusionniste, montrant un envol d’engins équipés d’hélices qui se meuvent dans un espace défini. Spectacle présenté énergiquement par le clown Mathieu et son collègue, au centre du chapiteau, sur une piste blanche jonchée de marqueurs colorés.
« Tout l’art de l’artiste au milieu, c’est de créer l'interaction », nous explique Laurent Perchais, fondateur de Dronisos. Les drones suivent au tic près leur chorégraphie pré-programmée, alors que le performeur s’agite dans tous les sens pour donner vie à la scène. Les drones suivent au doigt et à l'œil leur maître, passent à travers des cerceaux, font des loopings et des danses synchronisées. Attention, ils ne sont pas tous obéissants, et certains sont même têtus. En sortie de salle, les spectateurs sont souriants. Le show est même jugé « novateur » et « très enthousiasmant ».
Ce type de spectacle, nous offrant un goût de nouveau, est possible grâce à la Start-up bordelaise Dronisos, experte dans les spectacles de drones, domaine dont ils sont les instigateurs.";
$libSsTitr1Art = 'Dronisos : qui sont-ils ?';
$parag1Art = "Le cirque a présenté une première: un spectacle de domptage de drones. Une gracieuse performance, un ballet illusionniste, montrant un envol d’engins équipés d’hélices qui se meuvent dans un espace défini. Spectacle présenté énergiquement par le clown Mathieu et son collègue, au centre du chapiteau, sur une piste blanche jonchée de marqueurs colorés.
« Tout l’art de l’artiste au milieu, c’est de créer l'interaction », nous explique Laurent Perchais, fondateur de Dronisos. Les drones suivent au tic près leur chorégraphie pré-programmée, alors que le performeur s’agite dans tous les sens pour donner vie à la scène. Les drones suivent au doigt et à l'œil leur maître, passent à travers des cerceaux, font des loopings et des danses synchronisées. Attention, ils ne sont pas tous obéissants, et certains sont même têtus. En sortie de salle, les spectateurs sont souriants. Le show est même jugé « novateur » et « très enthousiasmant ».
Ce type de spectacle, nous offrant un goût de nouveau, est possible grâce à la Start-up bordelaise Dronisos, experte dans les spectacles de drones, domaine dont ils sont les instigateurs.";
$libSsTitr2Art = 'Dronisos : qui sont-ils ?';
$parag2Art = "Le cirque a présenté une première: un spectacle de domptage de drones. Une gracieuse performance, un ballet illusionniste, montrant un envol d’engins équipés d’hélices qui se meuvent dans un espace défini. Spectacle présenté énergiquement par le clown Mathieu et son collègue, au centre du chapiteau, sur une piste blanche jonchée de marqueurs colorés.
« Tout l’art de l’artiste au milieu, c’est de créer l'interaction », nous explique Laurent Perchais, fondateur de Dronisos. Les drones suivent au tic près leur chorégraphie pré-programmée, alors que le performeur s’agite dans tous les sens pour donner vie à la scène. Les drones suivent au doigt et à l'œil leur maître, passent à travers des cerceaux, font des loopings et des danses synchronisées. Attention, ils ne sont pas tous obéissants, et certains sont même têtus. En sortie de salle, les spectateurs sont souriants. Le show est même jugé « novateur » et « très enthousiasmant ».
Ce type de spectacle, nous offrant un goût de nouveau, est possible grâce à la Start-up bordelaise Dronisos, experte dans les spectacles de drones, domaine dont ils sont les instigateurs.";
$parag3Art = "Le cirque a présenté une première: un spectacle de domptage de drones. Une gracieuse performance, un ballet illusionniste, montrant un envol d’engins équipés d’hélices qui se meuvent dans un espace défini. Spectacle présenté énergiquement par le clown Mathieu et son collègue, au centre du chapiteau, sur une piste blanche jonchée de marqueurs colorés.
« Tout l’art de l’artiste au milieu, c’est de créer l'interaction », nous explique Laurent Perchais, fondateur de Dronisos. Les drones suivent au tic près leur chorégraphie pré-programmée, alors que le performeur s’agite dans tous les sens pour donner vie à la scène. Les drones suivent au doigt et à l'œil leur maître, passent à travers des cerceaux, font des loopings et des danses synchronisées. Attention, ils ne sont pas tous obéissants, et certains sont même têtus. En sortie de salle, les spectateurs sont souriants. Le show est même jugé « novateur » et « très enthousiasmant ».
Ce type de spectacle, nous offrant un goût de nouveau, est possible grâce à la Start-up bordelaise Dronisos, experte dans les spectacles de drones, domaine dont ils sont les instigateurs.";
$libConclArt = "C'est fini les amis  Le cirque a présenté une première: un spectacle de domptage de drones. Une gracieuse performance, un ballet illusionniste, montrant un envol d’engins équipés d’hélices qui se meuvent dans un espace défini. Spectacle présenté énergiquement par le clown Mathieu et son collègue, au centre du chapiteau, sur une piste blanche jonchée de marqueurs colorés.
« Tout l’art de l’artiste au milieu, c’est de créer l'interaction », nous explique Laurent Perchais, fondateur de Dronisos. Les drones suivent au tic près leur chorégraphie pré-programmée, alors que le performeur s’agite dans tous les sens pour donner vie à la scène. Les drones suivent au doigt et à l'œil leur maître, passent à travers des cerceaux, font des loopings et des danses synchronisées. Attention, ils ne sont pas tous obéissants, et certains sont même têtus. En sortie de salle, les spectateurs sont souriants. Le show est même jugé « novateur » et « très enthousiasmant ».
Ce type de spectacle, nous offrant un goût de nouveau, est possible grâce à la Start-up bordelaise Dronisos, experte dans les spectacles de drones, domaine dont ils sont les instigateurs.";
$urlPhotArt = $prefix . '/front/assets/img/drone-carrousel.jpg';

$article = $monArticle->get_1Article($numArt);

if ($article) {
    $libTitrArt = $article['libTitrArt'];
    $libChapoArt = $article['libChapoArt'];
    $libAccrochArt = $article['libAccrochArt'];
    $libSsTitr1Art = $article['libSsTitr1Art'];
    $parag1Art = $article['parag1Art'];
    $libSsTitr2Art = $article['libSsTitr2Art'];
    $parag2Art = $article['parag2Art'];
    $parag3Art = $article['parag3Art'];
    $libConclArt = $article['libConclArt'];
    $urlPhotArt = $prefix . '/back/article/uploads/' . $article['urlPhotArt'];
}




?>
<div class="container">
    <div class="article">
        <div class="title">
            <h1><?= $libTitrArt ?></h1>
            <h2><?= $libChapoArt ?></h2>
            <img class="img-top" src="<?= $urlPhotArt ?>" alt="">
        </div>
        <div class="para">
            <div class="text">
                <p><?= $libAccrochArt ?></p>
            </div>
            <img src="/front/assets/img/drone-carrousel.jpg" alt="">
        </div>
        <div class="para">
            <img src="/front/assets/img/drone-carrousel.jpg" alt="">
            <div class="text">
                <h3><?= $libSsTitr1Art ?></h3>
                <p><?= $parag1Art ?></p>
            </div>
        </div>
        <div class="para">
            <div class="text">
                <h3><?= $libSsTitr2Art ?></h3>
                <p><?= $parag2Art ?></p>
            </div>
            <img src="/front/assets/img/drone-carrousel.jpg" alt="">
        </div>
        <div class="para">
            <img src="/front/assets/img/drone-carrousel.jpg" alt="">
            <div class="text">
                <p><?= $parag3Art ?></p>
            </div>
        </div>
        <div class="conclu">
            <p><?= $libConclArt ?></p>
        </div>
        <div class="interraction">
            <a href="">Signalez une erreur dans le texte</a>
            <div>
                <p>Partagez</p>
                <svg></svg>
                <svg></svg>
                <svg></svg>
            </div>
        </div>
        <div class="hashtag"></div>
    </div>
    <? 
        $allComments = $monComment->get_AllCommentsByArticle($numArt);
        foreach($allComments as $row):
            $myMembre = $monMembre->get_1Membre($row['numMemb']);
            $verif = $monCommentPlus->get_AllCommentsRByArticle($numArt);
            $verifBool = false;
            foreach($verif as $raw){
                if($raw['numSeqComR'] == $row['numSeqCom']){
                    $verifBool = true;
                }
            }
            if(!$verifBool){
        
    ?>
    <div class="comment">
        <div class="header"><?= $myMembre['pseudoMemb'] ?> - <?= $row['dtCreCom'] ?></div>
        <div class="content"><?= $row['libCom'] ?></div>
        <div class="interaction" ><a class="reponse" id="reponse<?= $row['numSeqCom'] ?>" href="javascript:void(0)">Répondre</a></div>
        <form class="add-comment answer" method="post" id="form<?= $row['numSeqCom'] ?>" style="display: none;">
            <input type="text"/>
            <input type="submit" value="Répondre" />
        </form>
    </div>
    <?
        }

        $verifR = $monCommentPlus->get_AllCommentsRByComment($numArt, $row['numSeqCom']);
        if($verifR){
            foreach($verifR as $riw):
                $myCommentR = $monComment->get_1Comment($riw['numSeqComR'], $numArt);
                $myMembreR = $monMembre->get_1Membre($myCommentR['numMemb']);
    ?>
    <div class="subcomment">
        <div class="header"><?= $myMembreR['pseudoMemb'] ?> - <?= $myCommentR['dtCreCom'] ?></div>
        <div class="content"><?= $myCommentR['libCom'] ?></div>
        <div class="interaction"></div>
    </div>
    <?
            endforeach;
        }
    endforeach;
    ?>

    <script>
        $(document).ready(function() {
            $('.reponse').click(function(){
                numSeqCom = $(this).attr('id').substr(7);
                if($('#form' + numSeqCom).is(':hidden')){
                    $('.answer').hide();
                    $('#form' + numSeqCom).show();
                }
            });
        });
    </script>


    <form class="add-comment" method="post">
        <h2 class="name"></h2>
        <p style="color: red;"><?= $e ?></p>
        <input type="text" id="libCom" name="libCom" />
        <input type="submit" name="submit" value="Ajouter un commentaire" />
    </form>
</div>
<?php
require_once('../commons/footer.php');
?>