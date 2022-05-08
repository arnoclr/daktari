<?php

if (isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $espece = htmlspecialchars($_POST['espece']);
    $race = htmlspecialchars($_POST['race']);
    $tailleCm = htmlspecialchars($_POST['taille_cm']);
    $genre = htmlspecialchars($_POST['genre']);
    $castre = $_POST['castre'] ?? 0;
    $poids = htmlspecialchars($_POST['poids']);
    $image = uploadImageAndRetrieveUrl($_FILES["image"]);

    $ins = $pdo->prepare("INSERT INTO animaux (nom, espece, race, taille_cm, genre, castre, poids, image, id_proprietaire) VALUES (:nom, :espece, :race, :taille_cm, :genre, :castre, :poids, :image, :id_proprietaire)");
    $ins->bindParam(':nom', $nom);
    $ins->bindParam(':espece', $espece);
    $ins->bindParam(':race', $race);
    $ins->bindParam(':taille_cm', $tailleCm);
    $ins->bindParam(':genre', $genre);
    $ins->bindParam(':castre', $castre);
    $ins->bindParam(':poids', $poids);
    $ins->bindParam(':image', $image);
    $ins->bindParam(':id_proprietaire', $user->id);
    $ins->execute();
    
    if ($ins->rowCount() > 0) {
        echo 'Animal ajouté !';
    } else {
        echo "Erreur lors de l'ajout de l'animal !";
    }
}

include 'pages/animals/add.php';