<?php include '../private/includes/header.php'; ?>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">

        <div class="col-10 col-md-6 col-lg-4">

            <div class="card p-4">

                <div class="d-flex align-items-center justify-content-center mb-4">

                    <img src="/Ficha%2009/private/assets/img/gym125.png"
                         class="img-fluid me-3"
                         alt="Logo">

                    <h2>
                        <strong><?php echo APP_NAME; ?></strong>
                    </h2>

                </div>

                <form action="../private/index.php" method="post">

                    <div class="mb-3">
                        <label class="form-label">
                            Utilizador
                        </label>

                        <input type="email"
                               class="form-control"
                               name="text_username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               class="form-control"
                               name="text_password">
                    </div>

                    <div class="text-center">

                        <button type="submit"
                                class="btn btn-secondary px-4">

                            Entrar

                            <i class="fa-solid fa-right-to-bracket ms-2"></i>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php include '../private/includes/footer.php'; ?>