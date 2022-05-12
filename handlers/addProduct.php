<?php

if ($user->role < 1) {
    die('Vous n\'avez pas les droits pour accéder à cette page !');
}

if (isset($_FILES["image"]) && isset($_POST['nom']) && isset($_POST['marque']) && Token::verify()) {
    $image = uploadImageAndRetrieveUrl($_FILES["image"]);

    $query = $pdo->prepare("INSERT INTO produits (nom, marque, image) VALUES (:nom, :marque, :image)");
    $query->bindParam(':nom', $_POST['nom']);
    $query->bindParam(':marque', $_POST['marque']);
    $query->bindParam(':image', $image);
    $query->execute();

    header('Location: ?action=listProducts');
}

include 'pages/products/form.php';