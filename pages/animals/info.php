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

        <h4>Ses rendez-vous</h4>
        <ul class="rdvs">
            <?php foreach($appointments as $appointment): ?>
                <li><strong><?= $appointment->raison ?></strong>, <?= $appointment->date ?></li>
            <?php endforeach; ?>
        </ul>

        <h4>Ses traitements récents</h4>
        <p>Consultez le <a href="?action=viewCalendar">calendrier</a> pour plus de détails</p>
        <div>
            <?php foreach($traitements as $traitement): ?>
                <?php
                $product = $pdo->query("SELECT * FROM produits WHERE id = {$traitement->id_produit}")->fetch();
                $card = (object) [
                    "product" => $product,
                    "traitement" => $traitement,
                    "animal" => $animal
                ];
                include 'includes/components/cardItem.php'; 
                ?>
            <?php endforeach; ?>
        </div>

        <div>
            <a href="?action=editAnimalInfo&id=<?= $animal->id ?>" class="button">Modifier les informations</a>
            <a href="?action=editAnimalPhoto&id=<?= $animal->id ?>" class="button">Changer la photo</a>
        </div>

    </section>

</div>