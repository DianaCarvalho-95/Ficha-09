<?php

require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../includes/database.php';

redirect_if_not_logged();

$id = $_GET['id'] ?? $_POST['id'] ?? '';

if (empty($id)) {
    header("Location: lista.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $cliente = $stmt->fetch();

    if (!$cliente) {
        header("Location: lista.php");
        exit;
    }

} catch (PDOException $err) {
    header("Location: lista.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);

        header("Location: lista.php");
        exit;

    } catch (PDOException $err) {
        $erro_sistema = "Erro ao eliminar o cliente.";
    }
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

                        <h4>Deseja eliminar o cliente?</h4>

                        <h3 class="fw-bold mt-3">
                            <?= htmlspecialchars($cliente->nome ?? '') ?>
                        </h3>

                        <p class="mt-4 mb-1">
                            <i class="fa-solid fa-at me-2"></i>
                            <?= htmlspecialchars($cliente->email ?? '') ?>
                        </p>

                        <p class="mb-4">
                            <i class="fa-solid fa-phone me-2"></i>
                            <?= htmlspecialchars($cliente->telefone ?? '') ?>
                        </p>

                        <?php if (!empty($erro_sistema)) : ?>
                            <div class="alert alert-danger">
                                <?= htmlspecialchars($erro_sistema) ?>
                            </div>
                        <?php endif; ?>

                        <form action="#" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($cliente->id) ?>">

                            <a href="lista.php" class="btn btn-outline-secondary px-4 me-2">
                                <i class="fa-solid fa-xmark me-1"></i>
                                Não
                            </a>

                            <button type="submit" class="btn btn-danger px-4">
                                <i class="fa-solid fa-check me-1"></i>
                                Sim
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>