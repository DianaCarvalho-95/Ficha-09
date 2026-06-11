<?php

require_once __DIR__ . '/../../config/config.php';

function start_session()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function check_session()
{
    start_session();

    return isset($_SESSION['utilizador']);
}

function redirect_if_not_logged($redirect_to = '/public/login.php')
{
    start_session();

    if (!check_session()) {
        header("Location: " . BASE_URL . $redirect_to);
        exit;
    }
}

function logout_and_redirect($redirect_to = '/public/login.php')
{
    start_session();

    session_unset();
    session_destroy();

    header("Location: " . BASE_URL . $redirect_to);
    exit;
}

function validar_login($username, $password)
{
    if ($username === 'ana@isep.pt' && $password === '123456') {
        return 1;
    }

    return 0;
}