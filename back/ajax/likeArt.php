<?php

session_start();

require_once __DIR__.'/../../CLASS_CRUD/likeArt.class.php';
$monLikeArt = new LIKEART;

require_once __DIR__.'/../../CLASS_CRUD/article.class.php';
$monArticle = new ARTICLE;

require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;

$res['success'] = false;
$res['numArt'] = isset($_POST['numArt']) ? $_POST['numArt'] : "";

if(empty($_POST['numArt'])){
    $res['error'] = "Aucun article selectionné";
}else if(!$monArticle->get_1Article($_POST['numArt'])){
    $res['error'] = "Article invalide";
}else if(empty($_SESSION['pseudoMemb'])){
    $res['error'] = "Membre non connecté";
}else{
    $numMemb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb'])["numMemb"];
    
    $precedent = $monLikeArt->get_1LikeArt($numMemb, $_POST['numArt']);

    if($precedent){
        $res['like'] = !boolval($precedent['likeA']);
        $newVal = intval($res['like']);
        $monLikeArt->update($numMemb, $_POST['numArt'], $newVal);
    }else{
        $monLikeArt->create($numMemb, $_POST['numArt'], 1);
        $res['like'] = true;
    }

    
    $res['success'] = true;
}

echo json_encode($res);


?>