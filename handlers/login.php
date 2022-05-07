<?php

if (isset($_POST['email'])) {
    $code = rand(100000, 999999);
    $_SESSION['login_code'] = $code;
    $_SESSION['login_timestamp'] = time();
    $_SESSION['login_email'] = $_POST['email'];
    mail($_POST['email'], "Votre code de vérification", "Votre code de vérification est : $code");
    $message = "code de vérification envoyé";
    $bienvenue = true;
}

include "pages/auth/authCard.php";