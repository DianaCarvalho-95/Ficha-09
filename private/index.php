<?php
require_once 'includes/funcoes.php';

redirect_if_not_logged('../public/login.php');

header('Location: home.php');
exit;