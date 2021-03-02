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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../../../CLASS_CRUD/getNextNumCom.php';

    if (isset($_SESSION['pseudoMemb'])) {
        $numMemb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb'])['numMemb'];

        if (isset($_POST["numRepCom"])) { //réponse à un commentaire

            if (!empty($_POST["repCom"])) {
                $numSeqComR = getNextNumCom($numArt);
                $monComment->create($numSeqComR, $numArt, date('Y-m-d H:i:s'), $_POST["repCom"], 0, 0, 0, $numMemb);
                $monCommentPlus->create($numArt, $_POST["numRepCom"], $numSeqComR);
            }else{
                $e = 'Veuillez spécifier votre réponse.';
            }
        } else { //simple commentaire
            $libCom = $_POST['libCom'];

            if (!empty($libCom)) {
                $monComment->create(getNextNumCom($numArt), $numArt, date('Y-m-d H:i:s'), $libCom, 0, 0, 0, $numMemb);
            } else {
                $e = 'Veuillez spécifier votre commentaire.';
            }
        }
    } else {
        $e = 'Vous ne vous êtes pas connecté(e).';
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
    <div class="article-page">
        <div class="title">
            <h1><?= $libTitrArt ?></h1>
            <h2><?= $libChapoArt ?></h2>
            <img class="img-top" src="<?= $urlPhotArt ?>" alt="">
        </div>
        <div class="para">
            <div class="text">
                <p><?= $libAccrochArt ?></p>
            </div>
            <img src="<?= $prefix ?>/front/assets/img/drone-carrousel.jpg" alt="">
        </div>
        <div class="para">
            <img src="<?= $prefix ?>/front/assets/img/drone-carrousel.jpg" alt="">
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
            <img src="<?= $prefix ?>/front/assets/img/drone-carrousel.jpg" alt="">
        </div>
        <div class="para">
            <img src="<?= $prefix ?>/front/assets/img/drone-carrousel.jpg" alt="">
            <div class="text">
                <p><?= $parag3Art ?></p>
            </div>
        </div>
        <div class="conclu">
            <p><?= $libConclArt ?></p>
        </div>
        <div class="interraction">
            <a href="">Signalez une erreur dans le texte</a>
            <div class="social-media">
                <p>Partagez</p>
                <a href=""><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.8 1H7.4C6.33913 1 5.32172 1.42143 4.57157 2.17157C3.82143 2.92172 3.4 3.93913 3.4 5V7.4H1V10.6H3.4V17H6.6V10.6H9L9.8 7.4H6.6V5C6.6 4.78783 6.68429 4.58434 6.83431 4.43431C6.98434 4.28429 7.18783 4.2 7.4 4.2H9.8V1Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></a>
                <a href=""><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.7998 1H4.7998C2.59067 1 0.799805 2.79086 0.799805 5V13C0.799805 15.2091 2.59067 17 4.7998 17H12.7998C15.0089 17 16.7998 15.2091 16.7998 13V5C16.7998 2.79086 15.0089 1 12.7998 1Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9992 8.49624C12.0979 9.16204 11.9842 9.84201 11.6742 10.4395C11.3642 11.0369 10.8737 11.5214 10.2725 11.824C9.67127 12.1266 8.98994 12.2319 8.32541 12.125C7.66088 12.0181 7.04699 11.7043 6.57105 11.2284C6.09511 10.7524 5.78137 10.1385 5.67443 9.47401C5.5675 8.80948 5.67283 8.12816 5.97544 7.52694C6.27805 6.92572 6.76253 6.43523 7.35997 6.12523C7.95741 5.81523 8.63738 5.70151 9.30318 5.80024C9.98232 5.90095 10.6111 6.21741 11.0965 6.70289C11.582 7.18836 11.8985 7.8171 11.9992 8.49624Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></a>
                <a href=""><svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.4167 1.00897C19.5629 1.61128 18.6174 2.07195 17.6169 2.37324C17.0798 1.75576 16.3661 1.3181 15.5723 1.11947C14.7784 0.920833 13.9427 0.970799 13.1782 1.26261C12.4136 1.55442 11.7571 2.07399 11.2975 2.75105C10.8379 3.42812 10.5973 4.23001 10.6083 5.04827V5.93995C9.04127 5.98058 7.48853 5.63305 6.08836 4.92829C4.68819 4.22354 3.48404 3.18345 2.58316 1.90065C2.58316 1.90065 -0.983553 9.92575 7.04156 13.4925C5.20517 14.739 3.01755 15.364 0.799805 15.2758C8.82491 19.7342 18.6334 15.2758 18.6334 5.02152C18.6326 4.77315 18.6087 4.52539 18.562 4.28143C19.4721 3.38395 20.1143 2.25082 20.4167 1.00897V1.00897Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></a>
            </div>
        </div>
        <div class="meta">
            <div class="author">
                <p>Jean-Michel Rédacteur</p> <a href="">Voir ses articles</a>
            </div>
            <div class="hashtag">
                <button>#hashtag</button>
                <button>#hashtag</button>
                <button>#hashtag</button>
                <button>#hashtag</button>
                <button>#hashtag</button>
            </div>
        </div>

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
        <div class="header"><?= $myMembre['pseudoMemb'] ?> - <?= substr($row['dtCreCom'], 0, -9) ?></div>
        <div class="content"><?= $row['libCom'] ?></div>
        <div class="interaction"><a class="reponse" id="reponse<?= $row['numSeqCom'] ?>" href="javascript:void(0)">Répondre</a></div>
        <form class="add-comment answer" method="post" id="form<?= $row['numSeqCom'] ?>" style="display: none;">
            <input type="text" name="repCom" />
            <button type="submit">Répondre</button>
            <input type="hidden" name="numRepCom" value="<?= $row['numSeqCom'] ?>">
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
    <div class="subcomment" style="margin-left:50px;">
        <div class="header"><?= $myMembreR['pseudoMemb'] ?> - <?= substr($row['dtCreCom'], 0, -9) ?></div>
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
            $('.reponse').click(function() {
                numSeqCom = $(this).attr('id').substr(7);
                if ($('#form' + numSeqCom).is(':hidden')) {
                    $('.answer').hide();
                    $('#form' + numSeqCom).show();
                }
            });
        });
    </script>


    <form class="add-comment" method="post">
        <h2 class="name"></h2>
        <p style="color: red;"><?= $e ?></p>
        <input type="text" id="libCom" name="libCom" placeholder=" " />
        <label>Ajouter un commentaire</label>
        <button type="submit" name="submit">Ajouter un commentaire </button>
    </form>
</div>
<?php
require_once('../commons/footer.php');
?>