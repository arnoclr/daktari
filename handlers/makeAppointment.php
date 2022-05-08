<?php

$req = $pdo->query('SELECT * FROM animaux WHERE id_proprietaire = ' . $user->id);
$myAnimals = $req->fetchAll();

if (isset($_POST['raison']) && isset($_POST['animal']) && isset($_POST['timestamp']) && Token::verify()) {
    $raison = htmlspecialchars($_POST['raison']);
    $animal = htmlspecialchars($_POST['animal']);
    $timestamp = htmlspecialchars($_POST['timestamp']);

    $ins = $pdo->prepare('INSERT INTO consultations (id_animal, raison, date) VALUES (?, ?, ?)');
    $ins->execute([$animal, $raison, $timestamp]);

    if ($ins->rowCount() > 0) {
        mail($user->email, "Votre demande de rendez-vous a bien été prise en compte", "Votre demande sera analysée et vous recevrez un email contenant la date définitive du rendez-vous.");
        echo 'Votre rendez-vous a été pris en compte.';
    } else {
        echo 'Une erreur est survenue.';
    }
}

include 'pages/appointments/make.php';