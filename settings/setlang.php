<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

// check url
$url2 = explode("&setlang", $url)[0];

$getlang = $_GET['setlang'];

if (empty($getlang)) {

} else {
    if (!empty($isocodelang[$getlang])) {
        include_once('./include/headhtml.php');
        $gen = '<?php $langid="' . $getlang . '";?>';
        $slang = './include/lang.php';
        $handle = fopen($slang, 'w') or die('Cannot open file:  ' . $slang);
        $data = $gen;
        fwrite($handle, $data);
        $_SESSION['lang'] = $getlang;
        echo '<center><div style="padding-top:10%;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:40px"></i></div><h3>Load '.$getlang.' lang...</h3></center>';
        echo "<script>window.location='" . $url2 . "'</script>";
        
    } else {
        include_once('./include/headhtml.php');
        echo '<center><div style="padding-top:10%;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:40px"></i></div><h3>'.$getlang.' lang not found...</h3></center>';
        echo "<script>window.location='" . $url2 . "'</script>";
    }
}

?>
