<?php
$id = intval($_GET['id']);
$req = $pdo->query("SELECT * FROM animaux WHERE id = $id");
$animal = $req->fetch();

if (!$animal) {
    die("Animal non trouvé");
}

if ($user->id != $animal->id_proprietaire && $user->role < 2) {
    die("Vous n'avez pas accès à cette page");
}

$req = $pdo->prepare("SELECT * FROM consultations WHERE id_animal = ? LIMIT 15");
$status = $req->execute([$id]);
$appointments = $req->fetchAll();

$req = $pdo->prepare("SELECT * FROM traitements WHERE id IN (SELECT id FROM consultations WHERE id_animal = ?)");
$status = $req->execute([$id]);
$traitements = $req->fetchAll();

include 'pages/animals/info.php';