<aside class="col-md-3 col-lg-2 bg-secondary text-white p-3 min-vh-100">
    <h4>Menu</h4>

    <nav>
        <?php if (isset($_SESSION['profile']) && $_SESSION['profile'] == 'admin') : ?>

            <a href="/Ficha%2009/private/views/clientes/lista.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-users me-2"></i> Clientes
            </a>

            <a href="/Ficha%2009/private/views/agendamento/agendamento.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-calendar-alt me-2"></i> Agendamento de treinos
            </a>

            <a href="/Ficha%2009/private/views/planos/plano_treino.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-dumbbell me-2"></i> Planos de Treino
            </a>

        <?php endif; ?>


        <?php if (isset($_SESSION['profile']) && $_SESSION['profile'] == 'agent') : ?>

            <a href="/Ficha%2009/private/views/clientes/lista.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-users me-2"></i> Clientes
            </a>

            <a href="/Ficha%2009/private/views/equipamentos/equipamentos.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-cogs me-2"></i> Equipamentos
            </a>

            <a href="/Ficha%2009/private/views/produtos-servicos/produtos_servicos.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-box-open me-2"></i> Produtos e Serviços
            </a>

        <?php endif; ?>
    </nav>
</aside>