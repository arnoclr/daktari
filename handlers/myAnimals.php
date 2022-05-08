<?php

$req = $pdo->query("SELECT * FROM animaux WHERE id_proprietaire = $user->id");
$animals = $req->fetchAll();

include 'pages/animals/list.php';