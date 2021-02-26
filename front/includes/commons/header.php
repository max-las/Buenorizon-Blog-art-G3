<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;

$isConnected = false;
$chemin = $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eclatech</title>
    <link rel="icon" href="/front/assets/img/favicon.ico" />
    <link rel="stylesheet" href="/front/assets/css/main.css">

    <? if(isset($_SESSION['pseudoMemb']) && $chemin == '/login'){ ?>
    <meta http-equiv="refresh" content="2, url=/" />
    <? } ?>

    <? if($chemin == '/signin'){ ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("theForm").submit();
        }
    </script>
    <? } ?>
</head>

<body>
    <header>
        <div class="navbar">
            <div>
                <a <?= ($chemin == '/') ? 'class="highlight"' : '' ?> href="/">Accueil</a>
                <a <?= ($chemin == '/article') ? 'class="highlight"' : '' ?> href="/article">Articles</a>
                <a <?= ($chemin == '/contact') ? 'class="highlight"' : '' ?> href="/contact">Contact</a>
                <a <?= ($chemin == '/about') ? 'class="highlight"' : '' ?> href="/about">A propos</a>
            </div>
            <div>
                <? if(isset($_SESSION['pseudoMemb'])){ ?>
                <p><?= $_SESSION['pseudoMemb'] ?></p>
                <button onclick="location.href='/moncompte'">Mon compte</button>
                <? 
                            $myMembre = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb']);
                            if ($myMembre['idStat'] == 9){ 
                        ?>
                <!-- HTML link to CRUD -->
                <? } ?>
                <? }else{ ?>
                <a <?= ($chemin == '/login') ? 'class="highlight"' : '' ?> href="/login">Connexion</a>
                <button onclick="location.href='/signin'">S'inscrire</button>
                <? } ?>
            </div>
        </div>
    </header>
    <main>