<?php
require_once('../commons/header.php');

if (isset($_SESSION['pseudoMemb'])) {
    header("Location: ../../includes/pages/home.php");
}

require_once __DIR__ . '/../../../back/keys/reCaptchaKeys.php';

$created = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pseudoMemb = $_POST['pseudoMemb'];
    $prenomMemb = $_POST['prenomMemb'];
    $nomMemb = $_POST['nomMemb'];
    $eMailMemb = $_POST['eMailMemb'];
    $passMemb = $_POST['passMemb'];
    $passMembVerif = $_POST['passMembVerif'];
    $souvMemb = $_POST['souvMemb'];
    $condMemb = $_POST['condMemb'];
    $dtCreaMemb = date('Y-m-d H:i:s');
    $idStat = 1;

    $response = $_POST['g-recaptcha-response'];
    $secret = $reCaptchaPrivateKey;
    $urlApi = 'https://www.google.com/recaptcha/api/siteverify';

    $data = array('secret' => $secret, 'response' => $response);

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($urlApi, false, $context);

    if ($result === FALSE) {
        // Erreur
        $e = "<p style=\"color: red;\">Il semblerait qu'il y ait une erreur. Veuillez réessayer plus tard.</p>";
    }

    $json = json_decode($result);

    if ($json->success) {
        if (!empty($pseudoMemb) && !empty($eMailMemb) && !empty($passMemb) && !empty($passMembVerif)) {
            if (!empty($condMemb)) {
                if ($passMemb === $passMembVerif) {
                    if (!empty($souvMemb)) {
                        setcookie('pseudoMemb', $pseudoMemb, time() + 60 * 60 * 24 * 30, "/");
                    }
                    $created = true;
                    $success = 'Compte créé avec succès.';
                    $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $idStat, $souvMemb, $condMemb);
                } else {
                    $e = 'Les deux mots de passe ne correspondent pas.';
                }
            } else {
                $e = 'Vous n\'avez pas accepté les conditions générales d\'utilisation.';
            }
        } else {
            $e = 'Vous n\'avez pas renseigné tous les champs obligatoires.';
        }
    } else {
        $e = "<p style=\"color: red;\">Vous n'avez pas validé le Captcha.</p>";
    }
}
?>

<!-- Put your code here my friend ;) -->

<div class="signinblock">
    <div class="container-haut">


        <div class="container-signin">

            <h1>Enregistrez vous</h1>
            <p class="soustitre">Les champs marqués d’un <b class=red>*</b> sont obligatoires.</p>

            <div class="signin">
                <div class="infosignin">

                    <p style="color: red;">
                        <? if(isset($e)){echo $e;} ?>
                    </p>
                    <p style="color: green;">
                        <? if($created){echo $success;} ?>
                    </p>

                    <div class="content1">
                        <form class="form-inscription" method="post">

                            <div class="form-group">
                                <input type="input" name="pseudoMemb" id="pseudoMemb" placeholder=" ">
                                <label>Pseudo<b class=red>*</b><label>
                            </div>

                            <div class="form-group">
                                <input type="input" name="prenomMemb" id="prenomMemb" placeholder=" ">
                                <label>Prénom<label>
                            </div>

                            <div class="form-group">
                                <input type="input" name="nomMemb" id="nomMemb" placeholder=" ">
                                <label>Nom<label>
                            </div>

                            <div class="form-group">
                                <input type="input" name="eMailMemb" id="eMailMemb" placeholder=" ">
                                <label>Adresse mail <b class=red>*</b><label>
                            </div>




                            <div class="form-group">
                                <input name="passMemb" id="passMemb" type="password" placeholder=" ">
                                <svg id="eye" class="eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <label>Mot de passe <b class=red>*</b><label>
                            </div>

                            <div class="form-group">
                                <input name="passMembVerif" id="passMembVerif" type="password" placeholder=" ">
                                <svg id="eye" class="eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <label>Confirmer le mot de passe <b class=red>*</b><label>
                            </div>

                            <script>
                                $(document).ready(function(){
                                    $('#pseudoMemb').on("keyup paste", function(){
                                        if($(this).val() == ''){
                                            $('#pseudoPaste').text('Pseudo');
                                        }else{
                                            $('#pseudoPaste').text($(this).val());
                                        }
                                    });
                                    $('#prenomMemb, #nomMemb').on("keyup paste", function(){
                                        var prenom = $('#prenomMemb').val();
                                        var nom = $('#nomMemb').val();
                                        if(prenom + nom == ''){
                                            $('#nomPaste').text('Prénom et Nom');
                                        }else{
                                            $('#nomPaste').text(prenom + ' ' + nom);
                                        }
                                    });
                                    $('#eMailMemb').on("keyup paste", function(){
                                        if($(this).val() == ''){
                                            $('#eMailPaste').text('Adresse E-mail');
                                        }else{
                                            $('#eMailPaste').text($(this).val());
                                        }
                                    });
                                });
                            </script>


                            <div class="souvenir">
                                <svg name="souvMembSvg" id="souvMembSvg" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.40039 8.11131L9.10033 10.778L19.0001 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.1997 9.00071V15.2231C17.1997 15.6946 17.01 16.1468 16.6725 16.4802C16.3349 16.8136 15.8771 17.0009 15.3997 17.0009H2.79996C2.32258 17.0009 1.86476 16.8136 1.5272 16.4802C1.18964 16.1468 1 15.6946 1 15.2231V2.77832C1 2.30681 1.18964 1.85461 1.5272 1.5212C1.86476 1.18779 2.32258 1.00049 2.79996 1.00049H12.6998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input type="hidden" name="souvMemb" id="souvMemb" value="0" />
                                <span>Se souvenir de moi</span>
                            </div>

                            <div class="cdu">
                                <svg name="condMembSvg" id="condMembSvg" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.40039 8.11131L9.10033 10.778L19.0001 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.1997 9.00071V15.2231C17.1997 15.6946 17.01 16.1468 16.6725 16.4802C16.3349 16.8136 15.8771 17.0009 15.3997 17.0009H2.79996C2.32258 17.0009 1.86476 16.8136 1.5272 16.4802C1.18964 16.1468 1 15.6946 1 15.2231V2.77832C1 2.30681 1.18964 1.85461 1.5272 1.5212C1.86476 1.18779 2.32258 1.00049 2.79996 1.00049H12.6998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input type="hidden" name="condMemb" id="condMemb" value="1" />
                                <span>Accepter les <a href="../pages/about.php" style="color:#FFFFFF;">Conditions générales d’utilisation</a></span>
                            </div>
                            <div class="g-recaptcha" data-sitekey="<?= $reCaptchaPublicKey ?>"></div>

                            <button type="submit">S'enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>











        <div class="visualprofil">
            <div class="profil">
                <div class="content2">
                    <form>
                        <svg width="128" height="128" viewBox="0 0 128 128" fill="white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M64 0C28.672 0 0 28.672 0 64C0 99.328 28.672 128 64 128C99.328 128 128 99.328 128 64C128 28.672 99.328 0 64 0ZM64 19.2C74.624 19.2 83.2 27.776 83.2 38.4C83.2 49.024 74.624 57.6 64 57.6C53.376 57.6 44.8 49.024 44.8 38.4C44.8 27.776 53.376 19.2 64 19.2ZM64 110.08C48 110.08 33.856 101.888 25.6 89.472C25.792 76.736 51.2 69.76 64 69.76C76.736 69.76 102.208 76.736 102.4 89.472C94.144 101.888 80 110.08 64 110.08Z" fill="white" />
                        </svg>

                        <!-- Ceci est provisoire est devra changer en fonction de se que l utilisateur rentre -->
                        <p id="pseudoPaste">Pseudo</p>
                        <hr>
                        <p id="nomPaste">Prénom et Nom</p>
                        <p id="eMailPaste">Adresse E-mail</p>

                    </form>
                </div>
            </div>
        </div>
    </div>








    <div class="info">
        <div class="cguinfo ">
            <div class="content3">
                <form>

                    <p class=textjamaislu>
                        Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé par Buenorizon (contact 1 : samuel.labagnere@mmibordeaux.com; contact 2 maxime.lasserre@mmibordeaux.com) pour la gestion des comptes.
                        <br>
                        <br>
                        Les données collectées seront communiquées aux seuls destinataires suivants : Le service de gestions de donnée (contact ci-dessus) ainsi que les professeurs et intervenants dans le cadre du projet « Blog art ».
                        <br>
                        <br>
                        Les données sont conservées pendant toute la durée du projet (un a deux mois).
                        <br>
                        <br>
                        Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données. (En fonction de la base légale du traitement, mentionner également : Vous pouvez retirer à tout moment votre consentement au traitement de vos données ; Vous pouvez également vous opposer au traitement de vos données ; Vous pouvez également exercer votre droit à la portabilité de vos données)
                        <br>
                        <br>
                        Consultez le site cnil.fr pour plus d’informations sur vos droits.
                        <br>
                        <br>
                        Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif, vous pouvez contacter (le cas échéant, nos délégués à la protection des données ou le service chargé de l’exercice de ces droits) : Maxime Lasserre (maxime.lasserre@mmibordeaux.com ) ou Samuel Labagnere (samuel.labagnere@mmibordeaux.com).
                        <br>
                        <br>
                        Si vous estimez, après nous avoir contactés, que vos droits « Informatique et Libertés » ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL.
                    <p>

                </form>
            </div>
        </div>
    </div>

</div>



<script>
    const eye = document.getElementById('eye')
    const input = document.getElementById('input-signin')
    eye.addEventListener('click', () => {
        input.type = input.type === 'password' ? 'text' : 'password'
    })
</script>


<?php
require_once('../commons/footer.php');
?>