<?php
require_once __DIR__ . '/../../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;
require_once __DIR__ . '/../../../CLASS_CRUD/user.class.php';
$monUser = new USER;

$success = false;
$e = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pseudo = $_POST['name-login'];
    $mdp = $_POST['input-login'];

    if (isset($pseudo) && isset($mdp)) {
        $myMembreByPseudo = $monMembre->get_1MembreByPseudo($pseudo);
        $myMembreByMail = $monMembre->get_1MembreByMail($pseudo);
        if ($myMembreByPseudo) {
            if (password_verify($mdp, $myMembreByPseudo['passMemb'])) {
                if(!empty($souvMemb)){
                    setcookie('pseudoMemb', $pseudoMemb, time()+60*60*24*30, "/");
                }
                $memb = $monMembre->get_1Membre($myMembreByPseudo['numMemb']);
                $success = true;
                session_start();
                $_SESSION['pseudoMemb'] = $memb['pseudoMemb'];
            } else {
                $e = 'Votre mot de passe n\'est pas valide.';
            }
        } elseif ($myMembreByMail) {
            if (password_verify($mdp, $myMembreByMail['passMemb'])) {
                if(!empty($souvMemb)){
                    setcookie('pseudoMemb', $pseudoMemb, time()+60*60*24*30, "/");
                }
                $memb = $monMembre->get_1Membre($myMembreByMail['numMemb']);
                $success = true;
                session_start();
                $_SESSION['pseudoMemb'] = $memb['pseudoMemb'];
            } else {
                $e = 'Votre mot de passe n\'est pas valide.';
            }
        } else {
            $e = 'Votre identifiant n\'est pas valide.';
        }
    }
}

require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->


<div class="container-login">
    <h1>Connexion</h1>
    <div class="login">
        <div class="background">
            <svg width="100%" height="100%" viewBox="0 0 423 415" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g filter="url(#filter0_b)">
                    <rect width="100%" height="100%" fill="url(#paint0_linear)" />
                </g>
                <g style="mix-blend-mode:overlay" opacity="0.15">
                    <path d="M285.301 294.158C312.089 226.123 376.53 193.774 422.998 185.92V510.634H47.1504C115.373 466.823 258.514 362.193 285.301 294.158Z" fill="white" />
                </g>
                <g style="mix-blend-mode:overlay" opacity="0.05">
                    <rect width="100%" height="100%" fill="url(#pattern0)" />
                </g>
                <defs>
                    <filter id="filter0_b" x="-100" y="-100" width="623" height="711" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feGaussianBlur in="BackgroundImage" stdDeviation="50" />
                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape" />
                    </filter>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1.44444" height="1.39335">
                        <use xlink:href="#image0" transform="scale(0.00236407 0.00195695)" />

                    </pattern>
                    <linearGradient id="paint0_linear" x1="0" y1="0" x2="391.732" y2="452.518" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#12475E" stop-opacity="0.15" />
                        <stop offset="1" stop-color="#12475E" stop-opacity="0.05" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="content">
            <form class="form-connexion" method="post">
                <svg width="128" height="128" viewBox="0 0 128 128" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 0C28.672 0 0 28.672 0 64C0 99.328 28.672 128 64 128C99.328 128 128 99.328 128 64C128 28.672 99.328 0 64 0ZM64 19.2C74.624 19.2 83.2 27.776 83.2 38.4C83.2 49.024 74.624 57.6 64 57.6C53.376 57.6 44.8 49.024 44.8 38.4C44.8 27.776 53.376 19.2 64 19.2ZM64 110.08C48 110.08 33.856 101.888 25.6 89.472C25.792 76.736 51.2 69.76 64 69.76C76.736 69.76 102.208 76.736 102.4 89.472C94.144 101.888 80 110.08 64 110.08Z" fill="white" />
                </svg>
                <div class="form-group">
                    <input type="input" id="name-login" name="name-login" placeholder=" " value="<?= isset($_COOKIE['pseudoMemb']) ? $_COOKIE['pseudoMemb'] : "" ?>">
                    <label>Pseudo ou mail<label>
                </div>
                <div class="form-group">
                    <input id="input-login" name="input-login" type="password" placeholder="...">
                    <div id="eye" class="eye"></div>
                    <label>Mot de passe<label>
                </div>
                <div class="souvenir">
                    <div id="checkbox"></div>
                    <span>Se souvenir de moi</span>
                </div>
                <? if($success){
                        echo '<br />';
                        echo('<span style="color: green;">Connexion réussie.</span>');
                    }elseif($e){
                        echo '<br />';
                        echo ('<span style="color: red;">'.$e.'</span>');
                    } ?>
                <button>Connexion</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once('../commons/footer.php');
?>