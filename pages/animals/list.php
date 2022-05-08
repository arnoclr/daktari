<ul>
    <?php foreach ($animals as $animal): ?>
        <li>
            <?= $animal->nom ?>
            <img src="<?= preg_replace("/.png|.jpg/", 's.jpg', $animal->image) ?>" alt="<?= $animal->nom ?>">
        </li>
    <?php endforeach; ?>
</ul>