<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
if (substr($_SERVER["REQUEST_URI"], -11) == "readcfg.php") {
    header("Location:./");
};
// read config

$iphost = explode('!', $data[$session][1])[1];
$userhost = explode('@|@', $data[$session][2])[1];
$passwdhost = explode('#|#', $data[$session][3])[1];
$hotspotname = explode('%', $data[$session][4])[1];
$dnsname = explode('^', $data[$session][5])[1];
$currency = explode('&', $data[$session][6])[1];
$areload = explode('*', $data[$session][7])[1];
$iface = explode('(', $data[$session][8])[1];
$maxtx = explode(')', $data[$session][9])[1];
$maxrx = explode('=', $data[$session][10])[1];
$sesname = explode('+', $data[$session][10])[1];
$useradm = explode('<|<', $data['mikhmon'][1])[1];
$passadm = explode('>|>', $data['mikhmon'][2])[1];
$livereport = explode('@!@', $data[$session][11])[1];


$cekindo['indo'] = array(
    'RP', 'Rp', 'rp', 'IDR', 'idr', 'RP.', 'Rp.', 'rp.', 'IDR.', 'idr.',
);

