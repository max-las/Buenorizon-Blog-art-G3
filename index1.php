<? 
    session_start();
	if(isset($_SESSION['pseudoMemb'])){
        require_once __DIR__ . '/CLASS_CRUD/membre.class.php';
        $monMembre = new MEMBRE;
		$myMembre = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb']);
		if(intval($myMembre['idStat']) != 9){
        header("Location: ../front/includes/pages/home.php");
        die();
		}
	}else{
		header("Location: front/includes/pages/home.php");
        die();
	}
?>

<?php
///////////////////////////////////////////////////////////////
//
//  Gestion des CRUD (PDO) - 23 Janvier 2021
//
//  Script  : index1.php 	-		BLOGART21 (Etud)
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/util/utilErrOn.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion des CRUD</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <style type="text/css">
				div {
					padding-top: 60px;
					padding-bottom: 40px;
					margin-bottom: 0px;
					margin-left: 60px;
				}
    </style>
</head>
<body>
	<br />
	<h1>Panneau d'Admin : Gestion des CRUD - BLOGART21</h1>
	<br /><hr />
	<div>
	Gestion du CRUD :
	<a href="./back/angle/angle.php">Angle </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/article/article.php">Article </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/comment/comment.php">Commentaire </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/commentplus/commentplus.php">Réponse sur Commentaire </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/langue/langue.php">Langue </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/likeart/likeart.php">Like Article </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/likecom/likecom.php">Like Commentaire </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/membre/membre.php">Membre </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/motcle/motcle.php">Mot-clé </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/statut/statut.php">Statut </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/thematique/thematique.php">Thématique </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/user/user.php">User </a>
	</div>
	<br>
	<hr>
	<h3><i>- - Etudiants - -</i></h3>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
