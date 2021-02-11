<?php
	// CRUD ANGLE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LIKECOM{
		function get_1LikeCom($numMemb, $numSeqCom, $numArt){
			global $db;

			$query = 'SELECT * FROM likecom WHERE (numMemb = ? AND numSeqCom = ? AND numArt = ?)';

			$request = $db->prepare($query);
	
			$request->execute(array($numMemb, $numSeqCom, $numArt));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLikesCom(){
			global $db;

			$query = 'SELECT * FROM likecom';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLikesComByMembre($numMemb){
			global $db;

			$query = 'SELECT * FROM likecom WHERE numMemb = ?';

			$request = $db->prepare($query);

			$request->execute(array($numMemb));
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLikesComByArticle($numArt){
			global $db;

			$query = 'SELECT * FROM likecom WHERE numArt = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numArt));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
        }

		function create($numMemb, $numSeqCom, $numArt, $likeC){
			global $db;
			try {
				$query = "INSERT INTO likecom (numMemb, numSeqCom, numArt, likeC) VALUES (?, ?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numMemb, $numSeqCom, $numArt, $likeC));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert LIKECOM : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numMemb, $numSeqCom, $numArt, $likeC){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE likecom SET likeC = ? WHERE (numMemb = ? AND numSeqCom = ? AND numArt = ?)";

				$request = $db->prepare($query);

				$request->execute(array($likeC, $numMemb, $numSeqCom, $numArt));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update LIKECOM : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numMemb, $numSeqCom, $numArt){
			global $db;
			try {
				$query = "DELETE FROM likecom WHERE (numMemb = ? AND numSeqCom = ? AND numArt = ?)";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numMemb, $numSeqCom, $numArt));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete LIKECOM : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
