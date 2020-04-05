<!-- Navbar Umrotix -->
<div class="container">
    <a class="navbar-brand d-none d-md-block text-center" href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo-umrotix.png'); ?>" alt="Logo Umrotix"></a>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="<?= base_url(); ?>" class="d-xs-block d-sm-block d-md-none mx-auto"><img class="logoMini" src="<?= base_url('assets/img/logo-umrotix.png'); ?>" alt="Logo Umrotix"></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto mr-5">
                <a class="nav-item nav-link mx-md-2" href="<?= base_url(); ?>">Home</a>
                <a class="nav-item nav-link mx-md-2" href="#">Stories</a>
                <a class="nav-item nav-link mx-md-2" href="#">Company</a>
                <a class="nav-item nav-link mx-md-2" href="#">Community</a>
                <a class="nav-item nav-link mx-md-2" href="#">Testimony</a>
                <a class="nav-item nav-link mx-md-2" href="#">About</a>
            </div>

            <!-- Mobile button -->
            <form class="form-inline d-sm-block d-md-none" action="" method="post">
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
<!-- End of Navbar Umrotix -->

<!-- Content -->
<div class="container mt-3 mt-md-1 content-blog">
    <div class="row">
        <!-- Left Content -->
        <div class="col-md-8 col-lg-8 mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="article-title">
                        <h2 class="upper-title"><?= $artikel['nama_artikel'] ?></h2>
                    </div>
                    <div class="article-img">
                        <img src="<?= base_url('assets/content-img/' . $artikel['image']) ?>" alt="<?= $artikel['image'] ?>">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 col-lg-12">
                    <div class="article-content pl-1 pl-md-0">
                        <?php
                        $text = htmlspecialchars_decode($artikel['artikel_text']);
                        $fix_artikel = str_replace("&nbsp;", " ", $text);

                        echo $fix_artikel;
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col">
                    <h6>Dipost oleh : <?= $artikel['author'] ?></h6>
                    <h6>Pada tanggal : <?php $date = date('l, j F Y', strtotime($artikel['created_at']));
                                        echo $date; ?></h6>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 col-lg-4">
                    <div class="sosmed-share d-flex">
                        <img src="<?= base_url('assets/img/share-icon.png') ?>" alt="Share" class="share-icon">
                        <a href="#"><img src="<?= base_url('assets/img/fb-icon.png') ?>" alt="Facebook Share" class="fb-icon"></a>
                        <a href="#"><img src="<?= base_url('assets/img/twit-icon.png') ?>" alt="Twitter Share" class="twit-icon"></a>
                        <a href="#"><img src="<?= base_url('assets/img/ig-icon.png') ?>" alt="Instagram Share" class="ig-icon"></a>
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
                        <?php foreach ($artikel_popular as $pop) : ?>
                            <h6 class="content-link text-left text-md-center mt-3 ml-1 ml-md-0">
                                <a href="<?= base_url('artikel/' . $pop['slug']); ?>"><?= $pop['nama_artikel']; ?></a>
                            </h6>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="related-article-header mt-2">
                        <h5 class="related-article-title ">Related Article</h5>
                    </div>
                    <?php foreach ($artikel_related as $rel) : ?>
                        <div class="related-article">
                            <img src="<?= base_url('assets/content-img/' . $rel['image']) ?>" alt="<?= $rel['image']; ?>" class="related-article-img mt-2">
                            <h6 class="article-title"><a href="<?= base_url('artikel/' . $rel['slug']) ?>"><?= $rel['nama_artikel'] ?></a></h6>
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
<footer class="section-footer mt-5 pb-3">
    <div class="container pt-5 pb-2">
        <div class="row justify-content-center mt-md-5">
            <div class="col-md-5 d-none d-md-block">
                <img src="<?= base_url('assets/img/umro.png'); ?>" alt="umro" class="img-footer">
            </div>
            <div class="col-md-4 text-center text-md-left">
                <h5>About Us</h5>
                <ul class="list-unstyled">
                    <li>PT. Umrotix Mitra Digital</li>
                    <li>Gedung Ariobimo Sentral, Block71 Lt. 8, Kuningan, Jakarta.</li>
                    <li>081292925696</li>
                </ul>
            </div>
            <div class="col-md-3 text-center text-md-left mt-3 mt-md-0">
                <h5>Our Social Media</h5>
                <div class="sosmed">
                    <a target="_blank" href="https://instagram.com/umrotix"><img src="<?= base_url('assets/img/ig.png'); ?>" alt="Instagram"></a>
                    <a target="_blank" href="https://facebook.com/umrotix"><img src="<?= base_url('assets/img/fb.png'); ?>" alt="Facebook"></a>
                    <a target="_blank" href="https://twitter.com/umrotix"><img src="<?= base_url('assets/img/twit.png'); ?>" alt="Twitter"></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UC5s2redp7wyvHImlxzAXBjg/featured"><img src="<?= base_url('assets/img/you.png'); ?>" alt="Youtube"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer-title mt-5 mt-md-0">
        <div class="row justify-content-center">
            <div class="col text-center">
                Made with &hearts; by Umrotix
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->