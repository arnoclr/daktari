<?php
$GET_id = $_GET['id'];
$req = $pdo->query("SELECT * FROM animaux WHERE id = $GET_id");
$animals = $req->fetchAll();

include 'pages/animals/info.php';