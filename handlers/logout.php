<?php

unset($_SESSION['email']);

header('Location: ?action=login');