<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
$session = $_GET['session'];
$uname = $_GET['name'];

include_once('../include/config.php');
$iphost=explode('!',$data[$session][1])[1]; 
$userhost=explode('@|@',$data[$session][2])[1];
$passwdhost=explode('#|#',$data[$session][3])[1]; 
$hotspotname=explode('%',$data[$session][4])[1]; 
$dnsname=explode('^',$data[$session][5])[1]; 
$curency=explode('&',$data[$session][6])[1];


include_once('../lib/routeros_api.class.php');

$API = new RouterosAPI();
$API->debug = false;
$API->connect( $iphost, $userhost, decrypt($passwdhost));

if($uname != ""){
	$getname = $API->comm("/ip/hotspot/user/print", array("?name" => "$uname"));
  	$exp = $getname[0]['comment'];
	if(substr($exp,3,1) == "/" && substr($exp,6,1) == "/"){
		$exp = $exp;
	}else{
	$getname = $API->comm("/sys/sch/print", array("?name" => "$uname"));
	  $exp = $getname[0]['next-run'];
	}
  
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Voucher-<?= $hotspotname."-".$uname;?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<style>
		body {
  			font-family: 'Helvetica', arial, sans-serif;
			font-size: 15px;
			margin:0px;
  		}
		</style>
	</head>
	<body>
		<div style="padding:5px;" id="exp" ><?= $exp;?></div>	
	</body>
</html>
