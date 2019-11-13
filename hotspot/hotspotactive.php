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
	$serveractive = $_GET['server'];

// load config
	include('../include/config.php');
	include('../include/readcfg.php');
	
// lang
  include('../include/lang.php');
  include('../lang/'.$langid.'.php');

// routeros api
	include_once('../lib/routeros_api.class.php');
	include_once('../lib/formatbytesbites.php');
	$API = new RouterosAPI();
	$API->debug = false;
	$API->connect($iphost, $userhost, decrypt($passwdhost));

	if ($serveractive != "") {
		$gethotspotactive = $API->comm("/ip/hotspot/active/print", array("?server" => "" . $serveractive . ""));
		$TotalReg = count($gethotspotactive);

		$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
			"count-only" => "", "?server" => "" . $serveractive . ""
		));

	} else {
		$gethotspotactive = $API->comm("/ip/hotspot/active/print");
		$TotalReg = count($gethotspotactive);

		$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
			"count-only" => "",
		));
	}
}
?>
<div class="row">
<div id="reloadHotspotActive">
<div class="col-12">
	<div class="card">
		<div class="card-header">
    		<h3><i class="fa fa-wifi"></i> <?= $_hotspot_active ?> <?php
				if ($serveractive == "") {
				} else {
					echo $serveractive . " ";
				}
				if ($counthotspotactive < 2) {
					echo "$counthotspotactive item";
				} elseif ($counthotspotactive > 1) {
					echo "$counthotspotactive items";
				};
				if ($serveractive == "") {
				} else {
					echo " | <a href='./?hotspot=active&session=" . $session . "'> <i class='fa fa-search'></i> Show all</a>";
				}
				?>			</h3>
        </div>
         <div class="card-body overflow">
<table id="tFilter" class="table table-bordered table-hover text-nowrap">
  <thead>
  <tr>
    <th></th>
    <th>Server</th>
    <th>User</th>
    <th>Address</th>
    <th>Mac Address</th>
    <th class="text-right">Uptime</th>
    <th class="text-right">Bytes In</th>
    <th class="text-right">Bytes Out</th>
    <th class="text-right">Time Left</th>
    <th>Login By</th>
    <th><?= $_comment ?></th>
  </tr>
  </thead>
  <tbody>
<?php
for ($i = 0; $i < $TotalReg; $i++) {
	$hotspotactive = $gethotspotactive[$i];
	$id = $hotspotactive['.id'];
	$server = $hotspotactive['server'];
	$user = $hotspotactive['user'];
	$address = $hotspotactive['address'];
	$mac = $hotspotactive['mac-address'];
	$uptime = formatDTM($hotspotactive['uptime']);
	$usesstime = formatDTM($hotspotactive['session-time-left']);
	$bytesi = formatBytes($hotspotactive['bytes-in'], 2);
	$byteso = formatBytes($hotspotactive['bytes-out'], 2);
	$loginby = $hotspotactive['login-by'];
	$comment = $hotspotactive['comment'];
	$uriprocess = "'./?remove-user-active=" . $id . "&session=" . $session . "'";
	echo "<tr>";
	echo "<td style='text-align:center;'><span class='pointer'  title='Remove " . $user . "' onclick=loadpage(".$uriprocess.")><i class='fa fa-minus-square text-danger'></i></span></td>";
	echo "<td><a  title='filter " . $server . "' href='./?hotspot=active&server=" . $server . "&session=" . $session . "'><i class='fa fa-server'></i> " . $server . "</a></td>";
	echo "<td><a title='Open User " . $user . "' href=./?hotspot-user=" . $user . "&session=" . $session . "><i class='fa fa-edit'></i> " . $user . "</a></td>";
	echo "<td>" . $address . "</td>";
	echo "<td>" . $mac . "</td>";
	echo "<td style='text-align:right;'>" . $uptime . "</td>";
	echo "<td style='text-align:right;'>" . $bytesi . "</td>";
	echo "<td style='text-align:right;'>" . $byteso . "</td>";
	echo "<td style='text-align:right;'>" . $usesstime . "</td>";
	echo "<td>" . $loginby . "</td>";
	echo "<td>" . $comment . "</td>";
	echo "</tr>";
}
?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
