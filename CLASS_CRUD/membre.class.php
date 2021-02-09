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

    function get_AllMembres(){
        global $db;

        $query = 'SELECT * FROM membre';
        $request = $db->query($query);
    
        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllAnglesByMail($eMailMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE eMailMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($eMailMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllAnglesByPseudo($pseudoMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE pseudoMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($pseudoMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllAnglesByNom($nomMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE nomMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($nomMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllAnglesByPrenom($prenomMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE prenomMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($prenomMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $souvenirMemb, $accordMemb){
        global $db;
        try {
            $query = "INSERT INTO membre (prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, souvenirMemb, accordMemb) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $db->beginTransaction();

            $request = $db->prepare($query);
            
            $request->execute(array($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $souvenirMemb, $accordMemb));

            $db->commit();

            $request->closeCursor();
        }
        catch (PDOException $e) {
                die('Erreur insert MEMBRE : ' . $e->getMessage());
                $db->rollBack();
                $request->closeCursor();
        }
    }

    function update($numMemb, $prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $souvenirMemb, $accordMemb){
        global $db;
        try {
            $db->beginTransaction();

            $query = "UPDATE membre SET prenomMemb = ?, nomMemb = ?, pseudoMemb = ?, passMemb = ?, eMailMemb = ?, dtCreaMemb = ?, souvenirMemb = ?, accordMemb = ? WHERE numMemb = ?";

            $request = $db->prepare($query);

            $request->execute(array($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $souvenirMemb, $accordMemb, $numMemb));

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