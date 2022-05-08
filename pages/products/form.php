<form action="?action=addProduct" method="post" enctype="multipart/form-data">
    <?= Token::set() ?>
    <input type="text" name="nom" id="nom" placeholder="Nom" required>
    <input type="text" name="marque" id="marque" placeholder="Marque" required>
    <input type="file" name="image" id="image" accept="image/*" required>

    <button>ajouter</button>
</form>