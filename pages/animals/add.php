<form action="?action=addAnimal" method="post" enctype="multipart/form-data">
    <?= Token::set() ?>
    <input type="text" name="nom" id="nom" placeholder="Nom" required>
    <input type="text" name="espece" id="espece" placeholder="Espèce" required>
    <input type="text" name="race" id="race" placeholder="Race" required>
    <input type="number" name="taille_cm" id="taille_cm" placeholder="Taille (cm)" required>
    <select name="genre" id="genre" required>
        <option value="M">Male</option>
        <option value="F">Femelle</option>
    </select>
    <p>Castré ?</p>
    <input type="checkbox" name="castre" id="castre" value="1">
    <input type="number" name="poids" id="poids" placeholder="Poids (kg)" required>
    <input type="file" name="image" id="image" accept="image/*" required>

    <div class="btn-group">
        <button>Ajouter</button>
        <button onclick="window.history.back();" class="back">Retour</button>
    </div>

</form>