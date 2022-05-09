<form method="post" action="?action=verifyCode&redirectTo=<?= htmlspecialchars($_GET['redirectTo']) ?>" class="form-email form-code" id="form">

    <div class="code-wrap">
        <?= Token::set() ?>
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" id="n1" data-pos="1">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" id="n2" data-pos="2">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" id="n3" data-pos="3">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" id="n4" data-pos="4">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" id="n5" data-pos="5">
        <input type="number" name="code[]" maxlength="1" min="0" max="9" class="code-input" placeholder=" " autocomplete="off" id="n6" data-pos="6">
    </div>

    <div class="button-email__wrap">
        <a href="#">Besoin d'aide ?</a>
        <button class="email-button">M'authentifier</button>
    </div>
</form>

<script>
    document.getElementById('n1').focus();

    var inputs = document.querySelectorAll('.code-input');
    var form = document.getElementById('form');

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keydown', function(e) {
            var j = e.target.dataset.pos - 1;
            if (e.key == 'Delete' || e.key == 'Backspace') {
                if (this.value == '') {
                    inputs[j - 1].focus();
                }
            } else if (this.value.length > 0) {
                inputs[j + 1].focus();
            }
        });

        inputs[i].addEventListener('paste', function(e) {
            e.preventDefault();
            var code = (e.clipboardData || window.clipboardData).getData('text');
            if (code.length == 6) {
                for (var i = 0; i < 6; i++) {
                    inputs[i].value = code[i];
                }
            }
            setTimeout(() => {
                form.submit();
            }, 150);
        })
    }

    inputs[5].addEventListener('keyup', function(e) {
        if (this.value.length == 1) {
            form.submit();
        }
    });
</script>