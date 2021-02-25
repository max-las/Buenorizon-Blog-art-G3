<?php 
require_once __DIR__ . '../../CONNECT/database.php';
class MEMBRE{
    function get_1Membre($numMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE numMemb = ?';

		$request = $db->prepare($query);
	
		$request->execute(array($numMemb));
	
		$result = $request->fetch();
	
		$request->closeCursor();
		return ($result);
    }

    function get_1MembreByMail($eMailMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE eMailMemb = ?';

		$request = $db->prepare($query);
	
		$request->execute(array($eMailMemb));
	
		$result = $request->fetch();
	
		$request->closeCursor();
		return ($result);
    }

    function get_1MembreByPseudo($pseudoMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE pseudoMemb = ?';

		$request = $db->prepare($query);
	
		$request->execute(array($pseudoMemb));
	
		$result = $request->fetch();
	
		$request->closeCursor();
		return ($result);
    }

    function get_AllMembres(){
        global $db;

        $query = 'SELECT * FROM membre';
        $request = $db->query($query);
    
        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByMail($eMailMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE eMailMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($eMailMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByPseudo($pseudoMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE pseudoMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($pseudoMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByNom($nomMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE nomMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($nomMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByPrenom($prenomMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE prenomMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($prenomMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembreByStatut($idStat){
        global $db;

        $query = 'SELECT * FROM membre WHERE idStat = ?';

        $request = $db->prepare($query);

        $request->execute(array($idStat));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresWithStatut(){
        global $db;

        $query = 'SELECT * FROM membre INNER JOIN statut ON membre.idStat = statut.idStat';

        $request = $db->prepare($query);

        $request->execute();

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_1MembreWithStatut($numMemb){
        global $db;

        $query = 'SELECT * FROM membre INNER JOIN statut ON membre.idStat = statut.idStat WHERE numMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($numMemb));

        $result = $request->fetch();

        $request->closeCursor();
        return ($result);
    }

    function create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $idStat, $souvenirMemb, $accordMemb){
        global $db;
        try {
            $query = "INSERT INTO membre (prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, idStat, souvenirMemb, accordMemb) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $db->beginTransaction();

            $request = $db->prepare($query);
            
            $request->execute(array($prenomMemb, $nomMemb, $pseudoMemb, password_hash($passMemb, PASSWORD_BCRYPT), $eMailMemb, $dtCreaMemb, $idStat, $souvenirMemb, $accordMemb));

            $db->commit();

            $request->closeCursor();
        }
        catch (PDOException $e) {
                die('Erreur insert MEMBRE : ' . $e->getMessage());
                $db->rollBack();
                $request->closeCursor();
        }
    }

    function update($numMemb, $prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $idStat, $souvenirMemb, $accordMemb){
        global $db;
        try {
            $db->beginTransaction();

            if(empty($passMemb)){
                $query = "UPDATE membre SET prenomMemb = ?, nomMemb = ?, pseudoMemb = ?, eMailMemb = ?, dtCreaMemb = ?, souvenirMemb = ?, accordMemb = ?, idStat = ? WHERE numMemb = ?";

                $request = $db->prepare($query);
    
                $request->execute(array($prenomMemb, $nomMemb, $pseudoMemb, $eMailMemb, $dtCreaMemb, $idStat, $souvenirMemb, $accordMemb, $numMemb));
            }else{
                $query = "UPDATE membre SET prenomMemb = ?, nomMemb = ?, pseudoMemb = ?, passMemb = ?, eMailMemb = ?, dtCreaMemb = ?, idStat = ?, souvenirMemb = ?, accordMemb = ? WHERE numMemb = ?";

                $request = $db->prepare($query);
    
                $request->execute(array($prenomMemb, $nomMemb, $pseudoMemb, password_hash($passMemb, PASSWORD_BCRYPT), $eMailMemb, $dtCreaMemb, $idStat, $souvenirMemb, $accordMemb, $numMemb));
            }

            $db->commit();
            $request->closeCursor();
        }
        catch (PDOException $e) {
                die('Erreur update MEMBRE : ' . $e->getMessage());
                $db->rollBack();
                $request->closeCursor();
        }
    }

    function delete($numMemb){
        global $db;
        try {
            $query = "DELETE FROM membre WHERE numMemb = ?";

              $db->beginTransaction();

            $request = $db->prepare($query);

            $request->execute(array($numMemb));

            $db->commit();
            $request->closeCursor();

        }
        catch (PDOException $e) {
                die('Erreur delete MEMBRE : ' . $e->getMessage());
                $db->rollBack();
                $request->closeCursor();
        }
    }
}