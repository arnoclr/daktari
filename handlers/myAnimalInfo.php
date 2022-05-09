<?php
$id = intval($_GET['id']);
$req = $pdo->query("SELECT * FROM animaux WHERE id = $id AND id_proprietaire = $user->id");
$animal = $req->fetch();

if (!$animal) {
    die("Animal non trouvé");
}

include 'pages/animals/info.php';