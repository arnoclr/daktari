<?php

$id = intval($_GET['id']);
$redirectTo = $_GET['redirectTo'];

if (Token::verify()) {
    $del = $pdo->prepare("DELETE FROM traitements WHERE id = ?");
    $del->execute([$id]);

    header("Location: ?action=appointments&edit=$redirectTo");
    exit;
}