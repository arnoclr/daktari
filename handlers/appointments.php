<?php

if ($user->role < 2) {
    die('Vous n\'avez pas les droits pour accéder à cette page !');
}

$appointments = $pdo->query("SELECT * FROM consultations ORDER BY id DESC LIMIT 25")->fetchAll();

if (isset($_GET['edit'])) {

    if (isset($_POST['raison']) && isset($_POST['timestamp']) && Token::verify()) {
        $raison = htmlspecialchars($_POST['raison']);
        $timestamp = htmlspecialchars($_POST['timestamp']);
        $duree = intval($_POST['duree']);
        $tarif = intval($_POST['tarif']);
        $resume = htmlspecialchars($_POST['resume']);

        $up = $pdo->prepare("UPDATE consultations SET raison = ?, date = ?, duree_minutes = ?, tarif_centimes = ?, resume_manipulations = ? WHERE id = ?");
        $up->execute([$raison, $timestamp, $duree, $tarif, $resume, $_GET['edit']]);

        $get = $pdo->prepare("SELECT email FROM proprietaires WHERE id = (SELECT id_proprietaire FROM animaux WHERE id = (SELECT id_animal FROM consultations WHERE id = ?))");
        $get->execute([$_GET['edit']]);
        $clientEmail = $get->fetch()->email;

        if ($tarif == 0 && $duree == 0) {
            $formattedDate = str_replace("T", " à ", $timestamp);
            mail($clientEmail, 'Rendez-vous confirmé', "Votre rendez-vous pour \"$raison\" a été confirmé pour le $formattedDate.\n");
        }

        echo '<p>Rendez-vous mis à jour !</p>';
    }

    $get = $pdo->prepare("SELECT * FROM consultations WHERE id = ?");
    $get->execute([$_GET['edit']]);
    $appointment = $get->fetch();

    $traitements = $pdo->query("SELECT * FROM traitements WHERE id_consultation = $appointment->id")->fetchAll();

    $animal = $pdo->query("SELECT * FROM animaux WHERE id = $appointment->id_animal")->fetch();

    if (!$appointment) {
        die('Ce rendez-vous n\'existe pas !');
    }

    include 'pages/appointments/edit.php';
} else {
    include 'pages/appointments/list.php';
}