<nav>
    <div class="head">
        <h1>Daktari</h1>
        <p>Nos amis les animaux et leur santé</p>
    </div>

    <div class="user-action" onclick="dropdownToggle()">
        <div class="profile">
            <img src="../src/img/user1.png" alt="user1" height="75px" width="auto">
        </div>
        <div class="dropdown">
            <a href="../src/pages/profile.php" class="username"><?= $name ?? '?' ?></a>
            <div class="bar"></div>
            <ul>
                <li><a href="../src/pages/user_animals.php">Mes animaux</a></li>
                <li><a href="../src/pages/user_appointment.php">Prendre rendez-vous</a></li>
                <li class="logout"><a href="?action=logout">Se déconnecter</a></li>
            </ul>
        </div>
    </div>

    <script>
        function dropdownToggle() {
            const toggledropdown = document.querySelector('.dropdown');
            toggledropdown.classList.toggle('active');
        }
    </script>
</nav>