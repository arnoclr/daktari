<?php

// TODO: requetes base de données ici

include 'includes/components/Card.php';

$name = strtok($_SESSION['email'], '@');
$days = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
$months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

$card = new Card('Diarstop', 'Biocanina', 2, 'Médor', 'src/img/treatments/diarstop.png');

include "pages/home.php";