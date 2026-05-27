<?php include '../../includes/header.php'; ?> 
<?php include '../../includes/nav.php'; ?> 

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-center mt-4">
                <div class="card w-100 shadow rounded" style="max-width: 1200px;">
                    <div class="card-body">
                        <h2 class="mb-4">
                            <strong><i class="fa-solid fa-users me-2"></i> Inserir novo cliente</strong>
                        </h2>
                        <hr>

                        <form action="#" method="post" novalidate>
                            <!-- Linha 1 -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="texto_nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="texto_nome" name="nome_cliente"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="texto_dnasc" class="form-label">Data de nascimento</label>
                                    <input type="date" class="form-control" id="texto_dnasc" name="dnasc_cliente"
                                        required>
                                </div>
                            </div>

                            <!-- Linha 2 -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="texto_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="texto_email" name="email_cliente"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="texto_telefone" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="texto_telefone"
                                        name="telefone_cliente" required>
                                </div>
                            </div>

                            <!-- Linha 3 -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_morada" class="form-label">Morada</label>
                                    <input type="text" class="form-control" id="texto_morada" name="morada_cliente"
                                        required>
                                </div>
                            </div>

                            <!-- Linha 4 -->
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="texto_estcivil" class="form-label">Estado Civil</label>
                                    <select class="form-select" id="texto_estcivil" name="estaciv_cliente" required>
                                        <option value="" selected disabled>Escolha uma opção</option>
                                        <option value="solt">Solteiro</option>
                                        <option value="casd">Casado</option>
                                        <option value="ufat">União de Facto</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="texto_SSaude" class="form-label">Sistema de Saúde</label>
                                    <input type="text" class="form-control" id="texto_SSaude" name="campo_opcao"
                                        list="sistemasaude">
                                    <datalist id="sistemasaude">
                                        <option value="SNS">
                                        <option value="ADSE">
                                        <option value="SMAS">
                                        <option value="CTT">
                                        <option value="PSP">
                                    </datalist>
                                </div>

                                <div class="col-md-4">
                                    <label for="profissao" class="form-label">Profissão</label>
                                    <input type="text" class="form-control" id="profissao" name="profissao_cliente">
                                </div>
                            </div>

                            <!-- Linha 5 -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label d-block">Género</label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radio_gender"
                                            id="radio_m" value="m">
                                        <label class="form-check-label" for="radio_m">Masculino</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radio_gender"
                                            id="radio_f" value="f">
                                        <label class="form-check-label" for="radio_f">Feminino</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Botões -->
                            <div class="d-flex justify-content-end gap-2 mb-4">
                                <a href="lista.php" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar
                                </button>
                            </div>

                            <!-- Área de erros -->
                            <div class="alert alert-danger text-center" role="alert">
                                • Erro
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </main>

        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?> 
