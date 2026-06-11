<?php

session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/includes/database.php';

try {

    $parametros = [
        ':u' => $_POST['text_username'],
        ':p' => $_POST['text_password']
    ];

    $comando = $pdo->prepare("
        SELECT *
        FROM agents
        WHERE name = :u
        AND passwrd = :p
    ");

    $comando->execute($parametros);

    $resultados = $comando->fetchAll(PDO::FETCH_OBJ);

    if (count($resultados) === 0) {

        $_SESSION['server_error'] = 'Login inválido';

        header('Location: ../public/login.php');
        return;
    }

    $agente = $resultados[0];

    // Atualizar último login
    $stmt = $pdo->prepare("
        UPDATE agents
        SET last_login = NOW()
        WHERE id = ?
    ");

    $stmt->execute([$agente->id]);

    // Guardar sessão
    $_SESSION['utilizador'] = $agente->name;
    $_SESSION['profile'] = $agente->profile;

    header('Location: views/clientes/lista.php');
    exit;

} catch (PDOException $e) {

    $_SESSION['server_error'] = 'Erro ao ligar à base de dados.';

    header('Location: ../public/login.php');
    return;
}