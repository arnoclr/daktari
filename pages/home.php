<?php

session_start();

// var_dump($_SESSION);
// echo "<br><br>";
include '../includes/components/Card.php';

$name = strtok($_SESSION['email'], '@');
$days = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
$months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

$card = new Card('Diarstop', 'Biocanina', 2, 'Médor', '../src/img/treatments/diarstop.png');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daktari</title>
    <link rel="stylesheet" href="../src/styles/pages/home.css">
    <link rel="stylesheet" href="../src/styles/app.css">
    <link rel="stylesheet" href="../src/styles/navbar.css">
</head>

<body>

    <?php include '../includes/navbar.php'; ?>

    <header>
        <p>Bonjour <?= $name ?>, voici vos prochains traitements.</p>
    </header>

    <section>
        <div class="date">
            <p><?= $days[date('w') - 1] . '. ' . date('d') . ' ' . $months[date('n') - 1] ?></p>
        </div>
        <div class="calendar-wrap">
            <div class="day1">


                <?php include '../includes/components/cardItem.php'; ?>
                <!-- <div class="card-wrap">
                    <div class="card-info">
                        <div class="product-info">
                            <p class="product">< ?= $card->getProduct() ?></p>
                            <p class="mini-info">< ?= $card->getBrand() ?></p>
                        </div>

                        <div class="dose-animal-wrap">
                            <div class="dose-info">
                                <img src="../src/img/icons/pill.png" alt="pill" height="24px" width="24px">
                                <p class="mini-info">< ?= $card->getDose() ?> pillules</p>
                            </div>
                            <div class="animal-info">
                                <img src="../src/img/icons/footprint.png" alt="footprint" height="24px" width="24px">
                                <p class="mini-info">< ?= $card->getAnimal() ?></p>
                            </div>
                        </div>

                    </div>
                    <div class="product-img">
                        <img src="< ?= $card->getImage() ?>" alt="< ?= $card->getProduct() ?>" height="100%">
                    </div>
                </div> -->

            </div>
            <div class="day2"></div>
            <div class="day3"></div>
        </div>
    </section>

</body>

</html>