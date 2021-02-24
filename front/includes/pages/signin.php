<?php
require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->


<div class="container-login">

    <h1>Enregistrez vous</h1>
    <p class=soustitre>Les champs marqués d’un <span class=red>*</span> sont obligatoires.</p>

    <div class="inscription">
        <div class="background1">
            <svg width="416" height="670" viewBox="0 0 416 670" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g filter="url(#filter0_b)">
                    <rect width="416" height="670" fill="url(#paint0_linear)" />
                </g>
                <g style="mix-blend-mode:overlay" opacity="0.15">
                    <path d="M187.991 291.593C132.191 184.413 34.3444 100.812 0.00095502 79.4048L0 669.998H162.684C229.737 593.451 251.256 413.113 187.991 291.593Z" fill="white" />
                </g>
                <g style="mix-blend-mode:overlay" opacity="0.05">
                    <rect width="415.09" height="670" fill="url(#pattern0)" />
                </g>
                <defs>
                    <filter id="filter0_b" x="-100" y="-100" width="616" height="870" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feGaussianBlur in="BackgroundImage" stdDeviation="50" />
                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape" />
                    </filter>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1.47197" height="1.06269">
                        <use xlink:href="#image0" transform="scale(0.00240912 0.00149254)" />
                    </pattern>
                    <linearGradient id="paint0_linear" x1="0" y1="0" x2="513.688" y2="445.087" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#12475E" stop-opacity="0.15" />
                        <stop offset="1" stop-color="#12475E" stop-opacity="0.05" />
                    </linearGradient>
                </defs>
            </svg>

        </div>
        <div class="content1">
            <form class="form-connexion" action="" method="post">
                <!-- <svg width="128" height="128" viewBox="0 0 128 128" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 0C28.672 0 0 28.672 0 64C0 99.328 28.672 128 64 128C99.328 128 128 99.328 128 64C128 28.672 99.328 0 64 0ZM64 19.2C74.624 19.2 83.2 27.776 83.2 38.4C83.2 49.024 74.624 57.6 64 57.6C53.376 57.6 44.8 49.024 44.8 38.4C44.8 27.776 53.376 19.2 64 19.2ZM64 110.08C48 110.08 33.856 101.888 25.6 89.472C25.792 76.736 51.2 69.76 64 69.76C76.736 69.76 102.208 76.736 102.4 89.472C94.144 101.888 80 110.08 64 110.08Z" fill="white" />
                </svg> -->


                <div class="form-group">
                    <input type="input" placeholder="Rechercher un article...">
                    <label>Pseudo<label>
                </div>

                <div class="form-group">
                    <input type="input" placeholder="Rechercher un article...">
                    <label>Prénom<label>
                </div>

                <div class="form-group">
                    <input type="input" placeholder="Rechercher un article...">
                    <label>Nom<label>
                </div>

                <div class="form-group">
                    <input type="input" placeholder="Rechercher un article...">
                    <label>Adresse mail<label>
                </div>




                <div class="form-group">
                    <input id="input-login" type="password" placeholder="Rechercher un article...">
                    <svg id="eye" class="eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <label>Mot de passe<label>
                </div>

                <div class="form-group">
                    <input id="input-login" type="password" placeholder="Rechercher un article...">
                    <svg id="eye" class="eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <label>Confirmer le mot de passe<label>
                </div>


                <div class="souvenir">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.40039 8.11131L9.10033 10.778L19.0001 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17.1997 9.00071V15.2231C17.1997 15.6946 17.01 16.1468 16.6725 16.4802C16.3349 16.8136 15.8771 17.0009 15.3997 17.0009H2.79996C2.32258 17.0009 1.86476 16.8136 1.5272 16.4802C1.18964 16.1468 1 15.6946 1 15.2231V2.77832C1 2.30681 1.18964 1.85461 1.5272 1.5212C1.86476 1.18779 2.32258 1.00049 2.79996 1.00049H12.6998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Se souvenir de moi</span>
                </div>

                <div class="cdu">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.40039 8.11131L9.10033 10.778L19.0001 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17.1997 9.00071V15.2231C17.1997 15.6946 17.01 16.1468 16.6725 16.4802C16.3349 16.8136 15.8771 17.0009 15.3997 17.0009H2.79996C2.32258 17.0009 1.86476 16.8136 1.5272 16.4802C1.18964 16.1468 1 15.6946 1 15.2231V2.77832C1 2.30681 1.18964 1.85461 1.5272 1.5212C1.86476 1.18779 2.32258 1.00049 2.79996 1.00049H12.6998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Accepter les <a href="front\includes\pages\about.php" style="color:#FFFFFF; " Vers nos Conditions générales">Conditions générales d’utilisation</a></span>
                </div>

                <button>S'enregistrer</button>
            </form>
        </div>
    </div>
</div>

<script>
    const eye = document.getElementById('eye')
    const input = document.getElementById('input-login')
    eye.addEventListener('click', () => {
        input.type = input.type === 'password' ? 'text' : 'password'
    })
</script>



<div class="ligne ligne1"></div>
<div class="ligne ligne2"></div>
<div class="ligne ligne3"></div>
<div class="ligne ligne4"></div>
<div class="ligne ligne5"></div>
<div class="ligne ligne6"></div>

<p class=souvenir>Se souvenir de moi</p>
<p class=cgu>Accepter les <a href="front\includes\pages\about.php" style="color:#FFFFFF; " Vers nos Conditions générales">Conditions générales d’utilisation</a></p>


<div class="ligne ligne7"></div>


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

















    <?php
    require_once('../commons/footer.php');
    ?>