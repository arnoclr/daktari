<link rel="stylesheet" href="src/styles/pages/home.css?a=<?= md5_file("src/styles/pages/home.css") ?>">

<header>
    <p>Bonjour <?= $user->nom ?>, voici vos prochains traitements.</p>
</header>

<section>
    <div class="date">
        <p><?= $days[date('N')] ?>. <?= date('d') ?> <?= $months[date('n') - 1] ?> <?= date('Y') ?></p>

    </div>
    <div class="calendar-wrap">
        <div id="myBar-wrap">
            <p> 0 </p>
            <div id="arrow-right"></div>
            <div id="myBar"></div>
        </div>
        
        
        <div class="time">
            <div class="time-hours">
                <?php for ($i = 8; $i <= 20; $i++) : ?>
                    <div class="time-item">
                        <p class="time"><?= $i ?>h</p>

                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <?php $day = 0; foreach($traitementsPerDays as $data): $day++ ?>
            <div class="day<?= $day ?>">

                <?php 
                foreach($data as $item) {
                    for ($i = 0; $i < $item->traitement->frequence_journaliere; $i++) {
                        $card = $item;
                        include 'includes/components/cardItem.php'; 
                    }
                }
                ?>

            </div>
        <?php endforeach; ?>
    </div>
</section>

<script src="src/scripts/pages/home.js"></script>