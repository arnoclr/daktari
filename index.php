<?php

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : 'calendar';

function loggedEmail()
{
    return isset($_SESSION['email']) ? $_SESSION['email'] : null;
}

include './includes/header.inc.php';

switch ($action) {
    case "login":
        if (isset($_POST['email'])) {
            $code = rand(100000, 999999);
            $_SESSION['login_code'] = $code;
            $_SESSION['login_timestamp'] = time();
            $_SESSION['login_email'] = $_POST['email'];
            mail($_POST['email'], "Votre code de vérification", "Votre code de vérification est : $code");
            $message = "code de vérification envoyé";
            $bienvenue = true;
            // include "./pages/auth/code.php";
        } else {
            // include "./pages/auth/email.php";
        }
        break;
    case "verify_code":
        if (isset($_POST['code'])) {
            if ($_SESSION['login_timestamp'] + 60 * 5 > time()) {

                $inputs = !empty($_POST['code']) ? $_POST['code'] : array();
                $POST_Code = implode($inputs);
                
                if ($_SESSION['login_code'] == $POST_Code) {
                    $_SESSION['email'] = $_SESSION['login_email'];
                    $message = "code vérifié";
                } else {
                    $message = "code incorrect, veuillez recommencer";
                    unset($_SESSION['login_code']);
                    // include "./pages/auth/email.php";
                    header('Location: index.php?action=login');
                }
            } else {
                $message = "Le code a expiré";
                include "./pages/auth/email.php";
            }
        }
        break;

    default:
        # code...
        break;
}

?>
<div class="container">
    <small>connecté en tant que : <?= loggedEmail() ?></small>

    <div class="circles-bg"></div>
    <div class="connect-wrap">
        <h1><?= isset($bienvenue) ? "Confirmation" : "Bienvenue sur Daktari" ?></h1>
        <p><?= isset($bienvenue) ? "Entrez le code à 6 chiffres reçu par mail. <br>  Vous n’avez pas reçu de mail ? Pensez à <br>  vérifier dans vos spams."
        : "C’est votre première visite ? Entrez <br> simplement votre adresse email et nous <br> vous enverrons un code de confirmation." ?></p>

        <?php if(isset($bienvenue)) {
            include "./pages/auth/code.php";
        } else {
            include "./pages/auth/email.php";
        } ?>
    </div>
</div>



<?php include './includes/footer.inc.php';
