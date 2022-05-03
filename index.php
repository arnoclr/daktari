<?php

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : 'calendar';

function loggedEmail() {
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

            include "./pages/auth/code.php";
        } else {
            include "./pages/auth/email.php";
        }
        break;
    case "verify_code":
        if (isset($_POST['code'])) {
            if ($_SESSION['login_timestamp'] + 60 * 5 > time()) {
                if ($_SESSION['login_code'] == $_POST['code']) {
                    $_SESSION['email'] = $_SESSION['login_email'];
                    $message = "code vérifié";
                } else {
                    $message = "code incorrect, veuillez recommencer";
                    unset($_SESSION['login_code']);
                    include "./pages/auth/email.php";
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

include './includes/footer.inc.php';