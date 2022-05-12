<link rel="stylesheet" href="src/styles/pages/list.css">

<section class="all-products">
    <div class="products">
        <p>Tous les produits</p>
    </div>

    <div class="product">
        <ul>
            <?php foreach ($products as $product) : ?>
                <div class="product_li">
                    <li>
                        <img src="<?= $product->image ?>" alt="<?= $product->nom ?>" width="150">
                        <p class="product_name"><?= $product->nom ?></p>
                        <p class="product_brand"><?= $product->marque ?></p>
                    </li>
                </div>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<a href="?action=addProduct" class="button add-product" style="margin-top: 20px;">Ajouter un produit</a>