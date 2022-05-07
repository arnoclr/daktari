<?php

unset($_SESSION['email']);
unset($_SESSION['_token']);

header('Location: ?action=login');