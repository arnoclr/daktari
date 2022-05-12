<form method="post">
    <?= Token::set() ?>
    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?= $animal->nom ?>" required>
    <input type="number" name="taille_cm" id="taille_cm" placeholder="Taille (cm)" value="<?= $animal->taille_cm ?>" required>

    <p>Castré ?</p>
    <input type="checkbox" name="castre" id="castre" value="1" <?= $animal->castre ? "checked" : "" ?>>
    <input type="number" name="poids" id="poids" placeholder="Poids (kg)" value="<?= $animal->poids ?>" required>

    <p>Décédé ?</p>
    <input type="checkbox" name="decede" id="decede" value="1" <?= $animal->decede ? "checked" : "" ?>>

    <div class="btn-group">
        <button>Ajouter</button>
        <button onclick="window.history.back();" class="back">Retour</button>
    </div>
</form>