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

$article = $monArticle->get_1Article($numArt);
if(!$article){
    header('Location: '.$prefix.'/#articles');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../../../CLASS_CRUD/getNextNumCom.php';

    if (isset($_SESSION['pseudoMemb'])) {
        $numMemb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb'])['numMemb'];

        if (isset($_POST["numRepCom"])) { //réponse à un commentaire

            if (!empty($_POST["repCom"])) {
                $numSeqComR = getNextNumCom($numArt);
                $monComment->create($numSeqComR, $numArt, date('Y-m-d H:i:s'), $_POST["repCom"], 0, 0, 0, $numMemb);
                $monCommentPlus->create($numArt, $_POST["numRepCom"], $numSeqComR);
            } else {
                $repE = 'Veuillez spécifier votre réponse.';
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
        header("Location: ".$prefix."/login");
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
        <canvas class="canvas-article" id="canvas3d"></canvas>
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
            <a class="signalez" href="<?= $prefix ?>/contact">Signalez une erreur dans le texte</a>
            <div class="social-media">
                <p>Partagez</p>
                <a href="facebook.com"><svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.8 1H7.4C6.33913 1 5.32172 1.42143 4.57157 2.17157C3.82143 2.92172 3.4 3.93913 3.4 5V7.4H1V10.6H3.4V17H6.6V10.6H9L9.8 7.4H6.6V5C6.6 4.78783 6.68429 4.58434 6.83431 4.43431C6.98434 4.28429 7.18783 4.2 7.4 4.2H9.8V1Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></a>
                <a href="instagram.com"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.7998 1H4.7998C2.59067 1 0.799805 2.79086 0.799805 5V13C0.799805 15.2091 2.59067 17 4.7998 17H12.7998C15.0089 17 16.7998 15.2091 16.7998 13V5C16.7998 2.79086 15.0089 1 12.7998 1Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.9992 8.49624C12.0979 9.16204 11.9842 9.84201 11.6742 10.4395C11.3642 11.0369 10.8737 11.5214 10.2725 11.824C9.67127 12.1266 8.98994 12.2319 8.32541 12.125C7.66088 12.0181 7.04699 11.7043 6.57105 11.2284C6.09511 10.7524 5.78137 10.1385 5.67443 9.47401C5.5675 8.80948 5.67283 8.12816 5.97544 7.52694C6.27805 6.92572 6.76253 6.43523 7.35997 6.12523C7.95741 5.81523 8.63738 5.70151 9.30318 5.80024C9.98232 5.90095 10.6111 6.21741 11.0965 6.70289C11.582 7.18836 11.8985 7.8171 11.9992 8.49624Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></a>
                <a href="twitter.com"><svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.4167 1.00897C19.5629 1.61128 18.6174 2.07195 17.6169 2.37324C17.0798 1.75576 16.3661 1.3181 15.5723 1.11947C14.7784 0.920833 13.9427 0.970799 13.1782 1.26261C12.4136 1.55442 11.7571 2.07399 11.2975 2.75105C10.8379 3.42812 10.5973 4.23001 10.6083 5.04827V5.93995C9.04127 5.98058 7.48853 5.63305 6.08836 4.92829C4.68819 4.22354 3.48404 3.18345 2.58316 1.90065C2.58316 1.90065 -0.983553 9.92575 7.04156 13.4925C5.20517 14.739 3.01755 15.364 0.799805 15.2758C8.82491 19.7342 18.6334 15.2758 18.6334 5.02152C18.6326 4.77315 18.6087 4.52539 18.562 4.28143C19.4721 3.38395 20.1143 2.25082 20.4167 1.00897V1.00897Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></a>
            </div>
            <div class="meta">
                <!-- <div class="hashtag">
                    <button>#hashtag</button>
                    <button>#hashtag</button>
                    <button>#hashtag</button>
                    <button>#hashtag</button>
                    <button>#hashtag</button>
                </div> -->
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
    <div class="article-footer">
        <div class="comment" id="comment<?= $row['numSeqCom'] ?>">
            <div class="title">
                <h2><?= $myMembre['pseudoMemb'] ?> · </h2>
                <p><?= substr($row['dtCreCom'], 0, -9) ?></p>
            </div>
            <div class="content">
                <p><?= $row['libCom'] ?></p>
            </div>
            <a class="reponse" id="reponse<?= $row['numSeqCom'] ?>" href="<?= isset($_SESSION['pseudoMemb']) ? 'javascript:void(0)' : $prefix.'/login' ?>">Répondre</a>
        </div>
    </div>
    <?php if(!empty($repE) && $_POST["numRepCom"] == $row['numSeqCom']){ ?>
            <p style="color: red;"><?= $repE ?></p>
    <?php } ?>
    <form class="add-comment answer" method="post" action="#comment<?= $row['numSeqCom'] ?>" id="form<?= $row['numSeqCom'] ?>" style="display: none;">
        <input type="text" name="repCom" />
        <button type="submit">Répondre</button>
        <input type="hidden" name="numRepCom" value="<?= $row['numSeqCom'] ?>">
    </form>

    <!-- <div class="comment">
        <div class="header"><?= $myMembre['pseudoMemb'] ?> - <?= substr($row['dtCreCom'], 0, -9) ?></div>
        <div class="content"><?= $row['libCom'] ?></div>
        <div class="interaction"><a class="reponse" id="reponse<?= $row['numSeqCom'] ?>" href="javascript:void(0)">Répondre</a></div>
        <form class="add-comment answer" method="post" id="form<?= $row['numSeqCom'] ?>" style="display: none;">
            <input type="text" name="repCom" />
            <button type="submit">Répondre</button>
            <input type="hidden" name="numRepCom" value="<?= $row['numSeqCom'] ?>">
        </form>
    </div> -->
    <?
        }

        $verifR = $monCommentPlus->get_AllCommentsRByComment($numArt, $row['numSeqCom']);
        if($verifR){
            foreach($verifR as $riw):
                $myCommentR = $monComment->get_1Comment($riw['numSeqComR'], $numArt);
                $myMembreR = $monMembre->get_1Membre($myCommentR['numMemb']);
    ?>
        <div class="article-footer subcomment">
            <div class="comment">
                <div class="title">
                    <h2><?= $myMembreR['pseudoMemb'] ?> · </h2>
                    <p><?= substr($row['dtCreCom'], 0, -9) ?></p>
                </div>
                <div class="content">
                    <p><?= $myCommentR['libCom'] ?></p>
                </div>
            </div>
        </div>

        <!-- <div class="comment" style="margin-left:50px;">
            <div class="header"><?= $myMembreR['pseudoMemb'] ?> - <?= substr($row['dtCreCom'], 0, -9) ?></div>
            <div class="content"><?= $myCommentR['libCom'] ?></div>
            <div class="interaction"></div>
        </div> -->

    
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


    <div class="article-footer">
        <form id="addComment" class="add-comment" method="post" action="#addComment">
            <h2 class="name">Ajouter un commentaire</h2>
            <p style="color: red;"><?= $e ?></p>
            <div class="field">
                <div class="form-group">
                    <input type="text" id="libCom" name="libCom" placeholder=" " />
                </div>
                <button type="submit" name="submit">Ajouter un commentaire </button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var SPLINE_EXPORTED_SCENE = {
        "scenes": [{
            "nodes": [0]
        }],
        "nodes": [{
            "children": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
        }, {
            "mesh_spe": 0,
            "material": 0,
            "spe_interaction": 0,
            "translation": [431.0837643268503, 535.0285181512231, -394.89618367379956],
            "rotation": [0.8708721612349777, -0.25881705022445634, 0.41190816276471554, 0.0701931531335282],
            "scale": [1, 1, 1],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -4.066419399688646, -1697.0563917228685, -686.5158923939782, 1],
            "type": "mesh3d",
            "uuid": "06A3DD3B-909C-4132-9BF1-5DE745E894F6",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 1,
            "material": 1,
            "spe_interaction": 1,
            "translation": [-533.1154245225545, -1742.8282957178728, -463.1922232812399],
            "rotation": [0.6900020706613852, -0.20579298518043515, -0.6532520060934264, 0.23411152527895768],
            "scale": [1, 1, 1],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "D98BED7B-A55F-4CE4-8842-1BDBAFEEA368",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 2,
            "material": 2,
            "spe_interaction": 2,
            "translation": [446.3885133562059, -1056.6653809017614, -288.8267363342695],
            "rotation": [0.781266016160512, -0.06539408349744313, 0.6036765729703306, 0.14464308169770645],
            "scale": [0.9999999999999998, 0.9999999999999999, 1],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "87E05639-5DF6-4293-A840-36BE1CE45D23",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 3,
            "material": 3,
            "spe_interaction": 3,
            "translation": [-441.28693034642055, -21.044029915364717, -101.7031890743433],
            "rotation": [0, 0, 0, 1],
            "scale": [1.3, 1.3, 1.3],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "C7314E45-65F3-4D68-BBA1-2493F20B2502",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 4,
            "material": 4,
            "spe_interaction": 4,
            "translation": [431.0837643268503, 535.0285181512231, -394.89618367379956],
            "rotation": [0.8708721612349777, -0.25881705022445634, 0.41190816276471554, 0.0701931531335282],
            "scale": [1, 1, 1],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "FA1F5A26-7F9B-4DA7-989D-B42D1ABF4007",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 5,
            "material": 5,
            "spe_interaction": 5,
            "translation": [-387.72030874367584, 1177.8279773841593, -1229.635667187291],
            "rotation": [0.6900020706613852, -0.20579298518043515, -0.6532520060934264, 0.23411152527895768],
            "scale": [1, 1, 1],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "8C250DB2-8185-4544-BF38-E5D665AFBD20",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 6,
            "material": 6,
            "spe_interaction": 6,
            "translation": [464.24405389045404, 2027.2415485133968, -1229.635667187291],
            "rotation": [0.781266016160512, -0.06539408349744313, 0.6036765729703306, 0.14464308169770645],
            "scale": [0.9999999999999998, 0.9999999999999999, 1],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "C56A0656-AB6B-443F-A4E9-A5FB8E3BF703",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 7,
            "material": 7,
            "spe_interaction": 7,
            "translation": [-497.404343454058, 2519.5443089576693, -1229.635667187291],
            "rotation": [0, 0, 0, 1],
            "scale": [1.3, 1.3, 1.3],
            "visible": true,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
            "type": "mesh3d",
            "uuid": "FB5AEC6B-D380-48A7-9647-5407FFE08620",
            "spe_cloner_data": {}
        }, {
            "mesh_spe": 8,
            "material": 8,
            "spe_interaction": 8,
            "translation": [-2.3456369002391853, 2.7844642607690844, 0],
            "rotation": [0, 0, 0, 1],
            "scale": [1, 1, 1],
            "visible": false,
            "castShadow": true,
            "receiveShadow": true,
            "hiddenMatrix": [0.20465051264746656, 0, 0, 0, 0, 0.20743257247246216, 0, 0, 0, 0, 0.20743257247246216, 0, -4.866724978048252, 10.148767833981287, -536.6078132396357, 1],
            "type": "mesh2d",
            "uuid": "8F00C635-67FD-4750-9B25-FCAB740E41C1",
            "spe_cloner_data": {}
        }, {
            "spe_interaction": 9,
            "camera": 0,
            "translation": [0, 1.749191776789837e-13, 1000],
            "rotation": [-3.0616169978683836e-17, 0, 0, 1],
            "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
            "visible": true,
            "uuid": "CEC046CD-379F-4AA5-B76C-DE739BA75E1B",
            "children": [12]
        }, {
            "visible": true,
            "extensions": {
                "KHR_lights_punctual": {
                    "light": 0
                }
            }
        }, {
            "spe_interaction": null,
            "translation": [850000, 1300000, 1000000],
            "rotation": [0, 0, 0.5, 0],
            "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
            "uuid": "8805D9F7-79EE-44FB-AF9F-26F4D24708E6",
            "visible": true,
            "extensions": {
                "KHR_lights_punctual": {
                    "light": 1
                }
            }
        }],
        "meshes": [],
        "meshes_spe": [{
            "type": "TorusGeometry",
            "parameters": {
                "width": 334,
                "height": 334,
                "depth": 84,
                "tubePercent": 50,
                "radialSegments": 32,
                "tubularSegments": 64,
                "arc": 6.283185307179586,
                "cornerRadius": 30,
                "cornerSegments": 8
            }
        }, {
            "type": "CylinderGeometry",
            "parameters": {
                "width": 188,
                "height": 308,
                "depth": 188,
                "radiusTop": 94,
                "radiusBottom": 94,
                "radialSegments": 64,
                "heightSegments": 1,
                "openEnded": false,
                "thetaLength": 360,
                "cornerRadius": 24,
                "cornerSegments": 8,
                "hollow": 0
            }
        }, {
            "type": "CubeGeometry",
            "parameters": {
                "width": 201,
                "height": 201,
                "depth": 94,
                "widthSegments": 1,
                "heightSegments": 1,
                "depthSegments": 1,
                "cornerRadius": 24,
                "cornerSegments": 16
            }
        }, {
            "type": "SphereGeometry",
            "parameters": {
                "width": 227,
                "height": 227,
                "depth": 227,
                "widthSegments": 64,
                "heightSegments": 64
            }
        }, {
            "type": "TorusGeometry",
            "parameters": {
                "width": 334,
                "height": 334,
                "depth": 84,
                "tubePercent": 50,
                "radialSegments": 32,
                "tubularSegments": 64,
                "arc": 6.283185307179586,
                "cornerRadius": 30,
                "cornerSegments": 8
            }
        }, {
            "type": "CylinderGeometry",
            "parameters": {
                "width": 188,
                "height": 308,
                "depth": 188,
                "radiusTop": 94,
                "radiusBottom": 94,
                "radialSegments": 64,
                "heightSegments": 1,
                "openEnded": false,
                "thetaLength": 360,
                "cornerRadius": 24,
                "cornerSegments": 8,
                "hollow": 0
            }
        }, {
            "type": "CubeGeometry",
            "parameters": {
                "width": 201,
                "height": 201,
                "depth": 94,
                "widthSegments": 1,
                "heightSegments": 1,
                "depthSegments": 1,
                "cornerRadius": 24,
                "cornerSegments": 16
            }
        }, {
            "type": "SphereGeometry",
            "parameters": {
                "width": 227,
                "height": 227,
                "depth": 227,
                "widthSegments": 64,
                "heightSegments": 64
            }
        }, {
            "type": "RectangleGeometry",
            "parameters": {
                "width": 1440,
                "height": 5500,
                "depth": 0,
                "cornerRadius": [0, 0, 0, 0],
                "cornerType": 1,
                "extrudeDepth": 0,
                "extrudeBevelSize": 0,
                "extrudeBevelSegments": 1
            }
        }],
        "materials": [{
            "material_0_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 7970047,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_1_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 51589,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_2_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 16755477,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_3_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 16744576,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_4_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 7970047,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_5_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 51589,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_6_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 16755477,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_7_Lambert": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "LAMBERT",
                        "values": {
                            "ambient": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "diffuse": [0.34901960784313724, 0.34901960784313724, 0.34901960784313724],
                            "emission": [0, 0, 0],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 0,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 16744576,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 3,
                            "type": 1
                        }
                    }
                }]
            }
        }, {
            "material_8_Basic": {
                "extensions": {
                    "KHR_materials_common": {
                        "technique": "CONSTANT",
                        "values": {
                            "ambient": [1, 1, 1],
                            "transparent": true,
                            "transparency": 1
                        }
                    }
                },
                "spe_options": {
                    "side": 2,
                    "wireframe": false,
                    "flatShading": false,
                    "visible": true
                },
                "spe_layers": [{
                    "type": "color",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        },
                        "color": {
                            "name": "color",
                            "value": 16777215,
                            "type": 6
                        }
                    }
                }, {
                    "type": "light",
                    "uniforms": {
                        "alpha": {
                            "name": "alpha",
                            "value": 1,
                            "type": 1
                        },
                        "mode": {
                            "name": "mode",
                            "value": 0,
                            "type": 1
                        }
                    }
                }]
            }
        }],
        "cameras": [{
            "type": "Orthographic",
            "orthographic": {
                "xmag": 1904,
                "ymag": 1011,
                "zfar": 50000,
                "znear": -50000
            },
            "spe_options": {
                "zoom": 1
            }
        }],
        "buffers": [],
        "bufferViews": [],
        "accessors": [],
        "extensions": {
            "KHR_lights_punctual": {
                "lights": [{
                    "type": "hemispheric",
                    "name": "Default Ambient Light",
                    "color": [0.8274509803921568, 0.8274509803921568, 0.8274509803921568],
                    "intensity": 0.75
                }, {
                    "type": "directional",
                    "name": "Default Directional Light",
                    "color": [1, 1, 1],
                    "intensity": 0.75,
                    "shadows": {
                        "castShadow": false,
                        "shadowmapViewRight": 5,
                        "shadowmapViewLeft": -5,
                        "shadowmapViewTop": 5,
                        "shadowmapViewBottom": -5,
                        "shadowmapViewNear": 0.5,
                        "shadowmapViewFar": 500
                    }
                }]
            }
        },
        "spline": {
            "interactions": [{
                "uuid": "8FB9FED9-0043-41AF-872D-07F22E390ACA",
                "selectedState": 0,
                "states": ["999ED574-5CD5-4F10-95C3-56CFE983752B", "5EEB6D4B-476C-4D44-972D-43E3D6ADDA4C"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "06A3DD3B-909C-4132-9BF1-5DE745E894F6",
                        "state": "5EEB6D4B-476C-4D44-972D-43E3D6ADDA4C"
                    }]
                }]
            }, {
                "uuid": "04459F31-003D-42D9-B756-99F4488D5089",
                "selectedState": 1,
                "states": ["14B37AF7-3E6C-4261-AE63-5E41A1E0F270", "277E0422-A9DF-4686-B44A-A59ED0CF5FF0"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "D98BED7B-A55F-4CE4-8842-1BDBAFEEA368",
                        "state": "277E0422-A9DF-4686-B44A-A59ED0CF5FF0"
                    }]
                }]
            }, {
                "uuid": "66B3472E-AC45-4ADB-84CB-CF173195BE54",
                "selectedState": 1,
                "states": ["450176E0-8187-4775-A54F-5B07986C833E", "0B5BFCBF-4A04-4DA4-8C9C-BA7D75D676E2"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "87E05639-5DF6-4293-A840-36BE1CE45D23",
                        "state": "0B5BFCBF-4A04-4DA4-8C9C-BA7D75D676E2"
                    }]
                }]
            }, {
                "uuid": "E511CF63-EDE1-4396-A128-2DC48292E713",
                "selectedState": 1,
                "states": ["A3F37306-C57F-47F6-B627-FB0BBEA4A8A2", "84A0D9EB-DF0F-49B9-B3B9-96C826CD79E2"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "C7314E45-65F3-4D68-BBA1-2493F20B2502",
                        "state": "84A0D9EB-DF0F-49B9-B3B9-96C826CD79E2"
                    }]
                }]
            }, {
                "uuid": "8F8B9AE2-BA80-49B8-AA73-9ECFE1030587",
                "selectedState": 0,
                "states": ["E0C3F3B8-4E4E-4318-9BDC-70EEB40C77AC", "C5749F20-75B3-4336-A08C-1466C3E8FE31"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "FA1F5A26-7F9B-4DA7-989D-B42D1ABF4007",
                        "state": "C5749F20-75B3-4336-A08C-1466C3E8FE31"
                    }]
                }]
            }, {
                "uuid": "1B21B07B-EBC8-482E-A7E3-168110C6CFA7",
                "selectedState": 1,
                "states": ["29EB3AB2-3CE6-4A0B-B262-11C010F30443", "1071670B-EEF7-42BF-A4D0-2F863B891FA4"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "8C250DB2-8185-4544-BF38-E5D665AFBD20",
                        "state": "1071670B-EEF7-42BF-A4D0-2F863B891FA4"
                    }]
                }]
            }, {
                "uuid": "C86EF89C-C9F5-417B-AF9D-EE1021BD74FA",
                "selectedState": 1,
                "states": ["4AB824CF-1979-49B8-9A66-1F3A926B374B", "24D25963-28E3-44BC-9408-DA9538BBA7B5"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "C56A0656-AB6B-443F-A4E9-A5FB8E3BF703",
                        "state": "24D25963-28E3-44BC-9408-DA9538BBA7B5"
                    }]
                }]
            }, {
                "uuid": "33B9C1BD-EA35-4B68-BFA5-082ABBC0191C",
                "selectedState": 1,
                "states": ["2527FCA4-6EE7-490F-965E-BC80A54C4BDC", "D08339B4-941E-4722-BD39-9648994171A6"],
                "events": [{
                    "type": 2,
                    "ui": {
                        "isCollapsed": false
                    },
                    "targets": [{
                        "easing": 4,
                        "duration": 1000,
                        "delay": 0,
                        "cubicControls": [0.5, 0.05, 0.1, 0.3],
                        "springParameters": {
                            "mass": 1,
                            "stiffness": 80,
                            "damping": 10,
                            "velocity": 0
                        },
                        "repeat": false,
                        "cycle": false,
                        "rewind": false,
                        "object": "FB5AEC6B-D380-48A7-9647-5407FFE08620",
                        "state": "D08339B4-941E-4722-BD39-9648994171A6"
                    }]
                }]
            }, {
                "uuid": "631FB5D8-D963-41F4-B897-E490D972EB08"
            }, {
                "uuid": "C16B9304-C3BA-4D18-AE8F-3BABD5978E59"
            }],
            "interactionStates": {
                "999ED574-5CD5-4F10-95C3-56CFE983752B": {
                    "uuid": "999ED574-5CD5-4F10-95C3-56CFE983752B",
                    "name": "Base State",
                    "position": [431.0837643268503, 535.0285181512231, -394.89618367379956],
                    "rotation": [2.6656413665709393, 0.7492698478811657, 0.767944870877505, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -4.066419399688646, -1697.0563917228685, -686.5158923939782, 1],
                    "geometry": {
                        "width": 334,
                        "height": 334,
                        "depth": 84
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 7970047
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "5EEB6D4B-476C-4D44-972D-43E3D6ADDA4C": {
                    "uuid": "5EEB6D4B-476C-4D44-972D-43E3D6ADDA4C",
                    "name": "State 1",
                    "position": [428.53297282195757, -2418.7880445144133, -1088.3695401878613],
                    "rotation": [0.4839732441829931, 0.40019622239499797, 0, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 334,
                        "height": 334,
                        "depth": 84
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 7970047
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "14B37AF7-3E6C-4261-AE63-5E41A1E0F270": {
                    "uuid": "14B37AF7-3E6C-4261-AE63-5E41A1E0F270",
                    "name": "Base State",
                    "position": [-548.7613870901589, -1780.207021869446, -488.92225799981],
                    "rotation": [0.528014431560104, -0.2135982535321373, -0.34005331961514723, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 188,
                        "height": 212,
                        "depth": 188
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 51589
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "277E0422-A9DF-4686-B44A-A59ED0CF5FF0": {
                    "uuid": "277E0422-A9DF-4686-B44A-A59ED0CF5FF0",
                    "name": "State 1",
                    "position": [-533.1154245225545, -1742.8282957178728, -463.1922232812399],
                    "rotation": [2.1685715956029545, -1.5051719469199096, -0.34005331961514723, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 188,
                        "height": 308,
                        "depth": 188
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 51589
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "450176E0-8187-4775-A54F-5B07986C833E": {
                    "uuid": "450176E0-8187-4775-A54F-5B07986C833E",
                    "name": "Base State",
                    "position": [467.65892747502244, -1017.429517902041, -259.32476118206637],
                    "rotation": [0.487660112008446, -0.40887556558729127, 0.41030503025395637, "XYZ"],
                    "scale": [0.9999999999999998, 0.9999999999999999, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 201,
                        "height": 201,
                        "depth": 201
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16755477
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "0B5BFCBF-4A04-4DA4-8C9C-BA7D75D676E2": {
                    "uuid": "0B5BFCBF-4A04-4DA4-8C9C-BA7D75D676E2",
                    "name": "State 1",
                    "position": [446.3885133562059, -1056.6653809017614, -288.8267363342695],
                    "rotation": [2.2155209524816017, 1.1793189755725684, 0.8117526351025628, "XYZ"],
                    "scale": [0.9999999999999998, 0.9999999999999999, 1],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 201,
                        "height": 201,
                        "depth": 94
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16755477
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "A3F37306-C57F-47F6-B627-FB0BBEA4A8A2": {
                    "uuid": "A3F37306-C57F-47F6-B627-FB0BBEA4A8A2",
                    "name": "Base State",
                    "position": [-441.28693034642055, -21.044029915364717, -101.7031890743433],
                    "rotation": [0, 0, 0, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 227,
                        "height": 227,
                        "depth": 227
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16744576
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "84A0D9EB-DF0F-49B9-B3B9-96C826CD79E2": {
                    "uuid": "84A0D9EB-DF0F-49B9-B3B9-96C826CD79E2",
                    "name": "State 1",
                    "position": [-441.28693034642055, -21.044029915364717, -101.7031890743433],
                    "rotation": [0, 0, 0, "XYZ"],
                    "scale": [1.3, 1.3, 1.3],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 227,
                        "height": 227,
                        "depth": 227
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16744576
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "E0C3F3B8-4E4E-4318-9BDC-70EEB40C77AC": {
                    "uuid": "E0C3F3B8-4E4E-4318-9BDC-70EEB40C77AC",
                    "name": "Base State",
                    "position": [431.0837643268503, 535.0285181512231, -394.89618367379956],
                    "rotation": [2.6656413665709393, 0.7492698478811657, 0.767944870877505, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 334,
                        "height": 334,
                        "depth": 84
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 7970047
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "C5749F20-75B3-4336-A08C-1466C3E8FE31": {
                    "uuid": "C5749F20-75B3-4336-A08C-1466C3E8FE31",
                    "name": "State 1",
                    "position": [431.0837643268503, 535.0285181512231, -394.89618367379956],
                    "rotation": [0.4839732441829931, 0.40019622239499797, 0, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 334,
                        "height": 334,
                        "depth": 84
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 7970047
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "29EB3AB2-3CE6-4A0B-B262-11C010F30443": {
                    "uuid": "29EB3AB2-3CE6-4A0B-B262-11C010F30443",
                    "name": "Base State",
                    "position": [-403.36627131128034, 1140.4492512325862, -1255.365701905861],
                    "rotation": [0.528014431560104, -0.2135982535321373, -0.34005331961514723, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 188,
                        "height": 212,
                        "depth": 188
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 51589
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "1071670B-EEF7-42BF-A4D0-2F863B891FA4": {
                    "uuid": "1071670B-EEF7-42BF-A4D0-2F863B891FA4",
                    "name": "State 1",
                    "position": [-387.72030874367584, 1177.8279773841593, -1229.635667187291],
                    "rotation": [2.1685715956029545, -1.5051719469199096, -0.34005331961514723, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 188,
                        "height": 308,
                        "depth": 188
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 51589
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "4AB824CF-1979-49B8-9A66-1F3A926B374B": {
                    "uuid": "4AB824CF-1979-49B8-9A66-1F3A926B374B",
                    "name": "Base State",
                    "position": [485.51446800927056, 2066.477411513117, -1200.1336920350877],
                    "rotation": [0.487660112008446, -0.40887556558729127, 0.41030503025395637, "XYZ"],
                    "scale": [0.9999999999999998, 0.9999999999999999, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 201,
                        "height": 201,
                        "depth": 201
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16755477
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "24D25963-28E3-44BC-9408-DA9538BBA7B5": {
                    "uuid": "24D25963-28E3-44BC-9408-DA9538BBA7B5",
                    "name": "State 1",
                    "position": [464.24405389045404, 2027.2415485133968, -1229.635667187291],
                    "rotation": [2.2155209524816017, 1.1793189755725684, 0.8117526351025628, "XYZ"],
                    "scale": [0.9999999999999998, 0.9999999999999999, 1],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 201,
                        "height": 201,
                        "depth": 94
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16755477
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "2527FCA4-6EE7-490F-965E-BC80A54C4BDC": {
                    "uuid": "2527FCA4-6EE7-490F-965E-BC80A54C4BDC",
                    "name": "Base State",
                    "position": [-497.404343454058, 2519.5443089576693, -1229.635667187291],
                    "rotation": [0, 0, 0, "XYZ"],
                    "scale": [1, 1, 1],
                    "hiddenMatrix": [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                    "geometry": {
                        "width": 227,
                        "height": 227,
                        "depth": 227
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16744576
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                },
                "D08339B4-941E-4722-BD39-9648994171A6": {
                    "uuid": "D08339B4-941E-4722-BD39-9648994171A6",
                    "name": "State 1",
                    "position": [-497.404343454058, 2519.5443089576693, -1229.635667187291],
                    "rotation": [0, 0, 0, "XYZ"],
                    "scale": [1.3, 1.3, 1.3],
                    "hiddenMatrix": [0.5686363688294612, 0, 0, 0, 0, 0.5763665248710295, 0, 0, 0, 0, 0.5763665248710295, 0, -2.6159465807054, 5.424595607213781, -286.82106380932, 1],
                    "geometry": {
                        "width": 227,
                        "height": 227,
                        "depth": 227
                    },
                    "material": {
                        "layersList": [{
                            "id": 0,
                            "type": "color",
                            "defines": {},
                            "uniforms": {
                                "f0_alpha": {
                                    "value": 1
                                },
                                "f0_mode": {
                                    "value": 0
                                },
                                "f0_color": {
                                    "value": 16744576
                                }
                            }
                        }, {
                            "id": 1,
                            "type": "light",
                            "defines": {},
                            "uniforms": {
                                "f1_alpha": {
                                    "value": 1
                                },
                                "f1_mode": {
                                    "value": "3"
                                }
                            }
                        }]
                    }
                }
            },
            "textures": {},
            "images": {},
            "mainCameraIndex": 10,
            "usePrimitives": true,
            "bgColor": [0.09803921568627451, 0.09803921568627451, 0.09803921568627451],
            "bgAlpha": 1,
            "orbitDamped": false,
            "orbitTarget": [0, 1.1368683772161603e-13, -2.1684043449710067e-14],
            "cameraType": "Orthographic",
            "cameraRotate": false,
            "cameraPan": false,
            "cameraZoom": false,
            "viewMode": 1,
            "viewWidth": 512,
            "viewHeight": 512,
            "quality": "low",
            "useOrbitControls": false
        }
    };
    var SPE_USES_PREVIEW_IMAGE = false;
    const runtime = new SpeRuntime(SPLINE_EXPORTED_SCENE);
    runtime.run();
</script>
<?php
require_once('../commons/footer.php');
?>