<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

$API->comm("/ip/hotspot/user/set", array(
	".id" => "$resethotspotuser", "limit-uptime" => "0", "comment" => ""
));
$API->comm("/ip/hotspot/user/reset-counters", array(
	".id" => "$resethotspotuser",
));

$getuname = $API->comm("/ip/hotspot/user/print", array(
	"?.id" => "$resethotspotuser",
));
$uname = $getuname[0]['name'];

$getsname = $API->comm("/system/scheduler/print", array(
	"?name" => "$uname",
));
$removesch = $getsname[0]['.id'];

$API->comm("/system/scheduler/remove", array(
	".id" => "$removesch",
));

echo "<script>window.location='./?hotspot-user=" . $resethotspotuser . "&session=" . $session . "'</script>";

?>
