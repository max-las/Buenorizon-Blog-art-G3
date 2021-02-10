<?php
	// CRUD MOTCLEARTICLE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MOTCLEARTICLE{
		function get_AllMotClesByArticle($numArt){
			global $db;

			$query = 'SELECT * FROM motclearticle INNER JOIN motcle ON motclearticle.numMotCle = motcle.numMotCle WHERE numArt = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numArt));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllArticlesByMotCle($numMotCle){
			global $db;

			$query = 'SELECT * FROM motclearticle INNER JOIN article ON motclearticle.numArt = article.numArt WHERE numMotCle = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numMotCle));
	
			$result = $request->fetchAll();
	
			$request->closeCursor();
			return ($result);
		}

		function create($numMotCle, $numArt){
			global $db;
			try {
				$query = "INSERT INTO motclearticle (numMotCle, numArt) VALUES (?, ?)";

				$db->beginTransaction();

				$request = $db->prepare($query);
				
				$request->execute(array($numMotCle, $numArt));

				$db->commit();

				$request->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert MOTCLE : ' . $e->getMessage());
					$db->rollBack();
					$request->closeCursor();
			}
		}

		function delete($numMotCle, $numArt){
			global $db;
			try {
				$query = "DELETE FROM motcle WHERE numMotCle = ? AND numArt = ?";

          		$db->beginTransaction();

				$request = $db->prepare($query);

				$request->execute(array($numMotCle, $numArt));

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
