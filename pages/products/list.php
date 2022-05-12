<ul>
    <?php foreach ($products as $product) : ?>
        <li>
            <img src="<?= preg_replace("/.png|.jpg/", 's.png', $product->image) ?>" alt="<?= $product->nom ?>">
            <?= $product->nom ?>
            <?= $product->marque ?>
        </li>
    <?php endforeach; ?>
</ul>

<br>

<a href="?action=addProduct" class="button">Ajouter un produit</a>