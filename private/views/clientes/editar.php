<?php

require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../includes/database.php';

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

$erro = '';

try {
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->execute([
        ':id' => $idClient
    ]);

    $cliente = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$cliente) {
        header('Location: lista.php');
        exit;
    }

} catch (PDOException $err) {
    $erro = "Erro na ligação à base de dados.";
    $cliente = null;
}

?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-center mt-4">
                <div class="card w-100 shadow rounded" style="max-width: 1200px;">
                    <div class="card-body">

                        <h2 class="mb-4">
                            <strong>
                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                Atualização de Dados CLIENTES
                            </strong>
                        </h2>

                        <hr>

                        <?php if (!empty($erro)) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?= htmlspecialchars($erro) ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($cliente) : ?>

                            <form action="editar.php?id_cliente=<?= htmlspecialchars($idClientEncrypted) ?>"
                                  method="post"
                                  novalidate
                                  autocomplete="off">

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="texto_nome" class="form-label">Nome Completo</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_nome"
                                               name="nome_cliente"
                                               value="<?= htmlspecialchars($cliente->nome ?? '') ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="texto_morada" class="form-label">Morada (NºPorta, Andar)</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_morada"
                                               name="morada_cliente"
                                               value="<?= htmlspecialchars($cliente->morada ?? '') ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="texto_cp" class="form-label">Código Postal</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_cp"
                                               name="cp_cliente"
                                               value="">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="texto_cidade" class="form-label">Cidade</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_cidade"
                                               name="cid_cliente"
                                               value="<?= htmlspecialchars($cliente->cidade ?? '') ?>">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="texto_telefone" class="form-label">Telefone</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_telefone"
                                               name="tel_cliente"
                                               value="<?= htmlspecialchars($cliente->telefone ?? '') ?>">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="texto_email" class="form-label">Email</label>
                                        <input type="email"
                                               class="form-control"
                                               id="texto_email"
                                               name="email_cliente"
                                               value="<?= htmlspecialchars($cliente->email ?? '') ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label d-block">Sexo</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="radio_gender"
                                                   id="radio_m"
                                                   value="m"
                                                   <?= ($cliente->sexo ?? '') == 'm' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="radio_m">Masculino</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="radio_gender"
                                                   id="radio_f"
                                                   value="f"
                                                   <?= ($cliente->sexo ?? '') == 'f' ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="radio_f">Feminino</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="texto_dnasc" class="form-label">Data de nascimento</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_dnasc"
                                               name="dnasc_cliente"
                                               value="<?= !empty($cliente->data_nascimento)
                                                    ? date('Y-m-d', strtotime($cliente->data_nascimento))
                                                    : '' ?>">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="texto_estcivil" class="form-label">Estado Civil</label>
                                        <select class="form-select"
                                                id="texto_estcivil"
                                                name="estaciv_cliente">
                                            <option value="">Escolha uma opção</option>
                                            <option value="solt">Solteiro</option>
                                            <option value="casd">Casado</option>
                                            <option value="ufat">União de Facto</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="texto_SSaude" class="form-label">Sistema de Saúde</label>
                                        <input type="text"
                                               class="form-control"
                                               id="texto_SSaude"
                                               name="campo_opcao"
                                               list="sistemasaude"
                                               value="<?= htmlspecialchars($cliente->sistema_saude ?? '') ?>">

                                        <datalist id="sistemasaude">
                                            <option value="SNS">
                                            <option value="ADSE">
                                            <option value="SMAS">
                                            <option value="CTT">
                                            <option value="PSP">
                                            <option value="MEDIS">
                                        </datalist>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="profissao" class="form-label">Profissão</label>
                                        <input type="text"
                                               class="form-control"
                                               id="profissao"
                                               name="profissao_cliente"
                                               value="">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mb-4">
                                    <a href="lista.php" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-xmark me-1"></i>
                                        Cancelar
                                    </a>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-regular fa-floppy-disk me-1"></i>
                                        Guardar
                                    </button>
                                </div>

                            </form>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>