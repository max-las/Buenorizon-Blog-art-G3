<?php
	// CRUD LANGUE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LANGUE{
		function get_1Langue($numLang){
			global $db;

			$query = 'SELECT * FROM langue WHERE numLang = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numLang));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_1LangueByPays($numLang){
			global $db;

		}

		function get_AllLangues(){
			global $db;

			$query = 'SELECT * FROM langue';

			$request = $db->query($query);
		
			$allLangues = $request->fetchAll();
	
			$request->closeCursor();
			return ($allLangues);
		}

		function get_AllLanguesByPays(){
			global $db;

		}

		function create($numLang, $lib1Lang, $lib2Lang, $numPays){
			global $db;
			try {
				$query = "INSERT INTO langue (numLang, lib1Lang, lib2Lang, numPays) VALUES (?, ?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numLang, $lib1Lang, $lib2Lang, $numPays));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert LANGUE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numLang, $lib1Lang, $lib2Lang, $numPays){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE langue SET lib1Lang = ?, lib2Lang2 = ?, numPays = ? WHERE numLang = ?";

				$request = $db->prepare($query);

				$request->execute(array($lib1Lang, $lib2Lang, $numPays, $numLang));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update LANGUE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numLang){
			global $db;
			try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete LANGUE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
