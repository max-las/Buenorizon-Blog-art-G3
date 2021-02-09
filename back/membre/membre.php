<?php
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
$class = new MEMBRE;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="ui container">
        <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
        <hr>
        <h2><a href="./createMembre.php">Nouveau membre</a></h2>
        <hr>
        <h2>Tous les membres</h2>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Pseudo</th>
                    <th>Mot de passe</th>
                    <th>Email</th>
                    <th>Date de création</th>
                    <th>Souvenir ?</th>
                    <th>Accord ?</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $allMembres = $class->get_AllMembres();
                foreach ($allMembres as $row) { ?>
                    <tr>
                        <td><?= $row['numMemb'] ?></td>
                        <td><?= $row['prenomMemb'] ?></td>
                        <td><?= $row['nomMemb'] ?></td>
                        <td><?= $row['pseudoMemb'] ?></td>
                        <td><?= $row['passMemb'] ?></td>
                        <td><?= $row['eMailMemb'] ?></td>
                        <td><?= $row['dtCreaMemb'] ?></td>
                        <td><?= ($row['souvenirMemb']) ? 'oui' :  'non' ?></td>
                        <td><?= ($row['accordMemb']) ? 'oui' :  'non' ?></td>
                        <td>&nbsp;<a href="./updateMembre.php?id=<?= $row['numMemb'] ?>&date=<?= $row['dtCreaMemb'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteMembre.php?id=<?= $row['numMemb'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
        require_once __DIR__ . '/footerMembre.php';
        require_once __DIR__ . '/footer.php';
        ?>
    </div>
</body>

</html>