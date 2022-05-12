<?php

$traitements = $pdo->query("SELECT * FROM traitements WHERE id_consultation IN (SELECT id FROM consultations WHERE id_animal IN (SELECT id FROM animaux WHERE id_proprietaire = $user->id))")->fetchAll();

$traitementsPerDays = [
    [], [], []
];

foreach ($traitements as $traitement) {
    $startDate = $pdo->query("SELECT date FROM consultations WHERE id = $traitement->id_consultation")->fetch()->date;
    $ago = time() - strtotime($startDate);
    $daysAgo = floor($ago / (60 * 60 * 24));
    $remaining = $traitement->duree_jours + $daysAgo;
    $product = $pdo->query("SELECT * FROM produits WHERE id = $traitement->id_produit")->fetch();
    $animal = $pdo->query("SELECT * FROM animaux WHERE id = (SELECT id_animal FROM consultations WHERE id = $traitement->id_consultation)")->fetch();
    
    for ($i = 0; $i < min(3, $remaining); $i++) {
        $traitementsPerDays[$i][] = (object) [
            "traitement" => $traitement,
            "product" => $product,
            "animal" => $animal
        ];
    }
}

$days = array('', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
$months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

include "pages/home.php";