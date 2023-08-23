<?php
session_start();
require_once 'app/control.php';
$log = new Model();

//print_r($dataMaktab); exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maktab HAF Meteseh 2023</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $log->baseUrl(); ?>/assets/img/favicon.ico">
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/custom.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm fixed-top" style="background-color: #f9f9f9;">
        <div class="container-fluid">
        <a class="navbar-brand" href="/maktab-haf">
            <img src="assets/img/khidmah.png" alt="Bootstrap" width="60px" height="50px">
            <span><b>HAF Meteseh 2023</b></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="#" class="btn btn-outline-warning my-2 my-sm-0">Peta Maktab</a>
        </div>
    </nav>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form action="maktab" method="GET">
                    <div class="input-group">
                        <input type="text" required oninvalid="this.setCustomValidity('Nama Kota/Kecamatan tidak boleh kosong')" oninput="setCustomValidity('')" name="pencarian" class="form-control" placeholder="Kota, Kecamatan">
                        <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
            <br><br>
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><b>Kota <?= ucfirst($_GET['pencarian']); ?></b></h6>
                    <?php if($_GET['pencarian']) {
                        $cari = $_GET['pencarian'];
                        $dataMaktab = $log->searchMaktab($cari);
                        
                        if(count($dataMaktab) >= 1) {
                        foreach($dataMaktab as $maktab) : ?>
                            <hr>
                            <p class="card-text">
                                <b>Asal Rombongan:</b> <?= $maktab['asal_rombongan']; ?><br>
                                <b>Ketua Rombongan:</b> <?= $maktab['ketua'] ?><br>
                                <b>Tuan Rumah:</b> <?= $maktab['tuan_rumah'] ?><br>
                                <b>Kontak Rumah:</b> <?= $maktab['kontak_rumah'] ?><br>
                                <b>Alamat Maktab:</b> <?= $maktab['alamat_maktab'] ?>
                            </p>
                            <a disabled class="btn btn-primary">SEKTOR <?= $maktab['sektor'] ?></a>
                            <a href="https://api.whatsapp.com/send?phone=<?= $maktab['no_telp'] ?>" target="_blank" class="btn btn-success"><span class="fa fa-whatsapp"></span> Koordinator Sektor</a>
                        <?php endforeach; }else{ ?>
                        <hr>
                        <p class="card-text">
                            <b align="center" style="color: red;">Data Maktab yang Anda Masukkan Tidak Tersedia</b>
                        </p>
                    <?php }} else {?>
                        <hr>
                        <p class="card-text">
                            <b align="center" style="color: red;">Pencarian Data Maktab yang Anda Masukkan Tidak Tersedia</b>
                        </p>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>