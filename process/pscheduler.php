<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

// remove scheduler
if ($removesch != "") {
	$API->comm("/system/scheduler/remove", array(
		".id" => "$removesch",
	));

	echo "<script>window.location='./?system=scheduler&session=" . $session . "'</script>";
}
// enable scheduler
elseif ($enablesch != "") {
	$API->comm("/system/scheduler/set", array(
		".id" => "$enablesch",
		"disabled" => "no",
	));

	echo "<script>window.location='./?system=scheduler&session=" . $session . "'</script>";
}

// disable scheduler
elseif ($disablesch != "") {
	$API->comm("/system/scheduler/set", array(
		".id" => "$disablesch",
		"disabled" => "yes",
	));

	echo "<script>window.location='./?system=scheduler&session=" . $session . "'</script>";
}
