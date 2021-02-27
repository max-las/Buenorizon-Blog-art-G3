<?php
require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->

<?
    $e = '';
    $envoi = false;
    $success = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nomMemb = $_POST['nomMemb'];
        $eMailMemb = $_POST['eMailMemb'];
        if(!empty($nomMemb) && !empty($eMailMemb)){
            $envoi = true;
            $success = 'Message envoyé.';
        }else{
            $e = 'Veuillez remplir les deux champs.';
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
                            <textarea id="story" name="story" rows="5" cols="33"placeholder="Votre message"></textarea>
                            
                                
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