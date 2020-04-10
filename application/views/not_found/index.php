<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman tidak ditemukan</title>

    <link rel="stylesheet" href="<?= base_url('/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nunito&display=swap" rel="stylesheet">
</head>

<body>

    <!-- begin -->
    <div class="container nofound-container">
        <!-- Clouds -->
        <div class="row d-none d-md-block">
            <div class="col-md-12 col-lg">
                <div class="clouds">
                    <img src="<?= base_url('assets/img/clouds@2x.png'); ?>" alt="Clouds" class="clouds-img">
                </div>
            </div>
        </div>
        <!-- End of Clouds -->
        <!-- Main -->
        <div class="row">
            <div class="col-md col-lg">
                <div class="message">
                    <img src="<?= base_url('assets/img/sorry@2x.png'); ?>" alt="We're sorry!" class="message-img d-block mx-auto">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-8 col-lg-8">
                <div class="return-link">
                    <h4 class="return-message"><a href="<?= base_url(); ?>">-> Yuk, kembali ke
                            homepage!</a></h4>
                </div>
            </div>
        </div>
        <!-- End of Main -->
    </div>
    <!-- end -->

    <!-- Script -->
    <script src="<?= base_url('/vendor/jquery/jquery-3.4.1.min.js"'); ?>"></script>
    <script src="<?= base_url('/vendor/popper/popper.min.js'); ?>"></script>
    <script src="<?= base_url('/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>

</html>