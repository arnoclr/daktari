<link rel="stylesheet" href="src/styles/pages/list.css">

<div class="wrap">
    <section class="animal-img-section">
        <div class="animal-img">
            <img src="<?= preg_replace("/.png|.jpg/", '.jpg', $animal->image) ?>" alt="<?= $animal->nom ?>">
        </div>


    </section>

    <section class="animal-info-section">
        <p class="info-name"><?= $animal->nom ?> <span> (<?= $animal->genre ?>) </span></p>

        <div class="info-body">
            <p><?= $animal->poids ?> kg</p>
            <p><?= $animal->taille_cm ?> cm</p>
        </div>
    </section>

</div>