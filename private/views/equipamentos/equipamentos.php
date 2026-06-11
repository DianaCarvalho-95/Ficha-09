<?php
// --------------------------------------------------------------------
// SEGURANÇA: Proteção de acesso à página de edição
// Este ficheiro deve ser acedido apenas por utilizadores autenticados.
// Caso não exista sessão iniciada, o utilizador será redirecionado para o login.
// --------------------------------------------------------------------
require_once __DIR__ . '/../../includes/funcoes.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado
?> 
<?php include '../../includes/header.php'; ?>
 <?php include '../../includes/nav.php'; ?>
 
 <?php include '../../includes/sidebar.php'; ?>
            <!-- Conteúdo Principal -->
            <main class="col-md-9 col-lg-10 p-4">
                <section>
                    <h2>Equipamentos</h2>
                    <p>Aqui pode consultar todos os equipamentos disponíveis no nosso ginásio!</p>
                </section>
            </main>
        </div>
    </div>

 <?php include '../../includes/footer.php'; ?>