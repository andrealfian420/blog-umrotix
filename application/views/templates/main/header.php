<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url(); ?>favicon.png" type="text/css">
    <title><?= $pageTitle; ?></title>

    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/font-awesome/font-awesome.all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nunito&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar Umrotix -->
    <div class="header">
        <div class="container">
            <a class="navbar-brand d-none d-md-block text-center" href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo-umrotix@2x.png'); ?>" alt="Logo Umrotix"></a>
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="<?= base_url(); ?>" class="d-xs-block d-sm-block d-md-none mx-auto"><img class="logoMini" src="<?= base_url('assets/img/logo-umrotix@2x.png'); ?>" alt="Logo Umrotix"></a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto mr-5">
                        <a class="nav-item nav-link mx-md-2" href="<?= base_url(); ?>">Beranda</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Kisah Agen</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Testimoni</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Perusahaan</a>
                        <a class="nav-item nav-link mx-md-2" href="#">Tentang</a>
                    </div>

                    <!-- Mobile button -->
                    <form class="form-inline d-sm-block d-md-none" action="" method="post">
                        <div class="input-group mb-3">
                            <form action="" method="post">
                                <input type="text" class="form-control" name="keyword" placeholder="Cari artikel..">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <!-- End of Navbar Umrotix -->