<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Kategori</title>
</head>

<body>
    <!-- Validation errors -->
    <?php if (validation_errors()) {
        echo validation_errors();
    } ?>

    <!-- Success Insert -->
    <?php if ($this->session->flashdata('successInsert')) {
        echo $this->session->flashdata('successInsert');
    } ?>

    <form action="<?= base_url('posting_temp/kategori'); ?>" method="post">
        <label for="kategori-title">Nama Kategori</label>
        <input type="text" name="kategori" id="kategori-title">
        <button type="submit">Simpan</button>
    </form>
    <button style="margin-top:20px"><a href="<?= base_url('posting_temp'); ?>" style="text-decoration: none;">Kembali</a></button>
</body>

</html>