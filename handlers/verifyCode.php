<?php

if (isset($_POST['code']) && Token::verify()) {
    if ($_SESSION['login_timestamp'] + 60 * 5 > time()) {

        $inputs = !empty($_POST['code']) ? $_POST['code'] : array();
        $POST_Code = implode($inputs);
        
        if ($_SESSION['login_code'] == $POST_Code) {
            $_SESSION['email'] = $_SESSION['login_email'];
            $message = "code vérifié";
            header('Location: ' . base64_decode($_GET['redirectTo']));
            exit;
        } else {
            $message = "code incorrect, veuillez recommencer";
            unset($_SESSION['login_code']);
        }
    } else {
        $message = "Le code a expiré";
    }
} else {
    $message = "données manquantes";
}

header("Location: ?action=login&error=$message");