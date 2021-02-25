<? 
    require_once __DIR__ . '/../checkAdmin.php';
?>

<?php
/////////////////////////////////////////////////////
//
//  CRUD ARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : article.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

global $db;

require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
$monArticle = new ARTICLE;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body class="ui container">
<h1>BLOGART21 Admin - Gestion du CRUD Article</h1>

    <hr /><br />
    <h2>Nouvel Article :&nbsp;<a href="./createArticle.php"><i>Créer un article</i></a></h2>
    <br />
    <hr />
    <h2>Tous les articles</h2>

    <div style="max-width: 100%; overflow-x: auto;">

    <table class="ui celled table">
        <thead>
            <tr>
                <th>&nbsp;Numéro&nbsp;</th>
                <th>&nbsp;Date&nbsp;</th>
                <th>&nbsp;Titre&nbsp;</th>
                <th>&nbsp;Chapeau&nbsp;</th>
                <th>&nbsp;Accroche&nbsp;</th>
                <th>&nbsp;Paragraphe 1&nbsp;</th>
                <th>&nbsp;Sous-Titre 1&nbsp;</th>
                <th>&nbsp;Paragraphe 2&nbsp;</th>
                <th>&nbsp;Sous-Titre 2&nbsp;</th>
                <th>&nbsp;Paragraphe 3&nbsp;</th>
                <th>&nbsp;Conclusion&nbsp;</th>
                <th>&nbsp;URL Photo&nbsp;</th>
                <th>&nbsp;Angle&nbsp;</th>
                <th>&nbsp;Thématique&nbsp;</th>
                <th colspan="2">&nbsp;Action&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $allArticles = $monArticle->get_AllArticlesWithAngleAndThematique();
            foreach ($allArticles as $row) {

                // Appel méthode : tous les statuts en BDD

                // Boucle pour afficher
                //foreach($all as $row) {
            ?>
                <tr>
                    <td>
                        <h4>&nbsp; <?php echo $row['numArt']; ?> &nbsp;</h4>
                    </td>

                    <td>&nbsp; <?php echo $row['dtCreArt']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libTitrArt']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libChapoArt']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libAccrochArt']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['parag1Art']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libSsTitr1Art']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['parag2Art']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libSsTitr2Art']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['parag3Art']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libConclArt']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['urlPhotArt']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libAngl']; ?> &nbsp;</td>

                    <td>&nbsp; <?php echo $row['libThem']; ?> &nbsp;</td>

                    <td>&nbsp;<a href="./updateArticle.php?id=<?= $row['numArt'] ?>"><i>Modifier</i></a>&nbsp;
                        <br />
                    </td>
                    <td>&nbsp;<a href="./deleteArticle.php?id=<?= $row['numArt'] ?>"><i>Supprimer</i></a>&nbsp;
                        <br />
                    </td>
                </tr>
            <?php
            }
            //}	// End of foreach
            ?>
        </tbody>
    </table>

    </div>

    <br><br>

<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
