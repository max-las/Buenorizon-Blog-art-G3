<?php
/////////////////////////////////////////////////////
//
//  CRUD USER (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : user.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

global $db;

require_once __DIR__ . '/../../CLASS_CRUD/user.class.php';
$monUser = new USER;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body class="ui container">
    <h1>BLOGART21 Admin - Gestion du CRUD User</h1>

    <hr /><br />
    <h2>Nouvel utilisateur :&nbsp;<a href="./createUser.php"><i>Créer un utilisateur</i></a></h2>
    <br />
    <hr />
    <h2>Tous les utilisateurs</h2>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>&nbsp;Pseudo&nbsp;</th>
                <th>&nbsp;Mot de passe&nbsp;</th>
                <th>&nbsp;Nom&nbsp;</th>
                <th>&nbsp;Prénom&nbsp;</th>
                <th>&nbsp;eMail&nbsp;</th>
                <th>&nbsp;Statut&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allUsers = $monUser->get_AllUsersWithStatut();
            foreach ($allUsers as $row) {

                // Appel méthode : tous les statuts en BDD

                // Boucle pour afficher
                //foreach($all as $row) {
            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?php echo $row['pseudoUser']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?php echo $row['passUser']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['nomUser']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['prenomUser']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['eMailUser']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libStat']; ?> &nbsp;</td>

                    <td>&nbsp;<a href="./updateUser.php?id=<?= $row['pseudoUser'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteUser.php?id=<?= $row['pseudoUser'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                </tr>
            <?php
            }
            //}	// End of foreach
            ?>
        </tbody>
    </table>
    <br><br>

<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
