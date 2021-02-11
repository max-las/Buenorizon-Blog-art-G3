<?php
	// CRUD PAYS (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class PAYS{
		function get_1Pays($numPays){
			global $db;

			$query = 'SELECT * FROM pays WHERE numPays = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numPays));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllPays(){
			global $db;

			$query = 'SELECT * FROM pays';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function create($numPays, $cdPays, $frPays, $enPays){
			global $db;
			try {
				$query = "INSERT INTO pays (numPays, cdPays, frPays, enPays) VALUES (?, ?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numPays, $cdPays, $frPays, $enPays));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert PAYS : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numPays, $cdPays, $frPays, $enPays){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE pays SET cdPays = ?, frPays = ?, enPays = ? WHERE numPays = ?";

				$request = $db->prepare($query);

				$request->execute(array($cdPays, $frPays, $enPays, $numPays));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update PAYS : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numPays){
			global $db;
			try {
				$query = "DELETE FROM pays WHERE numPays = ?";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numPays));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete PAYS : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
