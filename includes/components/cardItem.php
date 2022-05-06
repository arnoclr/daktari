
<div class="card-wrap">
    <div class="card-info">
        <div class="product-info">
            <p class="product"><?= $card->getProduct() ?></p>
            <p class="mini-info"><?= $card->getBrand() ?></p>
        </div>

        <div class="dose-animal-wrap">
            <div class="dose-info">
                <img src="../src/img/icons/pill.png" alt="pill" height="24px" width="24px">
                <p class="mini-info"><?= $card->getDose() ?> pillules</p>
            </div>
            <div class="animal-info">
                <img src="../src/img/icons/footprint.png" alt="footprint" height="24px" width="24px">
                <p class="mini-info"><?= $card->getAnimal() ?></p>
            </div>
        </div>

    </div>
    <div class="product-img">
        <img src="<?= $card->getImage() ?>" alt="<?= $card->getProduct() ?>" height="100%">
    </div>
</div>