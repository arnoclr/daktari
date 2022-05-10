<link rel="stylesheet" href="src/styles/forms.css?a=<?= md5_file("src/styles/forms.css") ?>">

<nav>
    <div class="head">
        <a href="../daktari/">
            <h1>Daktari </h1>
            <p>Nos amis les animaux et leur santé</p>
        </a>
    </div>

    <div class="user-action" onclick="dropdownToggle()">
        <div class="profile">
            <img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($user->email))) ?>?d=retro&s=75" alt="photo de profil gravatar" height="75px" width="75px">
        </div>
        <div class="dropdown">
            <a href="?action=viewProfile" class="username"><?= $user->nom ?></a>
            <div class="bar"></div>
            <ul>
                <li><a href="?action=myAnimals">Mes animaux</a></li>
                <li><a href="?action=makeAppointment">Prendre rendez-vous</a></li>
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