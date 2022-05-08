<ul>
    <?php foreach ($products as $product) : ?>
        <li>
            <img src="<?= str_replace('.png', 's.jpg', $product->image) ?>" alt="<?= $product->nom ?>">
            <?= $product->nom ?>
            <?= $product->marque ?>
        </li>
    <?php endforeach; ?>
</ul>