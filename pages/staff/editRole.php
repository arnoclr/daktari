<form action="?action=editRole" method="post">

    <?= Token::set() ?>
    <p>Modifier l'utilisateur : </p>
    <input type="email" name="email" id="email" placeholder="Adresse email de l'utilisateur">

    <p>Vers le rôle : </p>
    <select name="role" id="role">
        <option value="0">Client</option>
        <option value="1">Gestionnaire</option>
        <option value="2">Vétérinaire</option>
        <option value="3">Administrateur</option>
    </select>

    <button>Modifier</button>

</form>