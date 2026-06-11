<?php
require_once 'includes/funcoes.php';

redirect_if_not_logged('../public/login.php');
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include 'includes/sidebar.php'; ?>

        <main class="col-md-9 col-lg-10 p-4">
            <section>
                <h2><?php echo APP_NAME; ?></h2>
                <p>Escolhe uma opção no menu lateral para continuar.</p>
            </section>
        </main>

    </div>
</div>

<?php include 'includes/footer.php'; ?>