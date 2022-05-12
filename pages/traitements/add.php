<form method="post">
    <?= Token::set() ?>

    <p>Produit</p>
    <select name="produit" id="produit">
        <?php foreach ($products as $product): ?>
            <option value="<?= $product->id ?>"><?= $product->nom ?></option>
        <?php endforeach; ?>
    </select>

    <input type="number" name="frequence_journaliere" id="frequence_journaliere" placeholder="Fréquence journalière">
    <input type="number" name="dose_ml" id="dose_ml" placeholder="Dose (ml)">
    <input type="number" name="duree_jours" id="duree_jours" placeholder="Durée (jours)">
    <input type="number" name="dillution_pourcentage" id="dillution_pourcentage" placeholder="Dillution (%)">

    <?php if ($for == 0): ?>
        <p>Concerne la consultation :</p>
        <select name="consultation" id="consultation">
            <?php foreach ($consultations as $consultation): ?>
                <option value="<?= $consultation->id ?>"><?= $consultation->raison ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>

    <button>Ajouter à la consultation</button>
</form>