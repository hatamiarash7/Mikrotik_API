<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

$API->comm("/ip/hotspot/user/set", array(
	".id" => "$enablehotspotuser",
	"disabled" => "no",
));
if ($_SESSION['ubp'] != "") {
	echo "<script>window.location='./?hotspot=users&profile=" . $_SESSION['ubp'] . "&session=" . $session . "'</script>";
} elseif ($_SESSION['ubc'] != "") {
	echo "<script>window.location='./?hotspot=users&comment=" . $_SESSION['ubc'] . "&session=" . $session . "'</script>";
} else {
	echo "<script>window.location='./?hotspot=users&profile=all&session=" . $session . "'</script>";
}


?>
