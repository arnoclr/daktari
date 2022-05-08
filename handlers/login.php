<?php

if ($user != null) {
    header('Location: ?action=viewCalendar');
    exit;
}

if (isset($_POST['email'])) {
    $code = rand(100000, 999999);
    $_SESSION['login_code'] = $code;
    $_SESSION['login_timestamp'] = time();
    $_SESSION['login_email'] = $_POST['email'];
    $mailSent = mail($_POST['email'], "Votre code de vérification", "Votre code de vérification est : $code");

    if ($mailSent) {
        $message = "code de vérification envoyé";
        $bienvenue = true;
    } else {
        $message = "erreur lors de l'envoi du code de vérification. Essayez avec l'adresse mail de l'université.";
    }
}

if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']);
}

include "pages/auth/authCard.php";