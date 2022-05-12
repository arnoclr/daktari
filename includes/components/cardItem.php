
<div class="card-wrap">
    <div class="card-info">
        <div class="product-info">
            <p class="product"><?= $card->product->nom ?></p>
            <p class="mini-info"><?= $card->product->marque ?></p>
        </div>

        <div class="dose-animal-wrap">
            <!-- <div class="dose-info">
                <img src="src/img/icons/pill.png" alt="pill" height="24px" width="24px">
                <p class="mini-info">pillules</p>
            </div> -->
            <div class="animal-info">
                <img src="src/img/icons/footprint.png" alt="footprint" height="24px" width="24px">
                <a href="?action=myAnimalInfo&id=<?= $card->animal->id ?>" class="mini-info"><?= $card->animal->nom ?></a>
            </div>
        </div>

    </div>
    <div class="product-img">
        <img src="<?= $card->product->image ?>" alt="<?= $card->product->name ?>" height="100%">
    </div>
</div>