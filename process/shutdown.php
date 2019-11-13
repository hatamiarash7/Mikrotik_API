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

    if (isset($_POST['submit'])) {
        $API = new RouterosAPI();
        $API->debug = false;
        if ($API->connect($iphost, $userhost, decrypt($passwdhost))) {
            $API->write('/system/shutdown');
            $API->read();
        }
        session_destroy();
        echo "<script>window.location='./admin.php?id=login'</script>";
    }
}
?>
<div style="padding-top:10%;" class="register-box">
  <div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-power-off"></i> Shutdown MikroTik</h3>
    </div>
  	<div class="card-body text-center">
  		<form action="" method="post" enctype="multipart/form-data">
        <div>
          <h3><?= $_shutdown.' '. $session; ?>?</h3>
        </div>
  	  <button class="btn bg-warning" type="submit" title="Yes" name="submit"><?= $_yes ?></button>
      <a class="btn bg-primary" href="./?hotspot=dashboard&session=<?= $session; ?>" title="No"> <?= $_no ?> </a>
    </form>
  </div>
</div>
</div>
