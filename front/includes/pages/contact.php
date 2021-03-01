<?php
require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->

<?
    $e = '';
    $success = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nomMemb = $_POST['nomMemb'];
        $eMailMemb = $_POST['eMailMemb'];
        $story = $_POST['story'];
        if(!empty($nomMemb) && !empty($eMailMemb) && !empty($story)){
            /* $mailHeaders = 'From: noreply@buenoziron.local' . "\r\n" .
            'Reply-To: noreply@buenoziron.local' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $message = $nomMemb.' ('.$eMailMemb.' )'.'à envoyé le message suivant depuis le formulaire de contact de Buenorizon :\n\n'.$story;
            $success = mail('maxime.lasserre@mmibordeaux.com', 'Message d\'un utilisateur de Buenorizon', $message, $mailHeaders); */
            $success = true;
        }else{
            $e = 'Veuillez remplir tous les champs.';
        }
    }else{
        if(isset($_SESSION['pseudoMemb'])){
            $nomMemb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb'])['nomMemb'];
            $eMailMemb = $monMembre->get_1MembreByPseudo($_SESSION['pseudoMemb'])['eMailMemb'];
        }else{
            $nomMemb = '';
            $eMailMemb = '';
        }
    }
?>


<div class="contactblock">

    <div class="container-contact">
        <div>
            <h1>Nous Contacter</h1>
        </div>
        <div class="block">
            <div class="content">

                <?php if($success){ ?>
                    <p style="color: green;">Votre message à bien été envoyé.</p>
                <?php } else { ?>
                    <p style="color: red;"><?= $e ?></p>
                <?php } ?>

                <form class="form-connexion" method="post">
                    <div class="infoutilisateur">
                        <div class="form-group">
                            <input type="input" id="nomMemb" name="nomMemb" value="<?= $nomMemb ?>" placeholder=" ">
                            <label>Nom<label>
                        </div>
                        <div class="form-group mail">
                            <input type="input" id="eMailMemb" name="eMailMemb" value="<?= $eMailMemb ?>" placeholder=" ">
                            <label>Adresse mail<label>
                        </div>
                    </div>
                    <div class="infomessage">
                        <div class="form-group">
                            <textarea id="story" name="story" rows="5" cols="33" placeholder="Votre message"></textarea>
                            
                                
                        </div>
                    </div>

                    <button class="btnenvoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
require_once('../commons/footer.php');
?>