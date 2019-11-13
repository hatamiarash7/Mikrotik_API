<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

// remove host
$API->comm("/ip/hotspot/host/remove", array(
    ".id" => "$removehost",
));
// redirect to host
echo "<script>window.location='./?hotspot=hosts&session=" . $session . "'</script>";
?>
