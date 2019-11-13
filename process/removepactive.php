<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

$API->comm("/ppp/active/remove", array(
    ".id" => "$removepactive",
));

echo "<script>window.location='./?ppp=active&session=" . $session . "'</script>";
