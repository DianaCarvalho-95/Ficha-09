<?php include '../../includes/header.php'; ?> 
<?php include '../../includes/nav.php'; ?> 

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">
                    <i class="fa-solid fa-file-lines me-2"></i> Listagem de Clientes
                </h2>

                <a href="novo.php" class="btn btn-success">
                    <i class="fa-solid fa-plus me-1"></i> Novo cliente
                </a>
            </div>

            <p class="text-muted">Lista de clientes registados.</p>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data Nascimento</th>
                            <th>Telefone</th>
                            <th>Sistema de Saúde</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>João Santos</td>
                            <td>jsantos@gmails.com</td>
                            <td>1985-07-20</td>
                            <td>912345678</td>
                            <td>ADSE</td>
                            <td class="text-center">
                                <a href="detalhes.php" class="btn btn-sm btn-outline-primary me-1"
                                    title="Consultar">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="editar.php" class="btn btn-sm btn-outline-warning me-1" title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="apagar.php" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Ana Beatriz Ferreira</td>
                            <td>ana.ferreira@email.pt</td>
                            <td>1998-04-15</td>
                            <td>934567890</td>
                            <td>SNS</td>
                            <td class="text-center">
                                <a href="detalhes.php" class="btn btn-sm btn-outline-primary me-1"
                                    title="Consultar">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="editar.php" class="btn btn-sm btn-outline-warning me-1" title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="apagar.php" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?> 

