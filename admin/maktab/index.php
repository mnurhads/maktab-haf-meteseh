<?php
session_start();
require_once '../../app/control.php';
$log  = new Model();

$sektor = $log->getSektor();
$maktab = $log->getMaktab();

if(isset($_POST['maktab'])) {
    $maktab['asal']     = $_POST['asal'];
    $maktab['kota']     = $_POST['kota'];
    $maktab['ketua']    = $_POST['ketua'];
    $maktab['cp']       = $_POST['cp'];
    $maktab['sektorId'] = $_POST['sektorId'];
    $maktab['coId']     = $_POST['coId'];
    $maktab['tuan']     = $_POST['tuan'];
    $maktab['kontak']   = $_POST['kontak'];
    $maktab['alamat']   = $_POST['alamat'];
    $log->insertMaktab($maktab);
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Koordinator | Info Maktab HAF</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $log->baseUrl(); ?>/assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/normalize.css">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <?php include_once '../layout/sidebar.php'; ?>
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Data Koordinator</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
      <div class="row">
          <form action="" method="post">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-element-list">
                      <div class="basic-tb-hd">
                          <h2>Tambah Data maktab</h2>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-support"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="asal" class="form-control" placeholder="Asal Rombongan">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-mail"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="kota" class="form-control" placeholder="Kota">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-mail"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="ketua" class="form-control" placeholder="Ketua Rombongan">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-mail"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="cp" class="form-control" placeholder="CP Ketua">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-map"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <select name="sektorId" class="form-control" id="sektorId" onchange="warehouse()">
                                          <option value="">--Pilih Sektor--</option>
                                          <?php foreach($sektor as $sektor) : ?>
                                          <option value="<?= $sektor['id']; ?>"><b>SEKTOR <?= $sektor['sektor']; ?></b></option>
                                          <?php endforeach ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-next"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" id="koorNama" readonly class="form-control" required placeholder="Koordinator">
                                      <input type="hidden" id="koorId" name="coId">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-support"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="tuan" class="form-control" placeholder="Tuan Rumah">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-mail"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="kontak" class="form-control" placeholder="Kontak Tuan Rumah">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                              <div class="form-group ic-cmp-int">
                                  <div class="form-ic-cmp">
                                      <i class="notika-icon notika-mail"></i>
                                  </div>
                                  <div class="nk-int-st">
                                      <input type="text" name="alamat" class="form-control" placeholder="Alamat Maktab">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row" align="right">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <button type="submit" class="btn btn-primary" name="maktab"><span class="fa fa-save"></span> Simpan</button>
                        </div>
                      </div>
                  </div>
              </div>
          </form>
      </div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>List Koordinator</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Asal, Kota</th>
                                        <th>Sektor</th>
                                        <th>Koor Maktab(WA)</th>
                                        <th>Ketua</th>
                                        <th>CP(WA)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($maktab as $co) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $co['asal'].','.$co['kota']; ?></td>
                                        <td><b>SEKTOR <?= $co['sektor']; ?></b></td>
                                        <td><?= $co['nama'].'('.$co['no_telp'].')'; ?></td>
                                        <td><?= $co['ketua']; ?></td>
                                        <td><?= $co['tuan'].'('.$co['kontak'].')'; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <?php include_once '../layout/footer.php'; ?>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/counterup/waypoints.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/flot/jquery.flot.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/knob/jquery.knob.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/knob/jquery.appear.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/wave/waves.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/main.js"></script>
    <script type="text/javascript">
        function warehouse(){
            var custId = $("#sektorId").val();
            console.log(custId);
            $.ajax({
                type: 'get',
                url: "<?= $log->baseUrl() ?>/app/api/co",
                data: "id="+custId,
                dataType: "json",
            }).success(function (data) {
                console.log(data);
                if(data.nama != null) {
                  $('#koorNama').val(data.nama);
                  $('#koorId').val(data.id);
                } else {
                  $('#koorNama').val(data.nama);
                  $('#koorId').val(data.id);
                }
            });
        }
    </script>
</body>
</html>