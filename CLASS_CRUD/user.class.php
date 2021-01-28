<?php
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class USER{
		function get_1User($pseudoUser, $passUser){
			global $db;

			$query = 'SELECT * FROM user WHERE pseudoUser = ? AND passUser = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($pseudoUser, $passUser));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllUsers(){
			global $db;

			$query = 'SELECT * FROM user';
			$request = $db->query($query);
		
			$result = $request->fetchAll();

			$request->closeCursor();
			return ($result);
		}

		function get_ExistPseudo($pseudoUser) {
			global $db;

			$query = 'SELECT pseudoUser FROM user WHERE pseudoUser = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($pseudoUser));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return (boolval($result));

		}

		function get_AllUsersByStat($idStat){
			global $db;

			$query = 'SELECT * FROM user WHERE idStat = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($idStat));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_NbAllUsersByStat($idStat){
			global $db;

			$query = 'SELECT COUNT(*) FROM user WHERE idStat = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($idStat));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return (intval($result[0]));

		}

		function create($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
			try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert USER : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
      try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update USER : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($pseudoUser, $passUser){
			global $db;
      try {
          $db->beginTransaction();


					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur delete USER : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

	} // End of class
