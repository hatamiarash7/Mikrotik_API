<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

// remove ip binding
if ($removeipbinding != "") {
	$API->comm("/ip/hotspot/ip-binding/remove", array(
		".id" => "$removeipbinding",
	));

	$getqueue = $API->comm("/queue/simple/print", array(
		"?name" => "$macbinding",
	));

	$squeue = $getqueue[0]['.id'];

	$API->comm("/queue/simple/remove", array(
		".id" => "$squeue",
	));

	$getvalid = $API->comm("/system/scheduler/print", array(
		"?name" => "$macbinding",
	));

	$svalid = $getvalid[0]['.id'];

	$API->comm("/system/scheduler/remove", array(
		".id" => "$svalid",
	));

	$getarp = $API->comm("/ip/arp/print", array(
		"?address" => "$ipbinding",
	));
	$sarp = $getarp[0]['.id'];

	$API->comm("/ip/arp/remove", array(
		".id" => "$sarp",
	));

	$getlease = $API->comm("/ip/dhcp-server/lease/print", array(
		"?address" => "$ipbinding",
	));

	$slease = $getlease[0]['.id'];

	$API->comm("/ip/dhcp-server/lease/remove", array(
		".id" => "$slease",
	));			
		
//redirect to ipbinding
	echo "<script>window.location='./?hotspot=ipbinding&session=" . $session . "'</script>";
}

// enable ip binging
elseif ($enableipbinding != "") {
	$API->comm("/ip/hotspot/ip-binding/set", array(
		".id" => "$enableipbinding",
		"disabled" => "no",
	));

	echo "<script>window.location='./?hotspot=ipbinding&session=" . $session . "'</script>";
}

// disable ip binging
elseif ($disableipbinding != "") {
	$API->comm("/ip/hotspot/ip-binding/set", array(
		".id" => "$disableipbinding",
		"disabled" => "yes",
	));

	echo "<script>window.location='./?hotspot=ipbinding&session=" . $session . "'</script>";
}
