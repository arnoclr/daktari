<link rel="stylesheet" href="src/styles/pages/home.css">

<header>
    <p>Bonjour <?= $name ?>, voici vos prochains traitements.</p>
</header>

<section>
    <div class="date">
        <p><?= $days[date('w') - 1] . '. ' . date('d') . ' ' . $months[date('n') - 1] ?></p>
    </div>
    <div class="calendar-wrap">
        <div class="day1">


            <?php include 'includes/components/cardItem.php'; ?>
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