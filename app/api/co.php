<?php
require_once '../config.php';
$conn = new connection();

$pencarian = $_POST['pencarian'];

$querys = $conn->query("SELECT m.id, m.asal_rombongan, m.kota, m.ketua, s.sektor, k.nama, k.no_telp, m.tuan_rumah, m.kontak_rumah, m.alamat_maktab FROM `maktabs` AS m INNER JOIN sektors AS s ON m.sektor_id = s.id INNER JOIN koordinators AS k ON m.koordinator_id = k.id WHERE m.asal_rombongan LIKE '%$pencarian' OR m.kota LIKE '%$pencarian';");
if(mysqli_num_rows($querys) > 0) {
    $query  = $querys->fetch_assoc();
    $koordi = array(
        'id'        => $query['id'],
        'rombongan' => $query['asal_rombongan'],
        'kota'      => $query['kota'],
        'ketua'     => $query['ketua'],
        'tuanRumah' => $query['tuan_rumah'],
        'kontakTuanRumah' => $query['kontak_rumah'],
        'alamat'    => $query['alamat_maktab'],
        'namaKoordinator'      => $query['nama'],
        'notelpKoordinator'    => $query['no_telp'],
        'sektor'    => $query['sektor']
    );
} else {
    $koordi = array(
        'id'        => null,
        'rombongan' => null,
        'kota'      => null,
        'ketua'     => null,
        'tuanRumah' => null,
        'kontakTuanRumah'   => null,
        'alamat'            => null,
        'namaKoordinator'   => null,
        'notelpKoordinator' => null,
        'sektor'            => null,
    );
}

echo json_encode($koordi);

?>