<?php
	// CRUD MOTCLE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MOTCLE{
		function get_1MotCle($numMotCle){
			global $db;

			$query = 'SELECT * FROM motcle WHERE numMotCle = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numMotCle));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllMotCles(){
			global $db;

			$query = 'SELECT * FROM motcle';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllMotClesWithLang(){
			global $db;

			$query = 'SELECT * FROM motcle INNER JOIN langue ON motcle.numLang = langue.numLang';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_1MotCleWithLang($numMotCle){
			global $db;

			$query = 'SELECT * FROM motcle INNER JOIN langue ON motcle.numLang = langue.numLang WHERE numMotCle = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numMotCle));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllMotClesByLang($numLang){
			global $db;

			$query = 'SELECT * FROM motcle WHERE numLang = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numLang));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function create($libMotCle, $numLang){
			global $db;
			try {
				$query = "INSERT INTO motcle (libMotCle, numLang) VALUES (?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($libMotCle, $numLang));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert MOTCLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numMotCle, $libMotCle, $numLang){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE motcle SET libMotCle = ?, numLang = ? WHERE numMotCle = ?";

				$request = $db->prepare($query);

				$request->execute(array($libMotCle, $numLang, $numMotCle));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update MOTCLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numMotCle){
			global $db;
			try {
				$query = "DELETE FROM motcle WHERE numMotCle = ?";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numMotCle));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete MOTCLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
