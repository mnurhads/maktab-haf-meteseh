<?php
require_once '../config.php';
$conn = new connection();

$pencarian = $_GET['id'];

$querys = $conn->query("SELECT id, nama FROM koordinators WHERE id = '$pencarian'");
if(mysqli_num_rows($querys) > 0) {
    $query  = $querys->fetch_assoc();
    $koordi = array(
        'id'        => $query['id'],
        'nama'      => $query['nama'],
    );
} else {
    $koordi = array(
        'id'        => null,
        'nama'      => null
    );
}

echo json_encode($koordi);

?>