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
                            <h6>Dipost oleh : <?php if ($artikel['author_id'] == 0) {
                                                    echo 'Umar';
                                                } else {
                                                    $author = $this->db->get_where('users', ['id' => $artikel['author_id']])->row_array();
                                                    echo $author['nama'];
                                                }
                                                ?></h6>
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
                    <form action="<?= base_url('home/cari') ?>" method="post">
                        <input type="text" class="form-control search-input" name="keyword" placeholder="Cari Artikel" aria-describedby="button-addon2">
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
                                        <a href="<?= base_url('artikel/' . $pop['slug']) ?>">
                                            <?php if (strlen($pop['nama_artikel']) > 30) {
                                                $fixed = substr($pop['nama_artikel'], 0, 30) . '...';
                                                echo $fixed;
                                            } else {
                                                echo $pop['nama_artikel'];
                                            }
                                            ?>
                                        </a>
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
                            <h6 class="related-article-title">
                                <a href="<?= base_url('artikel/' . $rtd['slug']); ?>">
                                    <?php if (strlen($rtd['nama_artikel']) > 30) {
                                        $fixed = substr($rtd['nama_artikel'], 0, 30) . '...';
                                        echo $fixed;
                                    } else {
                                        echo $rtd['nama_artikel'];
                                    }
                                    ?>
                                </a>
                            </h6>
                            <div class="related-article-date">
                                <p> <?php $date = date('d M Y', strtotime($rtd['created_at']));
                                    echo $date; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- End of Right Content -->
    </div>

</div>
<!-- End of Content -->