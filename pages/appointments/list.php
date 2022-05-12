<link rel="stylesheet" href="src/styles/pages/list.css">

<section class="all-appointments">
    <div class="appointments">
        <p>Tous les rendez-vous</p>
    </div>

    <div class="appointment">
        <ul>
            <?php foreach ($appointments as $appointment) : ?>
                <div class="appointments_li">
                    <li>
                        <p class="appointments_reason"></p><?= $appointment->raison ?>
                        <a href="?action=appointments&edit=<?= $appointment->id ?>">Modifier / Accepter le rendez-vous</a>
                    </li>
                </div>
            <?php endforeach; ?>
        </ul>
    </div>
</section>