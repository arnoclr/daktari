<?php

session_start();

// utils
require_once 'includes/classes/csrf.php';
Token::init();

require_once 'includes/functions/images.php';

$dbname = "arno.cellarier_db";
$user = "arno.cellarier";
$pass = "789789";
$host = "sqletud.u-pem.fr";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET search_path TO daktari');
}
catch (PDOException $e) {
    echo "ERREUR : La connexion a échouée";
}

$action = isset($_GET['action']) ? $_GET['action'] : 'viewCalendar';

// logged user
$user = null;
if (isset($_SESSION['email'])) {
    $user = $pdo->query("SELECT * FROM proprietaires WHERE email = '" . $_SESSION['email'] . "'")->fetch();
    if (!$user && $action != 'completeProfile') {
        header('Location: ?action=completeProfile');
        exit;
    }
} else if (!in_array($action, ['login', 'completeProfile', 'verifyCode'])) {
    $currentUrl = base64_encode($_SERVER['REQUEST_URI']);
    header("Location: ?action=login&redirectTo=$currentUrl");
    exit;
}

$noNavbar = ['login', 'verify_code'];

include "includes/header.inc.php";

if (!in_array($action, $noNavbar)) {
    include "includes/navbar.php";
}

include "handlers/$action.php";

include "includes/footer.inc.php";
