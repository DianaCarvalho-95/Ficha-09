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
    $stmt = $pdo->prepare("SELECT nome, email, telefone FROM clientes WHERE id = :id");
    $stmt->execute([':id' => $id]);

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        header('Location: lista.php');
        exit;
    }

} catch (PDOException $e) {
    echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
    exit;
}

?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <div class="col-md-9 col-lg-10 p-4">

            <div class="d-flex justify-content-center mt-5">
                <div class="card shadow rounded text-center p-4" style="max-width: 650px; width: 100%;">

                    <div class="card-body">

                        <i class="fa-solid fa-triangle-exclamation text-warning display-4 mb-3"></i>

                        <p class="mb-2">Deseja eliminar o cliente?</p>

                        <h4 class="mb-4">
                            <strong><?= htmlspecialchars($cliente['nome']) ?></strong>
                        </h4>

                        <span class="d-block mb-1">
                            <i class="fa-solid fa-at me-2"></i>
                            <strong><?= htmlspecialchars($cliente['email']) ?></strong>
                        </span>

                        <span class="d-block mb-4">
                            <i class="fa-solid fa-phone me-2"></i>
                            <strong><?= htmlspecialchars($cliente['telefone']) ?></strong>
                        </span>

                        <a href="lista.php" class="btn btn-outline-secondary px-4 me-2">
                            <i class="fa-solid fa-xmark me-2"></i>Não
                        </a>

                        <a href="confirmar_apagar.php?id_cliente=<?= urlencode($idEncrypted) ?>"
                           class="btn btn-danger px-4">
                            <i class="fa-solid fa-check me-2"></i>Sim
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>