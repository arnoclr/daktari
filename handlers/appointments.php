<?php

if ($user->role < 2) {
    die('Vous n\'avez pas les droits pour accéder à cette page !');
}

$appointments = $pdo->query("SELECT * FROM consultations ORDER BY id DESC LIMIT 25")->fetchAll();

if (isset($_GET['edit'])) {

    if (isset($_POST['raison']) && isset($_POST['timestamp']) && Token::verify()) {
        $raison = htmlspecialchars($_POST['raison']);
        $timestamp = htmlspecialchars($_POST['timestamp']);
        $duree = htmlspecialchars($_POST['duree']);
        $tarif = htmlspecialchars($_POST['tarif']);
        $resume = htmlspecialchars($_POST['resume']);

        $up = $pdo->prepare("UPDATE consultations SET raison = ?, date = ?, duree_minutes = ?, tarif_centimes = ?, resume_manipulations = ? WHERE id = ?");
        $up->execute([$raison, $timestamp, $duree, $tarif, $resume, $_GET['edit']]);

        echo '<p>Rendez-vous mis à jour !</p>';
    }

    $get = $pdo->prepare("SELECT * FROM consultations WHERE id = ?");
    $get->execute([$_GET['edit']]);
    $appointment = $get->fetch();

    $traitements = $pdo->query("SELECT * FROM traitements WHERE id_consultation = $appointment->id")->fetchAll();

    if (!$appointment) {
        die('Ce rendez-vous n\'existe pas !');
    }

    include 'pages/appointments/edit.php';
} else {
    include 'pages/appointments/list.php';
}