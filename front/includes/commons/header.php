<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isConnected = false;
if ($_SERVER['SERVER_NAME'] == 'plateforme-mmi.iut.u-bordeaux-montaigne.fr') {
    $chemin = subStr($_SERVER['REQUEST_URI'], 30);
    $prefix = '/user03/Buenorizon-Blog-art-G3';
} else {
    $chemin = $_SERVER['REQUEST_URI'];
    $prefix = '';
}
if ((subStr($chemin, -1) == '/') && $chemin != '/') {
    $chemin = subStr($chemin, 0, -1);
}

require_once __DIR__ . '/../../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;

if ($chemin == '/') {
    require_once __DIR__ . '/../../../CLASS_CRUD/article.class.php';
    $monArticle = new ARTICLE;
    require_once __DIR__ . '/../../../CLASS_CRUD/motclearticle.class.php';
    $monMotCleA = new MOTCLEARTICLE;
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eclatech</title>
    <link rel="icon" href="<?= $prefix ?>/front/assets/img/favicon.ico" />
    <link rel="stylesheet" href="<?= $prefix ?>/front/assets/css/main.css">

    <? if(isset($_SESSION['pseudoMemb']) && $chemin == '/login'){ ?>
    <meta http-equiv="refresh" content="2, url=<?= $prefix ?>/" />
    <? } ?>

    <? if($chemin == '/signin'){ ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <? } ?>
    <script>
        var SPE = {};
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.spline.design/lib/anime.min.js"></script>
    <script src="https://cdn.spline.design/lib/spline.runtime.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <div class="navbar">
            <div>
                <a <?= ($chemin == '/') ? 'class="highlight"' : '' ?> href="<?= $prefix ?>/">Accueil</a>
                <a <?= ($chemin == '/article') ? 'class="highlight"' : '' ?> href="<?= $prefix ?>/article">Articles</a>
                <a <?= ($chemin == '/contact') ? 'class="highlight"' : '' ?> href="<?= $prefix ?>/contact">Contact</a>
                <a <?= ($chemin == '/about') ? 'class="highlight"' : '' ?> href="<?= $prefix ?>/about">A propos</a>
            </div>
            <div>
                <? if(isset($_SESSION['pseudoMemb'])){ ?>
                <p><?= $_SESSION['pseudoMemb'] ?></p>
                <button onclick="location.href='<?= $prefix ?>/moncompte'">Mon compte</button>
                <? 
                            $myMembre = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb']);
                            if ($myMembre['idStat'] == 9){ 
                        ?>
                <p><a href='<?= $prefix ?>/index1.php'>CRUD</a></p>
                <? } ?>
                <? }else{ ?>
                <a <?= ($chemin == '/login') ? 'class="highlight"' : '' ?> href="<?= $prefix ?>/login">Connexion</a>
                <button onclick="location.href='<?= $prefix ?>/signin'">S'inscrire</button>
                <? } ?>
            </div>
        </div>
    </header>
    <main>