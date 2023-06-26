<?php
error_reporting(0);
require_once '../app/control.php';
$log = new Model();

$close = $log->logoutWeb();
?>