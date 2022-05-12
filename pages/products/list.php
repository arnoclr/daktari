<link rel="stylesheet" href="src/styles/pages/list.css">

<section class="all-products">
    <div class="products">
        <p>Tous les produits</p>
    </div>

    <div class="product">
        <ul>
            <?php foreach ($products as $product) : ?>
                <li>
                    <img src="<?= $product->image ?>" alt="<?= $product->nom ?>" width="250">
                    <?= $product->nom ?>
                    <?= $product->marque ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<a href="?action=addProduct" class="button" style="margin-top: 20px;">Ajouter un produit</a>