<?php

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : 'viewCalendar';

function loggedEmail()
{
    return isset($_SESSION['email']) ? $_SESSION['email'] : null;
}

$noNavbar = ['login', 'verify_code'];

include "includes/header.inc.php";

if (!in_array($action, $noNavbar)) {
    include "includes/navbar.php";
}

include "handlers/$action.php";

include "includes/footer.inc.php";
