<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $pageTitle; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php if (isset($artikel)) : ?>
        <meta name="description" content="<?php $short = str_replace('&nbsp;', " ", $artikel['artikel_text']);
                                            $fixed_short = substr(strip_tags($short), 0, 100) . '...';
                                            echo $fixed_short; ?>">
        <link rel="canonical" href="<?= base_url('artikel/' . $artikel['slug']); ?>">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?= $artikel['nama_artikel']; ?>">
        <meta property="og:description" content="<?php $short = str_replace('&nbsp;', " ", $artikel['artikel_text']);
                                                    $fixed_short = substr(strip_tags($short), 0, 100) . '...';
                                                    echo $fixed_short; ?>">
        <meta property="og:url" content="<?= base_url('artikel/' . $artikel['slug']); ?>">
        <meta property="og:site_name" content="Umrotix Blog">
        <meta property="article:publisher" content="https://facebook.com/umrotix/">
        <meta property="article:tag" content="Umroh">
        <meta property="article:section" content="<?php $kategori = $this->db->get_where('kategori', ['id' => $artikel['kategori_id']])->row_array();
                                                    echo $kategori['kategori']; ?>">
        <meta property="og:image" content="<?= base_url('assets/content-img/' . $artikel['image']) ?>">
        <meta property="og:image:secure_url" content="<?= base_url('assets/content-img/' . $artikel['image']) ?>">
        <meta property="og:image:width" content="662">
        <meta property="og:image:height" content="441">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:description" content="<?php $short = str_replace('&nbsp;', " ", $artikel['artikel_text']);
                                                    $fixed_short = substr(strip_tags($short), 0, 100) . '...';
                                                    echo $fixed_short; ?>">
        <meta name="twitter:title" content="<?= $artikel['nama_artikel']; ?>">
        <meta name="twitter:site" content="@umrotix">
        <meta name="twitter:image" content="<?= base_url('assets/content-img/' . $artikel['image']) ?>">
        <meta name="twitter:creator" content="@umrotix">
    <?php else : ?>
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
    <?php endif; ?>

    <link rel="shortcut icon" href="<?= base_url(); ?>favicon.png" type="text/css">
    <link rel="stylesheet" href="<?= base_url('vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css');  ?>" rel="stylesheet" type="text/css">
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