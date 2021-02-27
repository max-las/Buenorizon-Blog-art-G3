<? 
    session_start();
	if(isset($_SESSION['pseudoMemb'])){
        require_once __DIR__ . '/../CLASS_CRUD/membre.class.php';
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