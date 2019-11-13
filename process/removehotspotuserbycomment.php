<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
$getuser = $API->comm("/ip/hotspot/user/print", array(
  "?comment" => "$removehotspotuserbycomment",
  "?uptime" => "00:00:00"
));
$TotalReg = count($getuser);

$_SESSION['ubp'] = $getuser[0]['profile'];
$_SESSION['ubc'] = "";

for ($i = 0; $i < $TotalReg; $i++) {
  $userdetails = $getuser[$i];
  $uid = $userdetails['.id'];

  $API->comm("/ip/hotspot/user/remove", array(
    ".id" => "$uid",
  ));
}
if ($_SESSION['ubp'] != "") {
  echo "<script>window.location='./?hotspot=users&profile=" . $_SESSION['ubp'] . "&session=" . $session . "'</script>";
} else {
  echo "<script>window.location='./?hotspot=users&profile=all&session=" . $session . "'</script>";
}

?>
