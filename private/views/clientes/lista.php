<?php

require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../includes/database.php';

redirect_if_not_logged();

try {

    $sql = "SELECT * FROM clientes ORDER BY nome ASC";

    $resultados = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);

    $erro = '';

} catch (PDOException $e) {

    $resultados = [];

    $erro = "Aconteceu um erro na ligação.";

}

?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <div class="col-md-9 col-lg-10 p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h2 class="mb-0">
                    <i class="fa-solid fa-address-book me-2"></i>
                    Listagem de Clientes
                </h2>

                <a href="novo.php" class="btn btn-success">
                    <i class="fa-solid fa-plus me-1"></i>
                    Novo cliente
                </a>

            </div>

            <hr>

            <?php if (!empty($erro)) : ?>

                <p class="text-center text-danger">
                    <?= htmlspecialchars($erro) ?>
                </p>

            <?php else : ?>

                <?php if (count($resultados) == 0) : ?>

                    <p class="text-muted">
                        Não existem clientes registados.
                    </p>

                <?php else : ?>

                    <div class="table-responsive">

                        <table id="tabela-clientes"
                               class="table table-bordered table-striped align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Sexo</th>
                                    <th>Data Nascimento</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Morada</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($resultados as $cliente) : ?>

                                    <tr>

                                        <td>
                                            <?= htmlspecialchars($cliente->nome ?? '') ?>
                                        </td>

                                        <td>

                                            <?php

                                            if (($cliente->sexo ?? '') == 'f') {

                                                echo 'Feminino';

                                            } elseif (($cliente->sexo ?? '') == 'm') {

                                                echo 'Masculino';

                                            } else {

                                                echo htmlspecialchars($cliente->sexo ?? '');

                                            }

                                            ?>

                                        </td>

                                        <td>

                                            <?= !empty($cliente->data_nascimento)
                                                ? date('Y-m-d', strtotime($cliente->data_nascimento))
                                                : '' ?>

                                        </td>

                                        <td>
                                            <?= htmlspecialchars($cliente->email ?? '') ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($cliente->telefone ?? '') ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars(
                                                trim(
                                                    ($cliente->morada ?? '') .
                                                    ' - ' .
                                                    ($cliente->cidade ?? ''),
                                                    ' - '
                                                )
                                            ) ?>
                                        </td>

                                        <td class="text-center">

                                            <a href="detalhes.php?id_cliente=<?= $cliente->id ?>"
                                               class="btn btn-sm btn-outline-primary me-1"
                                               title="Consultar">

                                                <i class="fa-solid fa-eye"></i>

                                            </a>

                                            <a href="editar.php?id_cliente=<?= $cliente->id ?>"
                                               class="btn btn-sm btn-outline-warning me-1"
                                               title="Editar">

                                                <i class="fa-solid fa-pen-to-square"></i>

                                            </a>

                                            <a href="apagar.php?id_cliente=<?= $cliente->id ?>"
                                               class="btn btn-sm btn-outline-danger"
                                               title="Eliminar">

                                                <i class="fa-solid fa-trash-can"></i>

                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <p>Total: <?= count($resultados) ?></p>

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>