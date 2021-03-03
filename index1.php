<? 
    session_start();
	if(isset($_SESSION['pseudoMemb'])){
        require_once __DIR__ . '/CLASS_CRUD/membre.class.php';
        $monMembre = new MEMBRE;
		$myMembre = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb']);
		if(intval($myMembre['idStat']) != 9){
			if($_SERVER['SERVER_NAME'] == 'plateforme-mmi.iut.u-bordeaux-montaigne.fr'){
				header("Location: /user03/Buenorizon-Blog-art-G3");
			}else{
				header("Location: /");
			}
        die();
		}
	}else{
		if($_SERVER['SERVER_NAME'] == 'plateforme-mmi.iut.u-bordeaux-montaigne.fr'){
			header("Location: /user03/Buenorizon-Blog-art-G3");
		}else{
			header("Location: /");
		}
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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Montserrat', sans-serif;
		}

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
	<br />
	<hr />
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
		<a href="./back/commentPlus/commentPlus.php">Réponse sur Commentaire </a>
		<br /><br />
		Gestion du CRUD :
		<a href="./back/langue/langue.php">Langue </a>
		<br /><br />
		Gestion du CRUD :
		<a href="./back/likeArt/likeArt.php">Like Article </a>
		<br /><br />
		Gestion du CRUD :
		<a href="./back/likeAom/likeCom.php">Like Commentaire </a>
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