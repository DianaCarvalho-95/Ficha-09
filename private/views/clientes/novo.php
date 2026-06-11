<?php

require_once __DIR__ . '/../../includes/funcoes.php';
require_once __DIR__ . '/../../includes/database.php';

redirect_if_not_logged();

$nome = '';
$morada = '';
$cp = '';
$cidade = '';
$telefone = '';
$email = '';
$sexo = '';
$dnasc = '';
$estado = '';
$sistema = '';
$profissao = '';

$erros = [];
$erro_sistema = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome_cliente"] ?? "");
    $morada = trim($_POST["morada_cliente"] ?? "");
    $cp = trim($_POST["cp_cliente"] ?? "");
    $cidade = trim($_POST["cid_cliente"] ?? "");
    $telefone = trim($_POST["tel_cliente"] ?? "");
    $email = trim($_POST["email_cliente"] ?? "");
    $sexo = trim($_POST["radio_gender"] ?? "");
    $dnasc = trim($_POST["dnasc_cliente"] ?? "");
    $estado = trim($_POST["estaciv_cliente"] ?? "");
    $sistema = trim($_POST["campo_opcao"] ?? "");
    $profissao = trim($_POST["profissao_cliente"] ?? "");

    if (empty($nome)) {
        $erros[] = "O campo Nome é obrigatório.";
    } elseif (preg_match('/\d/', $nome)) {
        $erros[] = "O campo Nome não pode conter números.";
    }

    if (empty($morada)) {
        $erros[] = "O campo Morada é obrigatório.";
    }

    if (empty($cp)) {
        $erros[] = "O campo Código Postal é obrigatório.";
    } elseif (!preg_match('/^\d{4}-\d{3}$/', $cp)) {
        $erros[] = "O Código Postal deve ter o formato 0000-000.";
    }

    if (empty($cidade)) {
        $erros[] = "O campo Cidade é obrigatório.";
    } elseif (preg_match('/\d/', $cidade)) {
        $erros[] = "O campo Cidade não pode conter números.";
    }

    } elseif (!preg_match('/^9\d{8}$/', $telefone)) {
    $erros[] = "O número de telefone não é válido. Deve começar por 9 e ter 9 dígitos.";
}

    if (empty($email)) {
        $erros[] = "O campo Email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O endereço de email não é válido.";
    }

    if (empty($sexo)) {
        $erros[] = "O campo Género é obrigatório.";
    }

    if (empty($dnasc)) {
        $erros[] = "O campo Data de Nascimento é obrigatório.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dnasc)) {
        $erros[] = "Formato de data inválido. Use AAAA-MM-DD.";
    } else {
        $partes = explode('-', $dnasc);

        if (!checkdate((int)$partes[1], (int)$partes[2], (int)$partes[0])) {
            $erros[] = "Data de nascimento inválida.";
        }
    }

    if (empty($estado)) {
        $erros[] = "O campo Estado Civil é obrigatório.";
    }

    if (empty($sistema)) {
        $erros[] = "Sistema de saúde não preenchido.";
    }

    if (empty($profissao)) {
        $erros[] = "Profissão é obrigatória.";
    }

    if (empty($erros)) {

        $nome = ucwords(strtolower($nome));
        $cidade = ucwords(strtolower($cidade));
        $email = strtolower($email);
        $sistema = strtoupper($sistema);

        try {
            $sql = "INSERT INTO clientes (
                        nome,
                        sexo,
                        data_nascimento,
                        email,
                        telefone,
                        morada,
                        cidade,
                        cliente_ativo,
                        sistema_saude
                    ) VALUES (
                        :nome,
                        :sexo,
                        :dnasc,
                        :email,
                        :telefone,
                        :morada,
                        :cidade,
                        '1',
                        :sistema
                    )";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':nome' => $nome,
                ':sexo' => $sexo,
                ':dnasc' => $dnasc,
                ':email' => $email,
                ':telefone' => $telefone,
                ':morada' => $morada,
                ':cidade' => $cidade,
                ':sistema' => $sistema
            ]);

            header("Location: lista.php");
            exit;
        } catch (PDOException $err) {
            $erro_sistema = "Erro ao gravar os dados: " . $err->getMessage();
        }
    }
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
                                <i class="fa-solid fa-users me-2"></i>
                                Inserir novo cliente
                            </strong>
                        </h2>

                        <hr>

                        <form action="#" method="post" novalidate autocomplete="off">

                            <input type="text" name="fake_user" style="display:none">
                            <input type="password" name="fake_pass" style="display:none">

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_nome" class="form-label">Nome Completo</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_nome"
                                        name="nome_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($nome) ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_morada" class="form-label">Morada (NºPorta, Andar)</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_morada"
                                        name="morada_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($morada) ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="texto_cp" class="form-label">Código Postal</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_cp"
                                        name="cp_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($cp) ?>">
                                </div>

                                <div class="col-md-3">
                                    <label for="texto_cidade" class="form-label">Cidade</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_cidade"
                                        name="cid_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($cidade) ?>">
                                </div>

                                <div class="col-md-3">
                                    <label for="texto_telefone" class="form-label">Telefone</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_telefone"
                                        name="tel_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($telefone) ?>">
                                </div>

                                <div class="col-md-3">
                                    <label for="texto_email" class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control"
                                        id="texto_email"
                                        name="email_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($email) ?>">
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
                                            <?= $sexo == 'm' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio_m">Masculino</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="radio_gender"
                                            id="radio_f"
                                            value="f"
                                            <?= $sexo == 'f' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio_f">Feminino</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="texto_dnasc" class="form-label">Data de nascimento</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_dnasc"
                                        name="dnasc_cliente"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($dnasc) ?>">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="texto_estcivil" class="form-label">Estado Civil</label>
                                    <select class="form-select"
                                        id="texto_estcivil"
                                        name="estaciv_cliente">
                                        <option value="">Escolha uma opção</option>
                                        <option value="solt" <?= $estado == 'solt' ? 'selected' : '' ?>>Solteiro</option>
                                        <option value="casd" <?= $estado == 'casd' ? 'selected' : '' ?>>Casado</option>
                                        <option value="ufat" <?= $estado == 'ufat' ? 'selected' : '' ?>>União de Facto</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="texto_SSaude" class="form-label">Sistema de Saúde</label>
                                    <input type="text"
                                        class="form-control"
                                        id="texto_SSaude"
                                        name="campo_opcao"
                                        list="sistemasaude"
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($sistema) ?>">

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
                                        autocomplete="new-password"
                                        value="<?= htmlspecialchars($profissao) ?>">
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

                            <?php if (!empty($erros)) : ?>
                                <div class="alert alert-danger">
                                    <strong>Foram encontrados os seguintes erros:</strong>
                                    <ul class="mb-0">
                                        <?php foreach ($erros as $erro) : ?>
                                            <li><?= htmlspecialchars($erro) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($erro_sistema)) : ?>
                                <div class="alert alert-danger">
                                    <strong>Erro:</strong>
                                    <p><?= htmlspecialchars($erro_sistema) ?></p>
                                </div>
                            <?php endif; ?>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    window.addEventListener('load', function() {
        const nome = document.getElementById('texto_nome');

        if (nome && nome.value.includes('@')) {
            nome.value = '';
        }
    });
</script>

<?php include '../../includes/footer.php'; ?>