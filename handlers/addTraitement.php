<?php

if ($user->role < 2) {
    die('Vous n\'avez pas les droits pour accéder à cette page !');
}

$products = $pdo->query("SELECT * FROM produits")->fetchAll();

$for = intval($_GET['for'] ?? 0);

if ($for == 0) {
    $consultations = $pdo->query("SELECT * FROM consultations ORDER BY id DESC LIMIT 25")->fetchAll();
}

if (isset($_POST['produit']) && Token::verify()) {
    $produit = intval($_POST['produit']);
    $frequence = intval($_POST['frequence_journaliere']);
    $dose = intval($_POST['dose_ml']);
    $duree = intval($_POST['duree_jours']);
    $dillution = intval($_POST['dillution_pourcentage']);
    $consultation = intval($_GET['for'] ?? $_POST['consultation']);

    $ins = $pdo->prepare("INSERT INTO traitements (id_consultation, id_produit, frequence_journaliere, dose_ml, duree_jours, dillution_pourcentage) VALUES (?, ?, ?, ?, ?, ?)");
    $ins->execute([$consultation, $produit, $frequence, $dose, $duree, $dillution]);

    if ($ins) {
        header("Location: ?action=appointments&edit=$consultation");
    }

    echo "<p>Erreur lors de l'ajout.</p>";
}

include 'pages/traitements/add.php';