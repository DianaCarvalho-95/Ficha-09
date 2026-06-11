<?php

require_once __DIR__ . '/../../includes/funcoes.php';

redirect_if_not_logged();

if (!in_array($_SERVER['REQUEST_METHOD'], ['GET', 'POST'])) {
    header('Location: lista.php');
    exit;
}

$idClientEncrypted = $_GET['id_cliente'] ?? null;
$idClient = aes_decrypt($idClientEncrypted);

if (!$idClient || !is_numeric($idClient)) {
    header('Location: lista.php');
    exit;
}

?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <div class="col-md-9 col-lg-10 p-4">
            <h2>Editar Cliente</h2>

            <div class="alert alert-info">
                ID encriptado recebido: <?= htmlspecialchars($idClientEncrypted) ?><br>
                ID desencriptado: <?= htmlspecialchars($idClient) ?>
            </div>

            <a href="lista.php" class="btn btn-secondary">
                Voltar
            </a>
        </div>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>