<?php

require_once __DIR__ . '/../../config/config.php';

try {

    $dsn = "mysql:host=" . DB_HOST .
           ";port=" . DB_PORT .
           ";dbname=" . DB_NAME .
           ";charset=utf8mb4";

    $pdo = new PDO(
        $dsn,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    );

} catch (PDOException $e) {

    die("Erro de ligação à base de dados: " . $e->getMessage());

}