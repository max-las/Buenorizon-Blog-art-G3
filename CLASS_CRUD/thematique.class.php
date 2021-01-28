<?php
	// CRUD THEMATIQUE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class THEMATIQUE{
		function get_1Thematique($numThem){
			global $db;

			$query = 'SELECT * FROM thematique WHERE numThem = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numThem));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllThematiques(){
			global $db;

			$query = 'SELECT * FROM thematique';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllThematiquesByLang($numLang){
			global $db;

			$query = 'SELECT * FROM thematique WHERE numLang = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numLang));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function create($numThem, $libThem, $numLang){
			global $db;
			try {
				$query = "INSERT INTO thematique (numThem, libThem, numLang) VALUES (?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numThem, $libThem, $numLang));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert THEMATIQUE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numThem, $libThem, $numLang){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE thematique SET libThem = ?, numLang = ? WHERE numThem = ?";

				$request = $db->prepare($query);

				$request->execute(array($libThem, $numLang, $numThem));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update THEMATIQUE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numThem){
			global $db;
			try {
				$query = "DELETE FROM thematique WHERE numThem = ?";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numThem));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete THEMATIQUE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
