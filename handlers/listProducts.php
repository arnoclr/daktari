<?php

if ($user->role < 1) {
    die('Vous n\'avez pas les droits pour accéder à cette page !');
}

$products = $pdo->query("SELECT * FROM produits")->fetchAll();

include 'pages/products/list.php';