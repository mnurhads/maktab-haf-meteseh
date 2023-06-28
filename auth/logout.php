<?php
session_start();
require_once '../app/control.php';
$log = new Model();

$close = $log->logoutWeb($_SESSION['username']);
?>