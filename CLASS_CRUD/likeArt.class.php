<?php
	// CRUD ANGLE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LIKEART{
		function get_1LikeArt($numMemb, $numArt){
			global $db;

			$query = 'SELECT * FROM likeart WHERE (numMemb = ? AND numArt = ?)';

			$request = $db->prepare($query);
	
			$request->execute(array($numMemb, $numArt));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLikesArt(){
			global $db;

			$query = 'SELECT * FROM likeart';

			$request = $db->query($query);
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLikesArtByMembre($numMemb){
			global $db;

			$query = 'SELECT * FROM likeart WHERE numMemb = ?';

			$request = $db->prepare($query);

			$request->execute(array($numMemb));
		
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLikesArtByArticle($numArt){
			global $db;

			$query = 'SELECT * FROM likeart INNER JOIN membre ON membre.numMemb = likeart.numMemb WHERE numArt = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numArt));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
        }

		function create($numMemb, $numArt, $likeA){
			global $db;
			try {
				$query = "INSERT INTO likeart (numMemb, numArt, likeA) VALUES (?, ?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numMemb, $numArt, $likeA));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert LIKEART : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function update($numMemb, $numArt, $likeA){
			global $db;
			try {
				$db->beginTransaction();

				$query = "UPDATE likeart SET likeA = ? WHERE (numMemb = ? AND numArt = ?)";

				$request = $db->prepare($query);

				$request->execute(array($likeA, $numMemb, $numArt));

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update LIKEART : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numMemb, $numArt){
			global $db;
			try {
				$query = "DELETE FROM likeart WHERE (numMemb = ? AND numArt = ?)";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numMemb, $numArt));

				$db->commit();
				$request->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete LIKEART : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}
	}	// End of class
