<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

$pid = $removeuserprofile;
$pname = $_GET['pname'];

$getmonid = $API->comm("/system/scheduler/print", array(
    "?name" => "$pname",
));
$monid = $getmonid[0]['.id'];

$API->comm("/ip/hotspot/user/profile/remove", array(
    ".id" => "$pid",
));
$API->comm("/system/scheduler/remove", array(
    ".id" => "$monid",
));
echo "<script>window.location='./?hotspot=user-profiles&session=" . $session . "'</script>";
?>
