<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
if ($removehotspotusers != "") {
	$uids = explode("~", $removehotspotusers);

	$nuids = count($uids);

	for ($i = 0; $i < $nuids; $i++) {

		$getuname = $API->comm("/ip/hotspot/user/print", array(
			"?.id" => "$uids[$i]",
		));

		$name = $getuname[0]['name'];

		$getscr = $API->comm("/system/script/print", array(
			"?name" => "$name",
		));

		$scr = $getscr[0]['.id'];

		$getsch = $API->comm("/system/scheduler/print", array(
			"?name" => "$name",
		));

		$sch = $getsch[0]['.id'];

		$API->comm("/system/script/remove", array(
			".id" => "$scr",
		));

		$API->comm("/system/scheduler/remove", array(
			".id" => "$sch",
		));

		$API->comm("/ip/hotspot/user/remove", array(
			".id" => "$uids[$i]",
		));

	}

	if ($_SESSION['ubp'] != "") {
		echo "<script>window.location='./?hotspot=users&profile=" . $_SESSION['ubp'] . "&session=" . $session . "'</script>";
	} elseif ($_SESSION['ubc'] != "") {
		echo "<script>window.location='./?hotspot=users&comment=" . $_SESSION['ubc'] . "&session=" . $session . "'</script>";
	} else {
		echo "<script>window.location='./?hotspot=users&profile=all&session=" . $session . "'</script>";
	}


} else {
	$getuname = $API->comm("/ip/hotspot/user/print", array(
		"?.id" => "$removehotspotuser",
	));

	$name = $getuname[0]['name'];

	$getscr = $API->comm("/system/script/print", array(
		"?name" => "$name",
	));

	$scr = $getscr[0]['.id'];

	$getsch = $API->comm("/system/scheduler/print", array(
		"?name" => "$name",
	));

	$sch = $getsch[0]['.id'];

	$API->comm("/system/script/remove", array(
		".id" => "$scr",
	));

	$API->comm("/system/scheduler/remove", array(
		".id" => "$sch",
	));

	$API->comm("/ip/hotspot/user/remove", array(
		".id" => "$removehotspotuser",
	));


	if ($_SESSION['ubp'] != "") {
		echo "<script>window.location='./?hotspot=users&profile=" . $_SESSION['ubp'] . "&session=" . $session . "'</script>";
	} elseif ($_SESSION['ubc'] != "") {
		echo "<script>window.location='./?hotspot=users&comment=" . $_SESSION['ubc'] . "&session=" . $session . "'</script>";
	} else {
		echo "<script>window.location='./?hotspot=users&profile=all&session=" . $session . "'</script>";
	}
}
?>
