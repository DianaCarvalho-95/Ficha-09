<?php

require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../includes/database.php';

redirect_if_not_logged();

$idEncrypted = $_GET['id_cliente'] ?? null;
$id = aes_decrypt($idEncrypted);

if (!$id || !is_numeric($id)) {
    header('Location: lista.php');
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE clientes SET cliente_ativo = 0 WHERE id = :id");
    $stmt->execute([':id' => $id]);

    header('Location: lista.php');
    exit;

} catch (PDOException $e) {
    echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
    exit;
}