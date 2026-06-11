<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">
        <?php include '../../includes/sidebar.php'; ?>

        <main class="col-md-9 col-lg-10 p-4">
            <section>
                <h2>Avaliação de Condições de Saúde</h2>

                <p>
                    Utilize este formulário para selecionar as condições de saúde relevantes do cliente.
                    As informações escolhidas irão gerar uma recomendação personalizada para o plano de treino.
                </p>
            </section>

            <div class="form-wrapper">
                <h2>
                    <strong>
                        <i class="fa-solid fa-dumbbell"></i>
                        Avaliação de Condições de Saúde
                    </strong>
                </h2>

                <hr>

                <form oninput="avaliarCondicoes()">
                    <div>
                        <input type="checkbox" id="temProblemasCostas" name="condicao">
                        <label for="temProblemasCostas">Problemas de costas</label><br>

                        <input type="checkbox" id="estaGravida" name="condicao">
                        <label for="estaGravida">Grávida</label><br>

                        <input type="checkbox" id="temDiabetes" name="condicao">
                        <label for="temDiabetes">Diabético/a</label>
                    </div>

                    <div class="form-group">
                        <label>Recomendação:</label>
                        <div id="mensagem" class="alert text-center"></div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script src="/Ficha%2009/private/includes/js/funcoes.js"></script>

<?php include '../../includes/footer.php'; ?>