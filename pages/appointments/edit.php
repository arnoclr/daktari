<h1>Infos sur le rendez-vous</h1>

<form method="post">
    <?= Token::set() ?>
    <input type="text" name="raison" id="raison" placeholder="Raison" value="<?= $appointment->raison ?>"><small>max 255 caractères</small>
    <p>Date définitive :</p>
    <input type="datetime-local" name="timestamp" id="timestamp" value="<?= str_replace(" ", "T", $appointment->date) ?>">
    <input type="number" name="duree" id="duree" placeholder="Durée en min." min="0" max="120" value="<?= $appointment->duree_minutes ?>">
    <input type="number" name="tarif" id="tarif" placeholder="Prix en centimes" value="<?= $appointment->tarif_centimes ?>">
    <textarea name="resume" id="resume" cols="30" rows="10" placeholder="Résumé des manipulations"><?= $appointment->resume_manipulations ?></textarea>
    <small>laisser le prix vide et le résumé jusqu'a la fin du RDV</small>

    <button>Mettre à jour</button>
</form>