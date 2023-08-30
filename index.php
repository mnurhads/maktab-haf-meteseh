<?php
session_start();
require_once 'app/control.php';
$log = new Model();

$coor        = $log->getCoor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maktab HAF Meteseh 2023</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $log->baseUrl(); ?>/assets/img/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <a href="<?= $log->baseUrl(); ?>/assets/img/peta-maktab.jpg" target="_blank" class="btn btn-outline-warning my-2 my-sm-0">Peta Offline Maktab</a>
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
                    <a href="#peta-maktab" class="btn btn-warning"><b class="text-white">Lihat Peta Maktab</b></a>
                    <a href="#informasi" class="btn btn-warning"><b class="text-white">Informasi</b></a>
                </p>
            </div>
        </div>
    </div>
    <!-- modal informasi -->
    <div id="informasi" class="modal">
        <div class="modal__content">
            <h5>Bantuan Informasi</h5>
            <hr>
            <p style="font-size:0.9rem;">Hubungi Koordinator Sektor / Pos Berikut untuk Mendapatkan Bantuan</p>
            <?php foreach($coor as $c) : ?>
            <div class="card">
                <a href="https://api.whatsapp.com/send?phone=<?= $c['no_telp'] ?>" target="_blank" class="card-block stretched-link text-decoration-none text-hitam">
                    <div class="card-header">
                            <p class="card-text">
                                <span class="chip warning-chip">Sektor <?= $c['sektor']; ?></span>
                                <b><?= $c['nama']; ?></b>
                                (+<?= $log->phone_number_format($c['no_telp']); ?>)
                            </p>
                    </div>
                </a>
            </div><br>
            <?php endforeach; ?>
            <div class="modal__footer">
                <p style="font-size:0.7rem;">
                    <svg style="width: 13px;" aria-hidden="true" class="mr-2 h-6 w-6" focusable="false" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg> 
                    Data maktab yang ditampilkan adalah data yang sudah melakukan pendaftaran melalui contact person dimasa pendaftaran
                </p>
            </div>
            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
    <!-- end modal -->
    <!-- Modal maktab peta -->
    <div id="peta-maktab" class="modal">
        <div class="modal__content_set">
            <h5>Peta Maktab</h5>
            <hr>
            <p style="font-size:0.9rem;">Informasi Peta Maktab</p>
            <div class="card">
                <iframe src="https://www.google.com/maps/d/embed?mid=1NMFczG5QZb4xm2FLJR2iqvmPaH3uI_8&ehbc=2E312F" width="640" height="480"></iframe>
            </div><br>
            <div class="modal__footer">
                <p style="font-size:0.7rem;">
                    <svg style="width: 13px;" aria-hidden="true" class="mr-2 h-6 w-6" focusable="false" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg> 
                    Peta Maktab ini disesuaikan dengan data informasi maktab yang sudah didaftarkan disitem
                </p>
            </div>
            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
    <!-- End -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
</html>