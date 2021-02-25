<? 
    session_start();
	if(isset($_SESSION['pseudoMemb'])){
        require_once __DIR__ . '/../CLASS_CRUD/membre.class.php';
        $monMembre = new MEMBRE;
		$myMembre = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb']);
		if(intval($myMembre['idStat']) != 9){
            header("Location: ../../front/includes/pages/home.php");
            die();
		}
	}else{
		header("Location: ../../front/includes/pages/home.php");
        die();
	}
?>