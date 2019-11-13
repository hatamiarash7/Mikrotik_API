<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */

// hide all error
error_reporting(0);
if (!isset($_SESSION["mikhmon"])) {
  header("Location:../admin.php?id=login");
} else {
// array color
  $color = array('1' => 'bg-blue', 'bg-indigo', 'bg-purple', 'bg-pink', 'bg-red', 'bg-yellow', 'bg-green', 'bg-teal', 'bg-cyan', 'bg-grey', 'bg-light-blue');

  ?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
	<h3><i class=" fa fa-print"></i> <?= $_quick_print ?> &nbsp;&nbsp; | &nbsp;&nbsp;<a class="pointer" onclick="location.href='./?hotspot=list-quick-print&session=<?= $session ?>';"  title="Quick Print List"><i class="fa fa-list"></i> List</a></h3>
</div>
<div class="card-body">
<div class="overflow" style="max-height: 80vh">	
<div class="row">
<?php
// get quick print
$getquickprint = $API->comm("/system/script/print", array("?comment" => "QuickPrintMikhmon"));
$TotalReg = count($getquickprint);
for ($i = 0; $i < $TotalReg; $i++) {
  $quickprintdetails = $getquickprint[$i];
  $qpname = $quickprintdetails['name'];
  $qpid = $quickprintdetails['.id'];
  $quickprintsource = explode("#",$quickprintdetails['source']);
  $package = $quickprintsource[1];
  $server = $quickprintsource[2];
  $usermode = $quickprintsource[3];
  $userlength = $quickprintsource[4];
  $prefix = $quickprintsource[5];
  $char = $quickprintsource[6];
  $profile = $quickprintsource[7];
  $timelimit = $quickprintsource[8];
  $datalimit = $quickprintsource[9];
  $comment = $quickprintsource[10];
  $validity = $quickprintsource[11];
  $getprice = $quickprintsource[12];
  $userlock = $quickprintsource[13];
  if ($currency == in_array($currency, $cekindo['indo'])) {
    $price = $currency . " " . number_format($getprice, 0, ",", ".");
} else {
    $price = $currency . " " . number_format($getprice);
}
  ?>
	     <div class="col-4">
        <div id='./hotspot/quickuser.php?quickprint=<?= $qpname ?>&session=<?= $session; ?>' class="quick pointer box bmh-75 box-bordered <?= $color[rand(1, 11)]; ?>" title='<?= $_print.' '.$_package.' '. $package; ?>'>
          <div class="box-group">
            <div class="box-group-icon">
            	<i class="fa fa-print"></i>
            </div>
              <div class="box-group-area">
                <h3 ><?= $_package ?> : <?= $package; ?> <br></h3>
                <span><?= $_time_limit ?>  : <?= $timelimit ?> | <?= $_data_limit ?>  : <?= formatBytes($datalimit, 2) ?> <br> <?= $_validity ?>  : <?= $validity ?> | <?= $_price ?>  : <?= $price ?></span>
              </div>
            </div>
            
          </div>
        </div>
        <?php 
      }
    }
    ?>
    </div>
    </div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
  $(".quick").click(function(){

    loadpage(this.id);
    
  });

});
</script>
