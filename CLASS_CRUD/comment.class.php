<?php
	// CRUD ANGLE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class COMMENT{
		function get_1Comment($numSeqCom, $numArt){
			global $db;

			$query = 'SELECT * FROM comment WHERE $numSeqCom = ?, numArt = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numSeqCom, $numArt));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllComments(){
			global $db;

			$query = 'SELECT * FROM comment';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllCommentsByArticle($numArt){
			global $db;

			$query = 'SELECT * FROM comment WHERE numArt = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numArt));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
        }

		function create($numSeqCom, $numArt, $dtCreCom, $libCom, $attModOK, $affComOK, $notifComKOAff){
			global $db;
			try {
				$query = "INSERT INTO comment (numSeqCom, numArt, dtCreCom, libCom, attModOK, affComOK, notifComKOAff) VALUES (?, ?, ?, ?, ?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numSeqCom, $numArt, $dtCreCom, $libCom, $attModOK, $affComOK, $notifComKOAff));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert COMMENT : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numSeqCom, $numArt, $dtCreCom, $libCom, $attModOK, $affComOK, $notifComKOAff){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE comment SET dtCreCom = ?, libCom = ?, attModOk = ?, affComOK = ?, notifComKOAff = ? WHERE numSeqCom = ?, numArt = ?";

				$request = $db->prepare($query);

				$request->execute(array($numSeqCom, $numArt, $dtCreCom, $libCom, $attModOK, $affComOK, $notifComKOAff));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update COMMENT : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numSeqCom, $numArt){
			global $db;
			try {
				$query = "DELETE FROM comment WHERE numSeqCom = ?, numArt = ?";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numSeqCom, $numArt));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete COMMENT : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
