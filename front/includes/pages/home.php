<?php
require_once('../commons/header.php');
require_once __DIR__ . '../../../../CLASS_CRUD/likeArt.class.php';
$monLikeA = new LIKEART;
require_once __DIR__ . '../../../../CLASS_CRUD/thematique.class.php';
$maThematique = new THEMATIQUE;
require_once __DIR__ . '/../../../CLASS_CRUD/article.class.php';
$monArticle = new ARTICLE;
require_once __DIR__ . '/../../../CLASS_CRUD/motclearticle.class.php';
$monMotCleA = new MOTCLEARTICLE;

$allArticles = $monArticle->get_AllArticles();

if (isset($_SESSION['pseudoMemb'])) {
    $memb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb']);
}

?>

<!-- Put your code here my friend ;) -->

<script>
    $(document).ready(function() {
        $(".like").click(function() {
            var numArt = $(this).attr('id').substr(4);
            $.post("<?= $prefix ?>/back/ajax/likeArt.php", {
                numArt: numArt
            }, function(result) {
                var resultO = JSON.parse(result);
                console.log(resultO);
                if (resultO.success) {
                    if (resultO.like) {
                        $("#like" + resultO.numArt).attr("fill", "white");
                    } else {
                        $("#like" + resultO.numArt).attr("fill", "none");
                    }

                } else {
                    console.log(resultO.error);
                }
            });
        });
    });

    $(".filter").click(function(){
        var classes = $(this).attr("class").split(/\s+/);
        var numThem = $(this).attr("id").substr(6);
        if(classes.includes("category-deselect")){
            $(this).removeClass("category-deselect");
            $(".them"+numThem).show();
        }else{
            $(this).addClass("category-deselect");
            $(".them"+numThem).hide();
        }
    });
});
</script>

<div class="container-arrivee">

    <div id="slider">

        <figure>

            <div class="slide-content">

                <div class="title">
                    <svg width="15" height="64" viewBox="0 0 15 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.83444e-06 0L15 6.47133e-07V0.75278L2.8011e-06 0.75278L2.83444e-06 0ZM2.76776e-06 1.50556L15 1.50556V3.01112L2.70108e-06 3.01112L2.76776e-06 1.50556ZM2.60106e-06 5.26946L15 5.26946V6.02224L2.56772e-06 6.02224L2.60106e-06 5.26946Z" fill="white" />
                        <path d="M2.46762e-06 8.28254L15 8.28254V9.7881L2.40094e-06 9.7881L2.46762e-06 8.28254ZM2.30092e-06 12.0464H15V12.7992L2.26758e-06 12.7992L2.30092e-06 12.0464ZM2.23425e-06 13.552L15 13.552V15.8103L2.13423e-06 15.8103L2.23425e-06 13.552Z" fill="white" />
                        <path d="M2.1008e-06 16.5651L15 16.5651V17.3179L2.06746e-06 17.3179L2.1008e-06 16.5651ZM1.96745e-06 19.5762L15 19.5762V21.8345H1.86743e-06L1.96745e-06 19.5762ZM1.83409e-06 22.5873L15 22.5873V24.0929H1.76741e-06L1.83409e-06 22.5873Z" fill="white" />
                        <path d="M1.73398e-06 24.8476H15V25.6004H1.70065e-06L1.73398e-06 24.8476ZM1.66731e-06 26.3532L15 26.3532V28.6115H1.56729e-06L1.66731e-06 26.3532ZM1.46727e-06 30.8699L15 30.8699V32.3754H1.40059e-06L1.46727e-06 30.8699Z" fill="white" />
                        <path d="M1.36717e-06 33.1301H15V34.6357L1.30049e-06 34.6357L1.36717e-06 33.1301ZM1.20047e-06 36.8941H15V37.6468H1.16713e-06L1.20047e-06 36.8941ZM1.06711e-06 39.9052H15V40.6579H1.03377e-06L1.06711e-06 39.9052Z" fill="white" />
                        <path d="M1.00035e-06 41.4127H15V42.9182H9.3367e-07L1.00035e-06 41.4127ZM9.00331e-07 43.671H15V45.9294H8.00315e-07L9.00331e-07 43.671ZM7.66974e-07 46.6821H15V47.4349H7.33636e-07L7.66974e-07 46.6821Z" fill="white" />
                        <path d="M6.33531e-07 49.6952H15V50.448H6.00191e-07L6.33531e-07 49.6952ZM5.00174e-07 52.7063H15V54.9647H4.00157e-07L5.00174e-07 52.7063ZM3.66817e-07 55.7175H15V57.223H3.00138e-07L3.66817e-07 55.7175Z" fill="white" />
                        <path d="M2.66712e-07 57.9778H15V59.4833H2.00034e-07L2.66712e-07 57.9778ZM1.66695e-07 60.2361H15V62.4944H6.66787e-08L1.66695e-07 60.2361ZM3.33381e-08 63.2472H15V64H0L3.33381e-08 63.2472Z" fill="white" />
                    </svg>
                    <h1>DRONISOS</h1>
                </div>
            </div>

            <div class="slide-content">

                <div class="title">
                    <svg width="15" height="64" viewBox="0 0 15 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.83444e-06 0L15 6.47133e-07V0.75278L2.8011e-06 0.75278L2.83444e-06 0ZM2.76776e-06 1.50556L15 1.50556V3.01112L2.70108e-06 3.01112L2.76776e-06 1.50556ZM2.60106e-06 5.26946L15 5.26946V6.02224L2.56772e-06 6.02224L2.60106e-06 5.26946Z" fill="white" />
                        <path d="M2.46762e-06 8.28254L15 8.28254V9.7881L2.40094e-06 9.7881L2.46762e-06 8.28254ZM2.30092e-06 12.0464H15V12.7992L2.26758e-06 12.7992L2.30092e-06 12.0464ZM2.23425e-06 13.552L15 13.552V15.8103L2.13423e-06 15.8103L2.23425e-06 13.552Z" fill="white" />
                        <path d="M2.1008e-06 16.5651L15 16.5651V17.3179L2.06746e-06 17.3179L2.1008e-06 16.5651ZM1.96745e-06 19.5762L15 19.5762V21.8345H1.86743e-06L1.96745e-06 19.5762ZM1.83409e-06 22.5873L15 22.5873V24.0929H1.76741e-06L1.83409e-06 22.5873Z" fill="white" />
                        <path d="M1.73398e-06 24.8476H15V25.6004H1.70065e-06L1.73398e-06 24.8476ZM1.66731e-06 26.3532L15 26.3532V28.6115H1.56729e-06L1.66731e-06 26.3532ZM1.46727e-06 30.8699L15 30.8699V32.3754H1.40059e-06L1.46727e-06 30.8699Z" fill="white" />
                        <path d="M1.36717e-06 33.1301H15V34.6357L1.30049e-06 34.6357L1.36717e-06 33.1301ZM1.20047e-06 36.8941H15V37.6468H1.16713e-06L1.20047e-06 36.8941ZM1.06711e-06 39.9052H15V40.6579H1.03377e-06L1.06711e-06 39.9052Z" fill="white" />
                        <path d="M1.00035e-06 41.4127H15V42.9182H9.3367e-07L1.00035e-06 41.4127ZM9.00331e-07 43.671H15V45.9294H8.00315e-07L9.00331e-07 43.671ZM7.66974e-07 46.6821H15V47.4349H7.33636e-07L7.66974e-07 46.6821Z" fill="white" />
                        <path d="M6.33531e-07 49.6952H15V50.448H6.00191e-07L6.33531e-07 49.6952ZM5.00174e-07 52.7063H15V54.9647H4.00157e-07L5.00174e-07 52.7063ZM3.66817e-07 55.7175H15V57.223H3.00138e-07L3.66817e-07 55.7175Z" fill="white" />
                        <path d="M2.66712e-07 57.9778H15V59.4833H2.00034e-07L2.66712e-07 57.9778ZM1.66695e-07 60.2361H15V62.4944H6.66787e-08L1.66695e-07 60.2361ZM3.33381e-08 63.2472H15V64H0L3.33381e-08 63.2472Z" fill="white" />
                    </svg>
                    <h1>DRONISOS</h1>
                </div>
            </div>

            <div class="slide-content">

                <div class="title">
                    <svg width="15" height="64" viewBox="0 0 15 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.83444e-06 0L15 6.47133e-07V0.75278L2.8011e-06 0.75278L2.83444e-06 0ZM2.76776e-06 1.50556L15 1.50556V3.01112L2.70108e-06 3.01112L2.76776e-06 1.50556ZM2.60106e-06 5.26946L15 5.26946V6.02224L2.56772e-06 6.02224L2.60106e-06 5.26946Z" fill="white" />
                        <path d="M2.46762e-06 8.28254L15 8.28254V9.7881L2.40094e-06 9.7881L2.46762e-06 8.28254ZM2.30092e-06 12.0464H15V12.7992L2.26758e-06 12.7992L2.30092e-06 12.0464ZM2.23425e-06 13.552L15 13.552V15.8103L2.13423e-06 15.8103L2.23425e-06 13.552Z" fill="white" />
                        <path d="M2.1008e-06 16.5651L15 16.5651V17.3179L2.06746e-06 17.3179L2.1008e-06 16.5651ZM1.96745e-06 19.5762L15 19.5762V21.8345H1.86743e-06L1.96745e-06 19.5762ZM1.83409e-06 22.5873L15 22.5873V24.0929H1.76741e-06L1.83409e-06 22.5873Z" fill="white" />
                        <path d="M1.73398e-06 24.8476H15V25.6004H1.70065e-06L1.73398e-06 24.8476ZM1.66731e-06 26.3532L15 26.3532V28.6115H1.56729e-06L1.66731e-06 26.3532ZM1.46727e-06 30.8699L15 30.8699V32.3754H1.40059e-06L1.46727e-06 30.8699Z" fill="white" />
                        <path d="M1.36717e-06 33.1301H15V34.6357L1.30049e-06 34.6357L1.36717e-06 33.1301ZM1.20047e-06 36.8941H15V37.6468H1.16713e-06L1.20047e-06 36.8941ZM1.06711e-06 39.9052H15V40.6579H1.03377e-06L1.06711e-06 39.9052Z" fill="white" />
                        <path d="M1.00035e-06 41.4127H15V42.9182H9.3367e-07L1.00035e-06 41.4127ZM9.00331e-07 43.671H15V45.9294H8.00315e-07L9.00331e-07 43.671ZM7.66974e-07 46.6821H15V47.4349H7.33636e-07L7.66974e-07 46.6821Z" fill="white" />
                        <path d="M6.33531e-07 49.6952H15V50.448H6.00191e-07L6.33531e-07 49.6952ZM5.00174e-07 52.7063H15V54.9647H4.00157e-07L5.00174e-07 52.7063ZM3.66817e-07 55.7175H15V57.223H3.00138e-07L3.66817e-07 55.7175Z" fill="white" />
                        <path d="M2.66712e-07 57.9778H15V59.4833H2.00034e-07L2.66712e-07 57.9778ZM1.66695e-07 60.2361H15V62.4944H6.66787e-08L1.66695e-07 60.2361ZM3.33381e-08 63.2472H15V64H0L3.33381e-08 63.2472Z" fill="white" />
                    </svg>
                    <h1>DRONISOS</h1>
                </div>

            </div>

        </figure>
    </div>

    <div class="content-slider2">

        <div class="content-slider-abso">

            <div id="slider2">

                <figure>

                    <div class="slide-content-2">

                        <p>31 Janvier 2021</p>
                        <h2>France Digitale Tour</h2>

                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec mi porta neque tincidunt semper. </p>

                    </div>


                    <div class="slide-content-2">

                        <p class="date-mini">31 Janvier 2021</p>
                        <br />
                        <h2 class="titre-mini">France Digitale Tour</h2>
                        <br />
                        <p class="text-mini"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec mi porta neque tincidunt semper. </p>

                    </div>


                    <div class="slide-content-2">

                        <p>31 Janvier 2021</p>
                        <br />
                        <h2>France Digitale Tour</h2>
                        <br />
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec mi porta neque tincidunt semper. </p>

                    </div>


                </figure>



            </div>

        </div>

    </div>
</div>

</div>



<div class="container">
    <div id="articles">
        <div class="header-article">
            <div class="search">
                <input type="input" placeholder="Rechercher un article...">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="10.5" cy="10.5" r="7.5"></circle>
                    <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                </svg>
                <label>Rechercher un article</label>
            </div>
            <div class="tri">
                <?= strval(count($allArticles)).' articles en ligne' ?>
                <div class="cmd-tri">
                    Trier par catégories :
                    <?php 
                        $allThematiquesFR = $maThematique->get_AllThematiquesByLang('FRAN01');
                        foreach($allThematiquesFR as $row):
                    ?>
                        <button class="filter" id="filter<?= $row['numThem'] ?>"><?= $row["libThem"] ?></button>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------------------------------------------------------------------- -->

        <?
            
            $i = 1;
            foreach($allArticles as $row):
                // $mesMotsClesA = $monMotCleA->get_AllMotClesByArticle($row['numArt']);
                $mesThematiques = $maThematique->get_1Thematique($row['numThem']);
                $i++;
        ?>
        <div class="article <?= ($i % 2) ? "" : "left" ?> <?= 'them'.$row['numThem'] ?>">
            <img src="<?= $prefix ?>/back/article/uploads/<?= $row['urlPhotArt'] ?>" alt="">
            <div class="info-articles">
                <div class="content">
                    <div class="meta">
                        <span class="category"><?= $mesThematiques['libThem'] ?></span>
                        <div class="date">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.99301 1.3335C4.31301 1.3335 1.33301 4.32016 1.33301 8.00016C1.33301 11.6802 4.31301 14.6668 7.99301 14.6668C11.6797 14.6668 14.6663 11.6802 14.6663 8.00016C14.6663 4.32016 11.6797 1.3335 7.99301 1.3335ZM7.99967 13.3335C5.05301 13.3335 2.66634 10.9468 2.66634 8.00016C2.66634 5.0535 5.05301 2.66683 7.99967 2.66683C10.9463 2.66683 13.333 5.0535 13.333 8.00016C13.333 10.9468 10.9463 13.3335 7.99967 13.3335Z" fill="white" />
                                <path d="M8.33301 4.6665H7.33301V8.6665L10.833 10.7665L11.333 9.9465L8.33301 8.1665V4.6665Z" fill="white" />
                            </svg>
                            <p><?= substr($row['dtCreArt'], 0, -9) ?></p>
                        </div>
                    </div>
                    <h2><?= $row['libTitrArt'] ?></h2>
                    <hr>
                    <p><?= $row['libChapoArt'] ?></p>
                    <div class="interraction">
                        <a href="<?= $prefix ?>/article?id=<?= $row['numArt'] ?>">En savoir plus</a>
                        <div class="icons">
                            <?
                            if(isset($_SESSION['pseudoMemb'])){
                                $likeA = $monLikeA->get_1LikeArt($memb['numMemb'], $row['numArt']);
                                if($likeA){
                                    if($likeA['likeA'] == '1'){
                                        $heart = 'white';
                                    }else{
                                        $heart = 'none';
                                    }
                                }else{
                                    $heart = 'none';
                                }
                            }else{
                                $heart = 'none';
                            }
                        ?>
                            <svg id="like<?= $row['numArt'] ?>" class="like" width="26" height="23" viewBox="0 0 26 23" fill="<?= $heart ?>" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.1496 2.85611C20.6844 0.382065 16.6842 0.380913 14.2179 2.85496L14.2156 2.85611L12.9985 4.07701L11.7814 2.85611C9.31513 0.382065 5.31716 0.382065 2.84972 2.85611C0.383427 5.33015 0.383427 9.34299 2.84972 11.817L4.06564 13.0379L12.9985 22L21.9313 13.0379L23.1496 11.817C25.6159 9.34414 25.617 5.33246 23.1519 2.85841L23.1496 2.85611Z" stroke="white" stroke-width="1.97918" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25 17C25 17.7072 24.719 18.3855 24.219 18.8856C23.7189 19.3857 23.0406 19.6667 22.3333 19.6667H6.33333L1 25V3.66667C1 2.95942 1.28095 2.28115 1.78105 1.78105C2.28115 1.28095 2.95942 1 3.66667 1H22.3333C23.0406 1 23.7189 1.28095 24.219 1.78105C24.719 2.28115 25 2.95942 25 3.66667V17Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? 
            endforeach
        ?>

        <!-- -------------------------------------------------------------------------------------------------------------------------- -->

        <!-- <div class="article">
            <img src="/front/assets/img/drone-carrousel.jpg" alt="image de drone">
            <div class="info-articles">
                <div class="content">
                    <div class="meta">
                        <span class="category">Startups</span>
                        <div class="date">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.99301 1.3335C4.31301 1.3335 1.33301 4.32016 1.33301 8.00016C1.33301 11.6802 4.31301 14.6668 7.99301 14.6668C11.6797 14.6668 14.6663 11.6802 14.6663 8.00016C14.6663 4.32016 11.6797 1.3335 7.99301 1.3335ZM7.99967 13.3335C5.05301 13.3335 2.66634 10.9468 2.66634 8.00016C2.66634 5.0535 5.05301 2.66683 7.99967 2.66683C10.9463 2.66683 13.333 5.0535 13.333 8.00016C13.333 10.9468 10.9463 13.3335 7.99967 13.3335Z" fill="white" />
                                <path d="M8.33301 4.6665H7.33301V8.6665L10.833 10.7665L11.333 9.9465L8.33301 8.1665V4.6665Z" fill="white" />
                            </svg>
                            21 février 2021
                        </div>
                    </div>
                    <h2>Dronisos</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="interraction">
                        En savoir plus
                        <div class="icons">
                            <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.1496 2.85611C20.6844 0.382065 16.6842 0.380913 14.2179 2.85496L14.2156 2.85611L12.9985 4.07701L11.7814 2.85611C9.31513 0.382065 5.31716 0.382065 2.84972 2.85611C0.383427 5.33015 0.383427 9.34299 2.84972 11.817L4.06564 13.0379L12.9985 22L21.9313 13.0379L23.1496 11.817C25.6159 9.34414 25.617 5.33246 23.1519 2.85841L23.1496 2.85611Z" stroke="white" stroke-width="1.97918" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25 17C25 17.7072 24.719 18.3855 24.219 18.8856C23.7189 19.3857 23.0406 19.6667 22.3333 19.6667H6.33333L1 25V3.66667C1 2.95942 1.28095 2.28115 1.78105 1.78105C2.28115 1.28095 2.95942 1 3.66667 1H22.3333C23.0406 1 23.7189 1.28095 24.219 1.78105C24.719 2.28115 25 2.95942 25 3.66667V17Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="article left">
            <div class="info-articles">
                <div class="content">
                    <div class="meta">
                        <span class="category">Startups</span>
                        <div class="date">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.99301 1.3335C4.31301 1.3335 1.33301 4.32016 1.33301 8.00016C1.33301 11.6802 4.31301 14.6668 7.99301 14.6668C11.6797 14.6668 14.6663 11.6802 14.6663 8.00016C14.6663 4.32016 11.6797 1.3335 7.99301 1.3335ZM7.99967 13.3335C5.05301 13.3335 2.66634 10.9468 2.66634 8.00016C2.66634 5.0535 5.05301 2.66683 7.99967 2.66683C10.9463 2.66683 13.333 5.0535 13.333 8.00016C13.333 10.9468 10.9463 13.3335 7.99967 13.3335Z" fill="white" />
                                <path d="M8.33301 4.6665H7.33301V8.6665L10.833 10.7665L11.333 9.9465L8.33301 8.1665V4.6665Z" fill="white" />
                            </svg>
                            21 février 2021
                        </div>
                    </div>
                    <h2>Dronisos</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="interraction">
                        En savoir plus
                        <div class="icons">
                            <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.1496 2.85611C20.6844 0.382065 16.6842 0.380913 14.2179 2.85496L14.2156 2.85611L12.9985 4.07701L11.7814 2.85611C9.31513 0.382065 5.31716 0.382065 2.84972 2.85611C0.383427 5.33015 0.383427 9.34299 2.84972 11.817L4.06564 13.0379L12.9985 22L21.9313 13.0379L23.1496 11.817C25.6159 9.34414 25.617 5.33246 23.1519 2.85841L23.1496 2.85611Z" stroke="white" stroke-width="1.97918" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25 17C25 17.7072 24.719 18.3855 24.219 18.8856C23.7189 19.3857 23.0406 19.6667 22.3333 19.6667H6.33333L1 25V3.66667C1 2.95942 1.28095 2.28115 1.78105 1.78105C2.28115 1.28095 2.95942 1 3.66667 1H22.3333C23.0406 1 23.7189 1.28095 24.219 1.78105C24.719 2.28115 25 2.95942 25 3.66667V17Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <img src="/front/assets/img/drone-carrousel.jpg" alt="image de drone">
        </div> -->
    </div>
</div>
<?php
require_once('../commons/footer.php');
?>