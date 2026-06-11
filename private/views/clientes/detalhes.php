<?php

require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../includes/database.php';

redirect_if_not_logged();

$idClientEncrypted = $_GET['id_cliente'] ?? null;
$idClient = aes_decrypt($idClientEncrypted);

if (!$idClient || !is_numeric($idClient)) {
    header('Location: lista.php');
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->execute([
        ':id' => $idClient
    ]);

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        header('Location: lista.php');
        exit;
    }

} catch (PDOException $e) {
    die("Erro ao carregar cliente: " . $e->getMessage());
}

?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <div class="col-md-9 col-lg-10 p-4">

            <div class="d-flex justify-content-center mt-4">
                <div class="card w-100 shadow rounded" style="max-width: 900px;">
                    <div class="card-body">

                        <h2 class="mb-4">
                            <strong>
                                <i class="fa-solid fa-user me-2"></i>
                                Detalhes do Cliente
                            </strong>

                            <?php if (($cliente['cliente_ativo'] ?? 0) == 1) : ?>
                                <span class="badge bg-success">Ativo</span>
                            <?php else : ?>
                                <span class="badge bg-secondary">Inativo</span>
                            <?php endif; ?>
                        </h2>

                        <hr>

                        <div class="mb-3">
                            <strong>Nome Completo</strong>
                            <p><?= htmlspecialchars($cliente['nome'] ?? '') ?></p>
                        </div>

                        <div class="mb-3">
                            <strong>Morada</strong>
                            <p><?= htmlspecialchars($cliente['morada'] ?? '') ?></p>
                        </div>

                        <div class="mb-3">
                            <strong>Cidade</strong>
                            <p><?= htmlspecialchars($cliente['cidade'] ?? '') ?></p>
                        </div>

                        <div class="mb-3">
                            <strong>Telefone</strong>
                            <p><?= htmlspecialchars($cliente['telefone'] ?? '') ?></p>
                        </div>

                        <div class="mb-3">
                            <strong>Email</strong>
                            <p><?= htmlspecialchars($cliente['email'] ?? '') ?></p>
                        </div>

                        <div class="mb-3">
                            <strong>Sexo</strong>
                            <p>
                                <?php
                                if (($cliente['sexo'] ?? '') === 'm') {
                                    echo 'Masculino';
                                } elseif (($cliente['sexo'] ?? '') === 'f') {
                                    echo 'Feminino';
                                } else {
                                    echo 'Outro';
                                }
                                ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <strong>Data de nascimento</strong>
                            <p>
                                <?= !empty($cliente['data_nascimento'])
                                    ? date('d/m/Y', strtotime($cliente['data_nascimento']))
                                    : '' ?>
                            </p>
                        </div>

                        <div class="mb-4">
                            <strong>Sistema de Saúde</strong>
                            <p><?= htmlspecialchars($cliente['sistema_saude'] ?? '') ?></p>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="lista.php" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-arrow-left me-1"></i>
                                Voltar
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>