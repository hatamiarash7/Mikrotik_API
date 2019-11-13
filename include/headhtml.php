<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Mikrotik <?= $hotspotname; ?> </title>
	<meta charset="utf-8">
	<meta http-equiv="cache-control" content="private"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?= $themecolor ?>"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/fontiran.css"/>
	<link rel="stylesheet" href="css/mikhmon-ui.<?= $theme; ?>.min.css">
	<link rel="icon" href="./img/favicon.png"/>
	<script src="js/jquery.min.js"></script>
	<link href="css/pace.<?= $theme; ?>.css" rel="stylesheet"/>
	<script src="js/pace.min.js"></script>
</head>
<body>
<div class="wrapper">

