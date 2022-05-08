<?php

if (isset($_POST['email']) && Token::verify()) {
    $userEmail = $_POST['email'];
    $newRole = intval($_POST['role']);

    $req = $pdo->prepare("SELECT * FROM proprietaires WHERE email = ?");
    $req->execute([$userEmail]);

    $userRole = $req->fetch()->role;
    
    $myRole = $user->role;

    if ($myRole >= $userRole && $newRole <= $myRole && $newRole >= 0 && $newRole <= 3) {
        $req = $pdo->prepare("UPDATE proprietaires SET role = ? WHERE email = ?");
        $req->execute([$newRole, $userEmail]);
        echo "Rôle modifié avec succès !";
    } else {
        echo "Vous n'avez pas les droits pour modifier ce rôle !";
    }
}

include "pages/staff/editRole.php";