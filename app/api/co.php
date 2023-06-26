<?php
require_once '../config.php';
$conn = new connection();

$id = $_GET['id'];

$querys = $conn->query("SELECT * FROM koordinators WHERE sektor_id = '$id'");
if(mysqli_num_rows($querys) > 0) {
    $query  = $querys->fetch_assoc();
    $koordi = array(
        'id'        => $query['id'],
        'nama'      => $query['nama'],
        'notelp'    => $query['no_telp']
    );
} else {
    $koordi = array(
        'id'        => null,
        'nama'      => null,
        'notelp'    => null
    );
}

echo json_encode($koordi);

?>