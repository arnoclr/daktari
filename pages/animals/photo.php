<form method="post" enctype="multipart/form-data">
    <?= Token::set() ?>
    <input type="file" name="image" id="image" accept="image/*" required>
    <button>Changer l'image</button>
</form>