<form action="?action=makeAppointment" method="post">
    <?= Token::set() ?>
    <input type="text" name="raison" id="raison" placeholder="Raison"><small>max 255 caractères</small>
    <select name="animal" id="animal">
        <?php foreach ($myAnimals as $animal) : ?>
            <option value="<?= $animal->id ?>"><?= $animal->nom ?></option>
        <?php endforeach; ?>
    </select>

    <input type="datetime-local" name="timestamp" id="timestamp" min="<?= date("Y-m-d") ?>T00:00" step="900">
    <small>Durée estimée à 20 minutes. La date, l'heure et la durée sont suscptibles d'être modifiées après lecture du motif et en fonction des rendez-vous préétablis.
        <br>
        Vous recevrez un récapitulatif par email contenant la date et la durée du rendez vous.
    </small>

    <button>Prendre rendez-vous</button>
</form>