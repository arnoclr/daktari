<link rel="stylesheet" href="src/styles/pages/index.css">

<div class="container">
    <div class="circles-bg"></div>
    <div class="connect-wrap">
        <h1><?= isset($bienvenue) ? "Confirmation" : "Bienvenue sur Daktari" ?></h1>
        <p><?= isset($bienvenue) ? "Entrez le code à 6 chiffres reçu par mail. <br>  Vous n’avez pas reçu de mail ? Pensez à <br>  vérifier dans vos spams."
        : "C’est votre première visite ? Entrez <br> simplement votre adresse email et nous <br> vous enverrons un code de confirmation." ?></p>

        <?php if(isset($bienvenue)) {
            include "./pages/auth/code.php";
        } else {
            include "./pages/auth/email.php";
        } ?>
    </div>
</div>