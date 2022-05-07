<form method="post" action="?action=verifyCode" class="form-email form-code" id="form">

    <div class="code-wrap">
        <?= Token::set() ?>
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" oninput="this.nextElementSibling.focus()" id="n1">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" oninput="this.nextElementSibling.focus()" id="n2">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" oninput="this.nextElementSibling.focus()" id="n3">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" oninput="this.nextElementSibling.focus()" id="n4">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" oninput="this.nextElementSibling.focus()" id="n5">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" oninput="document.getElementById('form').submit()" id="n6">
    </div>

    <div class="button-email__wrap">
        <a href="#">Besoin d'aide ?</a>
        <button class="email-button">M'authentifier</button>
    </div>
</form>