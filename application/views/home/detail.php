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

<!-- Content -->
<div class="container mt-3 mt-md-1 content-blog">
    <div class="row">
        <!-- Left Content -->
        <div class="col-md-8 col-lg-8 mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="article-title">
                        <h2 class="upper-title"><?= $artikel['nama_artikel']; ?></h2>
                    </div>
                    <div class="article-img">
                        <img src="<?= base_url('assets/content-img/' . $artikel['image']); ?>" alt="<?= $artikel['image'] ?>">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 col-lg-12">
                    <div class="article-content pl-1 pl-md-0">
                        <?php $post = htmlspecialchars_decode($artikel['artikel_text']);
                        $fixed_post = str_replace("&nbsp;", " ", $post);
                        echo $fixed_post;
                        ?>
                        <div class="content-info">
                            <h6>Dipost oleh : <?= $artikel['author']; ?></h6>
                            <h6>Pada tanggal : <?php $date = date('d M Y', strtotime($artikel['created_at']));
                                                echo $date; ?>
                            </h6>
                            <h6>Post dibaca sebanyak : <?= $artikel['view_count'] ?> kali</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 col-lg-4">
                    <div class="sosmed-share d-flex">
                        <!-- <span>
                            <!-- <i class="fas fa-share-square share-icon"></i> -->
                        <!-- </span> -->
                        <img src="<?= base_url('assets/img/share-icon@2x.png') ?>" alt="" class="share-icon">
                        <a href="#"><i class="fab fa-facebook-square fb-icon"></i></a>
                        <a href="#"><i class="fab fa-twitter-square twit-icon"></i></a>
                        <a href="#"><i class="fab fa-instagram ig-icon"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Left Content -->
        <!-- Right Content -->
        <div class="col-md-4 col-lg-4 mt-3">
            <div class="row d-none d-md-block">
                <div class="col search-bar">
                    <form action="" method="post">
                        <input type="text" class="form-control search-input" placeholder="Cari Artikel" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-search" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="popular-content mt-2 mt-md-0">
                        <h5 class="popular-content-title">Terpopuler</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($artikel_populer as $pop) : ?>
                                <?php if ($pop['view_count'] == 0) {
                                    continue;
                                } ?>
                                <li>
                                    <h6 class="content-link text-left mt-3 ml-1 ml-md-0">
                                        <a href="<?= base_url('artikel/' . $pop['slug']) ?>"><?= $pop['nama_artikel'] ?></a>
                                    </h6>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="related-article-header mt-2">
                        <h5 class="related-article-title ">Artikel Terkait</h5>
                    </div>
                    <?php foreach ($artikel_terkait as $rtd) : ?>

                        <div class="related-article">
                            <img src="<?= base_url('assets/content-img/' . $rtd['image']); ?>" alt="<?= $rtd['image']; ?>" class="related-article-img mt-2">
                            <div class="related-overlay"></div>
                            <h5 class="related-article-title">
                                <a href="<?= base_url('artikel/' . $rtd['slug']); ?>"><?= $rtd['nama_artikel']; ?></a>
                            </h5>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- End of Right Content -->
    </div>

</div>
<!-- End of Content -->

<!-- Footer -->
<footer class="section-footer mt-5">

    <div class="container-fluid mt-3 mt-lg-0">
        <div class="row">
            <div class="col-lg-3 text-center copyright">
                &copy; 2019 - 2020, PT Umrotix Mitra Digital
            </div>
            <div class="col-lg-7 footer-link">
                <a href="https://umrotix.com/">Tentang</a>
                <a href="https://umrotix.com/">Paket Umroh</a>
                <a href="https://umrotix.com/">Cara Pembayaran</a>
                <a href="https://umrotix.com/">FAQ</a>
                <a href="https://umrotix.com/">Syarat dan Ketentuan</a>
                <a href="https://umrotix.com/">Kebijakan Privasi</a>
            </div>
            <div class="col-lg-2 sosmed-umrotix">
                <a href="https://facebook.com/umrotix/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/umrotix" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/umrotix/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/umrotix/" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.youtube.com/channel/UC5s2redp7wyvHImlxzAXBjg" target="_blank"><i class="fab fa-youtube"></i></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->