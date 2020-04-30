<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $pageTitle; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Beragam info terkini tentang umroh di umrotix, serta tips dan info-info menarik tentang kehidupan sehari-hari">
    <link rel="canonical" href="<?= base_url(); ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $pageTitle; ?>">
    <meta property="og:description" content="Beragam info terkini tentang umroh di umrotix, serta tips dan info-info menarik tentang kehidupan sehari-hari">
    <meta property="og:url" content="<?= base_url(); ?>">
    <meta property="og:site_name" content="Umrotix Blog">
    <meta property="og:image" content="<?= base_url('assets/img/logo-umrotix@2x.png') ?>">
    <meta property="og:image:secure_url" content="<?= base_url('assets/img/logo-umrotix@2x.png') ?>">
    <meta property="og:image:width" content="786">
    <meta property="og:image:height" content="242">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="Beragam info terkini tentang umroh di umrotix, serta tips dan info-info menarik tentang kehidupan sehari-hari">
    <meta name="twitter:title" content="<?= $pageTitle; ?>">
    <meta name="twitter:site" content="@umrotix">
    <meta name="twitter:image" content="<?= base_url('assets/img/logo-umrotix@2x.png') ?>">
    <meta name="twitter:creator" content="@umrotix">

    <link rel="shortcut icon" href="<?= base_url(); ?>favicon.png" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css');  ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <style>
        .page-cari {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .content-blog {
            flex: 1;
        }
    </style>
</head>

<body class="page-cari">

    <!-- Navbar Umrotix -->
    <div class="header">
        <div class="container">
            <a class="navbar-brand d-none d-md-block text-center" href="https://umrotix.com/"><img src="<?= base_url('assets/img/logo-umrotix@2x.png'); ?>" alt="Logo Umrotix"></a>
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="https://umrotix.com/" class="d-xs-block d-sm-block d-md-none mx-auto"><img class="logoMini" src="<?= base_url('assets/img/logo-umrotix@2x.png'); ?>" alt="Logo Umrotix"></a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav mx-auto mr-5">
                        <li class="nav-item">
                            <a class="nav-item nav-link mx-md-2 menu" href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link mx-md-2 menu" href="#">Berita</a>
                        </li>
                        <li class="nav-item dropdown menu-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Liputan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Agen</a>
                                <a class="dropdown-item" href="#">Travel</a>
                                <a class="dropdown-item" href="#">Jamaah</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link mx-md-2 menu" href="#">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link mx-md-2 menu" href="#">Wisata Religi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link mx-md-2 menu" href="#">Bisnis Syariah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link mx-md-2 menu" href="#">Hikmah</a>
                        </li>
                    </ul>

                    <!-- Mobile button -->
                    <form class="form-inline d-sm-block d-md-none" action="<?= base_url('home/cari') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keyword" placeholder="Cari artikel..">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <!-- End of Navbar Umrotix -->