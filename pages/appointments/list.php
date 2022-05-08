<ul>
    <?php foreach ($appointments as $appointment): ?>
        <li>
            <?= $appointment->raison ?>
            <a href="?action=appointments&edit=<?= $appointment->id ?>">Modifier / Accepter le rendez-vous</a>
        </li>
    <?php endforeach; ?>
</ul>