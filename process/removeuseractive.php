<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

// get user active
$getuser = $API->comm("/ip/hotspot/active/print", array(
    "?.id" => "$removeuseractive",
));
$user = $getuser[0]['user'];
// get cookie id
$getcookie = $API->comm("/ip/hotspot/cookie/print", array(
    "?user" => "$user",
));
$ck = $getcookie[0]['.id'];
// remove cookie
$API->comm("/ip/hotspot/cookie/remove", array(
    ".id" => "$ck",
));
// remove user active
$API->comm("/ip/hotspot/active/remove", array(
    ".id" => "$removeuseractive",
));
// redirect to user active
echo "<script>window.location='./?hotspot=active&session=" . $session . "'</script>";
?>
