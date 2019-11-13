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

	$getcookies = $API->comm("/ip/hotspot/cookie/print");
	$TotalReg = count($getcookies);

	$countcookies = $API->comm("/ip/hotspot/cookie/print", array(
		"count-only" => "",
	));

}
?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
	<h3><i class=" fa fa-sitemap"></i> Hotspot Cookies 
<?php
if ($countcookies < 2) {
	echo "$countcookies item";
} elseif ($countcookies > 1) {
	echo "$countcookies items";
};
echo "</th>";
?>
&nbsp;&nbsp; | &nbsp;&nbsp;<i onclick="location.reload();" class="fa fa-refresh pointer" title="Reload data"></i>
    </h3>
</div>
<div class="card-body">	   
<div class="w-6">
    <input id="filterTable" type="text" class="form-control" placeholder="Search..">
  </div>
<div class="overflow box-bordered mr-t-10" style="max-height: 75vh">   	   
<table id="dataTable" class="table table-bordered table-hover text-nowrap">
  <thead>
  <tr>
  	<th></th>
    <th class="pointer" title="Click to sort"><i class="fa fa-sort"></i> User</th>
    <th class="pointer" title="Click to sort"><i class="fa fa-sort"></i> MAC Address</th>
    <th class="pointer" title="Click to sort"><i class="fa fa-sort"></i> Domain</th>
    <th class="pointer" title="Click to sort"><i class="fa fa-sort"></i> Expires In</th>
  </tr>
  </thead>
  <tbody> 
<?php
for ($i = 0; $i < $TotalReg; $i++) {
	$cookies = $getcookies[$i];
	$id = $cookies['.id'];
	$user = $cookies['user'];
	$maca = $cookies['mac-address'];
	$domain = $cookies['domain'];
	$exp = formatDTM($cookies['expires-in']);

	$uriprocess = "'./?remove-cookie=" . $id . "&session=" . $session . "'";

	echo "<tr>";
	echo "<td style='text-align:center;'><span class='pointer'  title='Remove " . $user . "' onclick=loadpage(".$uriprocess.")><i class='fa fa-minus-square text-danger'></i></span></td>";
	echo "<td>" . $user . "</td>";
	echo "<td>" . $maca . "</td>";
	echo "<td>" . $domain . "</td>";
	echo "<td>" . $exp . "</a></td>";
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
</div>
