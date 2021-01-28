<?php
// CRUD STATUT (ETUD)

require_once __DIR__ . '../../CONNECT/database.php';

class STATUT
{
	function get_1Statut($idStat)
	{
		global $db;
	}

	function get_AllStatuts()
	{
		global $db;

		$query = 'SELECT * FROM statut';
		$result = $db->query($query);
	
		$allStatuts = $result->fetchAll();

		return ($allStatuts);
	}

	function create($libStat)
	{
		global $db;
		try {
			$query = "INSERT INTO statut (libStat) VALUES (?)";

			$request = $db->prepare($query);

			$db->beginTransaction();

			$request->execute(array($libStat));

			$db->commit();
			$request->closeCursor();
		} catch (PDOException $e) {
			die('Erreur insert STATUT : ' . $e->getMessage());
			$db->rollBack();
			$request->closeCursor();
		}
	}

	function update($idStat, $libStat)
	{
		// echo $idStat;
		// echo $libStat;
		global $db;
		try {
			$db->beginTransaction();
			$query = "UPDATE `statut` SET `libStat`=:libStat WHERE `idStat`=:idStat";
			$request = $db->prepare($query);
			$request->execute([':libStat' => $libStat, ':idStat' => $idStat]);
			$db->commit();
			$request->closeCursor();
		} catch (PDOException $e) {
			die('Erreur update STATUT : ' . $e->getMessage());
			$db->rollBack();
			$request->closeCursor();
		}
	}

	// function delete($idStat)
	// {

	// 	try {
	// 		$db->beginTransaction();

	// 		$db->commit();
	// 		$request->closeCursor();
	// 	} catch (PDOException $e) {
	// 		die('Erreur delete STATUT : ' . $e->getMessage());
	// 		$db->rollBack();
	// 		$request->closeCursor();
	// 	}
	// }
}	// End of class
