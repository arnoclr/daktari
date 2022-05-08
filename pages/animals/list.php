<link rel="stylesheet" href="src/styles/pages/list.css">

<section class="all-animals">
    <div class="animals">
        <p>Mes animaux</p>
    </div>

    <div class="animal">
        <ul>
            <?php foreach ($animals as $animal) : ?>
                <li>
                    <p><?= $animal->nom ?></p>
                    <a href="?action=myAnimalInfo&id=<?= $animal->id ?>">
                    <img src="<?= preg_replace("/.png|.jpg/", 's.jpg', $animal->image) ?>" alt="<?= $animal->nom ?>"></a>
                </li>
            <?php endforeach; ?>

            <li>
                <p>Ajouter</p>
                <a href="?action=addAnimal" class="add-animal">
                    <svg width="40" height="40" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M56 32H32V56H24V32H0V24H24V0H32V24H56V32Z" fill="#777777" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>


</section>