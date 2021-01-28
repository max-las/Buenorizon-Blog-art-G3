<?php
	// CRUD ANGLE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class ANGLE{
		function get_1Angle($numAngl){
			global $db;

			$query = 'SELECT * FROM angle WHERE numAngl = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numAngl));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllAngles(){
			global $db;

			$query = 'SELECT * FROM angle';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllAnglesByLang($numLang){
			global $db;

			$query = 'SELECT * FROM angle WHERE numLang = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numLang));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function create($numAngl, $libAngl, $numLang){
			global $db;
			try {
				$query = "INSERT INTO angle (numAngl, libAngl, numLang) VALUES (?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numAngl, $libAngl, $numLang));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert ANGLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numAngl, $libAngl, $numLang){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE angle SET libAngl = ?, numLang = ? WHERE numAngl = ?";

				$request = $db->prepare($query);

				$request->execute(array($libAngl, $numLang, $numAngl));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update ANGLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numAngl){
			global $db;
			try {
				$query = "DELETE FROM angle WHERE numAngl = ?";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numAngl));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete ANGLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
