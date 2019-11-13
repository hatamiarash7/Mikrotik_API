<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
if (!isset($_SESSION["mikhmon"])) {
  header("Location:../admin.php?id=login");
} else {
// load session MikroTik
  $session = $_GET['session'];

// load config
  include('../include/config.php');
  $iphost = explode('!', $data[$session][1])[1];
  $userhost = explode('@|@', $data[$session][2])[1];
  $passwdhost = explode('#|#', $data[$session][3])[1];
  $curency = explode('&', $data[$session][6])[1];



  include_once('../lib/routeros_api.class.php');

  $API = new RouterosAPI();
  $API->debug = false;
  $API->connect($iphost, $userhost, decrypt($passwdhost));

  $uprofname = $_GET['name'];
  if ($uprofname != "") {
    $getprofile = $API->comm("/ip/hotspot/user/profile/print", array("?name" => "$uprofname"));
    $ponlogin = $getprofile[0]['on-login'];
    $getvalid = "Validity : " . explode(",", $ponlogin)[3];
    $getprice = explode(",", $ponlogin)[2];
    $getlock = "| Lock User : " . explode(",", $ponlogin)[6];
    if ($getprice == 0) {
    } else {
      if ($curency == "Rp" || $curency == "rp" || $curency == "IDR" || $curency == "idr") {
        $price = "| Price : " . $curency . " " . number_format($getprice, 0, ",", ".");
      } else {
        $price = "| Price : " . $curency . " " . number_format($getprice);
      }
    }
    echo '<b id="getdata">' . $getvalid . ' ' . $price . ' ' . $getlock . '</b>';
    echo '<span id="validity">' . explode(",", $ponlogin)[3] . '</span> ';
  }
}
?>
