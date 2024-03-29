<?php

$id = intval($_GET['id'] ?? 0);

if ($id === 0) {
    header("Location: ?action=myAnimals");
    exit;
}

if (isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $taille_cm = intval($_POST['taille_cm']);
    $castre = isset($_POST['castre']) ? 1 : 0;
    $poids = intval($_POST['poids']);
    $decede = isset($_POST['decede']) ? 1 : 0;

    $ins = $pdo->prepare("UPDATE animaux SET nom = ?, taille_cm = ?, castre = ?, poids = ?, decede = ? WHERE id = ? AND id_proprietaire = ?");
    $ins->execute([$nom, $taille_cm, $castre, $poids, $decede, $id, $user->id]);

    if ($ins->rowCount() > 0) {
        header("Location: ?action=myAnimalInfo&id=$id");
        exit;
    }

    echo "<p>Erreur lors de la modification de l'animal</p>";
}

$get = $pdo->prepare("SELECT * FROM animaux WHERE id = ? AND id_proprietaire = ?");
$get->execute([$id, $user->id]);

$animal = $get->fetch();

include "pages/animals/edit.php";