<?php
session_start();

$validation_errors = [];

if (!empty($_SESSION['validation_errors'])) {
    $validation_errors = $_SESSION['validation_errors'];
    unset($_SESSION['validation_errors']);
}

$server_error = '';

if (!empty($_SESSION['server_error'])) {
    $server_error = $_SESSION['server_error'];
    unset($_SESSION['server_error']);
}
?>

<?php include '../private/includes/header.php'; ?>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-10 col-md-6 col-lg-4">
            <div class="card p-4">

                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="/Ficha%2009/private/assets/img/gym125.png"
                         class="img-fluid me-3"
                         alt="Logo">

                    <h2><strong><?php echo APP_NAME; ?></strong></h2>
                </div>

                <form name="formulario" action="../private/processa_login.php" method="post">

                    <div class="mb-3">
                        <label class="form-label">Utilizador</label>
                        <input type="email" class="form-control" name="text_username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="text_password">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-secondary px-4">
                            Entrar
                            <i class="fa-solid fa-right-to-bracket ms-2"></i>
                        </button>
                    </div>

                    <!-- Botões de preenchimento automático (Fase de Testes) -->
                    <div class="mt-2 text-center">
                        <button type="button" id="preencher_adm" class="btn btn-outline-primary btn-sm me-2">
                            Preencher Admin
                        </button>

                        <button type="button" id="preencher_agent" class="btn btn-outline-secondary btn-sm">
                            Preencher Agente
                        </button>
                    </div>

                    <?php if (!empty($validation_errors)) : ?>
                        <div class="alert alert-danger p-2 text-center mt-3">
                            <?php foreach ($validation_errors as $error) : ?>
                                <div><?= htmlspecialchars($error) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($server_error)) : ?>
                        <div class="alert alert-danger p-2 text-center mt-3">
                            <div><?= htmlspecialchars($server_error) ?></div>
                        </div>
                    <?php endif; ?>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
document.querySelector("#preencher_adm").addEventListener("click", () => {
    const formulario = document.forms["formulario"];
    formulario["text_username"].value = "admin@isep.pt";
    formulario["text_password"].value = "$2y$10$aia";
});

document.querySelector("#preencher_agent").addEventListener("click", () => {
    const formulario = document.forms["formulario"];
    formulario["text_username"].value = "agente1@isep.pt";
    formulario["text_password"].value = "$2y$10$O";
});
</script>

<?php include '../private/includes/footer.php'; ?>