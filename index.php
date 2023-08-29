<?php
session_start();
require_once 'app/control.php';
$log = new Model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maktab HAF Meteseh 2023</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $log->baseUrl(); ?>/assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/custom.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #f9f9f9;">
        <div class="container-fluid">
        <a class="navbar-brand" href="">
            <img src="assets/img/khidmah.png" alt="Bootstrap" width="50px" height="50px">
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
        <div class="jumbotron">
            <center>
                <img src="assets/img/khidmah.png" alt="Al-khidmah" width="150px" height="140px">
                <h2 style="font-size: 2rem; line-height: 1;">Temukan Maktab Anda</h2><br>
                <span class="text-gray-500">Cari berdasarkan <b>Kota</b>, <b>Kecamatan</b> yang digunakan saat pendaftaran maktab</span>
            </center>
        </div>
        <div class="row">
            <div class="main">
                <!-- Another variation with a button -->
                <form action="maktab" method="GET">
                    <div class="input-group">
                        <input type="text" name="pencarian" required oninvalid="this.setCustomValidity('Nama Kota/Kecamatan tidak boleh kosong')" oninput="setCustomValidity('')" class="form-control" placeholder="Kota, Kecamatan">
                        <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                </form><br>
                <p>
                    <button class="btn btn-warning">Lihat Peta Maktab</button>
                    <button class="btn btn-warning">Informasi</button>
                </p>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>