<?php

if ($user->role < 2) {
    die('Vous n\'avez pas les droits pour accéder à cette page !');
}

$id = intval($_GET['id']);
$redirectTo = $_GET['redirectTo'];

if (Token::verify()) {
    $del = $pdo->prepare("DELETE FROM traitements WHERE id = ?");
    $del->execute([$id]);

    header("Location: ?action=appointments&edit=$redirectTo");
    exit;
}