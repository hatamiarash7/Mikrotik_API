<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */

// hide all error
error_reporting(0);
if(!isset($_SESSION["mikhmon"])){
  header("Location:../admin.php?id=login");
}else{

  $getlog = $API->comm("/log/print", array(
	  "?topics" => "hotspot,info,debug"));
	$log = array_reverse($getlog);
	$TotalReg = count($getlog);
}
?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
    <h3><i class=" fa fa-align-justify"></i>  Log</h3>
</div>
<div class="card-body">
       
<div style="max-width: 350px;">
     <input id="filterTable" type="text" class="form-control" placeholder="Search.."> 
</div>
<div style="padding: 5px; max-height: 75vh;" class="mr-t-10 overflow">
<table class="table table-sm" id="dataTable" >
	<tbody>
<?php
	for ($i=0; $i<$TotalReg; $i++){
	echo "<tr>";
	echo "<td></td>";
	echo "<td>" . $log[$i]['time'];echo "</td>";
	echo "<td>" . $log[$i]['message'];echo "</td>";
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
