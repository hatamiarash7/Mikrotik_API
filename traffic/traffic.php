<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
if(!isset($_SESSION["mikhmon"])){
  header("Location:../admin.php?id=login");
}else{
// load session MikroTik
$session = $_GET['session'];
$interface = $_GET['iface'];
//echo $interface
// load config
include('../include/config.php');
include('../include/readcfg.php');

// routeros api
include_once('../lib/routeros_api.class.php');
include_once('../lib/formatbytesbites.php');
$API = new RouterosAPI();
$API->debug = false;
  
  if($API->connect( $iphost, $userhost, decrypt($passwdhost))){

//$getinterface = $API->comm("/interface/print");
    //$interface = $getinterface[$iface-1]['name'];
    $getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
      "interface" => "$interface",
      "once" => "",
      ));

    $rows = array(); $rows2 = array();

    $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
    $frx = $getinterfacetraffic[0]['rx-bits-per-second'];

      $rows['name'] = 'Tx';
      $rows['data'][] = $ftx;
      $rows2['name'] = 'Rx';
      $rows2['data'][] = $frx;
      
  }else{
		echo "<font color='#ff0000'>Connection Failed!!</font>";
  }
  
  $API->disconnect();
  
  $result = array();

	array_push($result,$rows);
	array_push($result,$rows2);
  print json_encode($result);
}
?>
