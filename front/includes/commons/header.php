<?php
$isConnected = false;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    
</head>
<body>
    <header>
        <div class="navbar">
            <div>
                <a <?= ($_SERVER['REQUEST_URI'] == '/Buenorizon-Blog-art-G3/front/includes/pages/home.php') ? 'class="highlight"' : '' ?> href="../pages/home.php">Accueil</a>
                <a <?= ($_SERVER['REQUEST_URI'] == '/Buenorizon-Blog-art-G3/front/includes/pages/article.php') ? 'class="highlight"' : '' ?> href="../pages/home.php#articles">Articles</a>
                <a <?= ($_SERVER['REQUEST_URI'] == '/Buenorizon-Blog-art-G3/front/includes/pages/contact.php') ? 'class="highlight"' : '' ?> href="../pages/contact.php">Contact</a>
                <a <?= ($_SERVER['REQUEST_URI'] == '/Buenorizon-Blog-art-G3/front/includes/pages/about.php') ? 'class="highlight"' : '' ?> href="../pages/about.php">A propos</a>
            </div>
            <div>
                <a <?= ($_SERVER['REQUEST_URI'] == '/Buenorizon-Blog-art-G3/front/includes/pages/login.php') ? 'class="highlight"' : '' ?> href="../pages/login.php"><?= $isConnected ? "JacquesDu33" : "Connexion" ?> </a>
                <button onclick="location.href='../pages/signin.php'"><?= $isConnected ? "Mon compte" : "S'inscrire"?></button>
            </div>
        </div>
    </header>
    <main>