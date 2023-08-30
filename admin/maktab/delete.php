<?php
session_start();
require_once '../../app/control.php';
$log  = new Model();

$banks = $log->deleteMaktab($_GET["kode"]);
?>