<?php

if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_SESSION['email'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $tel = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_SESSION['email']);

    $userId = $pdo->query("SELECT id FROM proprietaires WHERE email = '$email'")->fetch()->id;

    if ($userId) {
        $pdo->exec("UPDATE proprietaires SET nom = '$nom', adresse = '$adresse', tel = '$tel' WHERE id = '$userId'");

        header('Location: ?action=viewCalendar&message=compte mis à jour');
        exit;
    } else {
        $ins = $pdo->prepare("INSERT INTO proprietaires (nom, adresse, tel, email) VALUES (:nom, :adresse, :tel, :email)");
        $ins->bindParam(':nom', $nom);
        $ins->bindParam(':adresse', $adresse);
        $ins->bindParam(':tel', $tel);
        $ins->bindParam(':email', $email);
        $ins->execute();

        if ($ins->rowCount() > 0) {
            header('Location: ?action=viewCalendar&message=votre compte a bien été créé');
            exit;
        } else {
            $message = "Erreur lors de la création de votre compte";
            include "pages/profile/completeForm.php";
        }
    }
} else {
    $currentData = $pdo->query("SELECT * FROM proprietaires WHERE email = '" . $_SESSION['email'] . "'")->fetch();

    if (!$currentData) {
        $currentData = (object) [
            'nom' => '',
            'adresse' => '',
            'tel' => ''
        ];
    }

    include "pages/profile/completeForm.php";
}