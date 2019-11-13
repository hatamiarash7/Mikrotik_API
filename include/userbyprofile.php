<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */

// hide all error
error_reporting(0);
if(!isset($_SESSION["mikhmon"])){
  header("Location:../admin.php?id=login");
}else{
// array color
$color = array ('1'=>'bg-blue','bg-indigo','bg-purple','bg-pink','bg-red','bg-yellow','bg-green','bg-teal','bg-cyan','bg-grey','bg-light-blue');

?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
	<h3><i class=" fa fa-users"></i> User by Profile &nbsp;&nbsp; | &nbsp;&nbsp;<i onclick="location.reload();" class="fa fa-refresh pointer" title="Reload data"></i></h3>
</div>
<div class="card-body">
<div class="overflow" style="max-height: 80vh">	
<div class="row">	
<?php
// get user profile
	$getprofile = $API->comm("/ip/hotspot/user/profile/print");
	$TotalReg = count($getprofile);
	for ($i=0; $i<$TotalReg; $i++){
	$profiledetalis = $getprofile[$i];
	$pname = $profiledetalis['name'];
	?>
	     <div class="col-4">
        <div class="box bmh-75 box-bordered <?php echo $color[rand(1,11)];?>">
        	<a title='Open User by profile <?php echo $pname;?>'  href='./app.php?hotspot=users&profile=<?php echo $pname;?>&session=<?php echo $session;?>'>
          <div class="box-group">
            <div class="box-group-icon">
            	<i class="fa fa-address-book"></i>
            </div>
              <div class="box-group-area">
                <h3 >Profile : <?php echo $pname;?><br>
                <?php	$countuser = $API->comm("/ip/hotspot/user/print", array("count-only" => "","?profile" => "$pname",));
					if($countuser < 2 ){
						echo $countuser." Item";
  					}elseif($countuser > 1){
  						echo $countuser." Items";}
  					?></h3>
              </div>
            </div>
            </a>
          </div>
        </div>
        <?php }}?>
      </div>
    </div>
</div>
</div>
</div>
</div>
