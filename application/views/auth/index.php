    <div class="container">
        <div class="row mt-4 top-img-container">
            <div class="col-md-6 col-lg-6 d-block text-center text-lg-left">
                <div class="left-logo">
                    <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo-umrotix.png'); ?>" alt="Logo Umrotix" class="left-logo-img"></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 d-none d-lg-flex flex-row-reverse">
                <div class="right-icon">
                    <img src="<?= base_url('assets/img/blue-circle.png'); ?>" alt="Blue Circle" class="right-icon-img">
                </div>
            </div>
        </div>
        <div class="row login-container">
            <div class="col text-center">
                <div class="login-title">
                    <h2>Login</h2>
                </div>

                <!-- Failed login alert -->
                <?php if ($this->session->flashdata('loginFailed')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show d-inline-block mt-2 mb-0" role="alert">
                        We're sorry! the email is <strong>not registered</strong> in our server!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Wrong password alert -->
                <?php if ($this->session->flashdata('wrongPassword')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show d-inline-block mt-2 mb-0" role="alert">
                        The password is <strong>invalid!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Validation errors -->
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger alert-dismissible fade show d-inline-block mt-2 mb-0" role="alert">
                        <?= validation_errors(); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="login-form mt-4">
                    <form action="<?= base_url('auth'); ?>" method="post">
                        <input type="email" name="email" placeholder="Email" class="text-center">
                        <br>
                        <input type="password" name="password" placeholder="Password" class="text-center mt-3">
                        <br>
                        <button type="submit" class="btnLogin mt-3">Masuk</button>
                    </form>
                </div>
                <h6 class="text-center mt-4"><a href="">Lupa password kamu?</a></h6>
            </div>
        </div>
        <div class="row lower-img-container d-none d-lg-flex mt-4">
            <div class="col-md-6 col-lg-6">
                <div class="left-item">
                    <img src="<?= base_url('assets/img/umrohay.png'); ?>" alt="Umar Rohaya" class="left-image">
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="right-item">
                    <img src="<?= base_url('assets/img/welcome.png'); ?>" alt="Welcome" class="right-image">
                </div>
            </div>
        </div>
    </div>