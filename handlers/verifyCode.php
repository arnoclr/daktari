<?php

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