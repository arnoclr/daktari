<?php

$id = intval($_GET['id']);

if ($id == 0) {
    die("Animal non trouvé");
}

if (isset($_FILES['image'])) {
    $image = uploadImageAndRetrieveUrl($_FILES["image"]);

    $ins = $pdo->query("UPDATE animaux SET image = '$image' WHERE id = $id AND WHERE id_proprietaire = $user->id");

    if ($ins->rowCount() > 0) {
        header('Location: ?action=myAnimalInfo&id=' . $id);
    } else {
        echo "Erreur lors de l'ajout de l'image !";
    }
}

include 'pages/animals/photo.php';