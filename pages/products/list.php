<ul>
    <?php foreach ($products as $product) : ?>
        <li>
            <img src="<?= preg_replace("/.png|.jpg/", 's.png', $product->image) ?>" alt="<?= $product->nom ?>">
            <?= $product->nom ?>
            <?= $product->marque ?>
        </li>
    <?php endforeach; ?>
</ul>