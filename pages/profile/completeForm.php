<?php if (isset($message)): ?> 
    <p><?= $message ?></p>
<?php endif; ?>

<form action="?action=completeProfile" method="post" required>
    <?= Token::set() ?>
    <input value="<?= $currentData->nom ?>" type="text" name="nom" id="nom" placeholder="Nom" required>
    <input value="<?= $currentData->adresse ?>" type="text" name="adresse" id="adresse" placeholder="Adresse" required>
    <input value="<?= $currentData->tel ?>" type="number" name="tel" id="tel" placeholder="0612345678" min="600000000" max="800000000" required>

    <button>Compléter mon profil</button>
</form>