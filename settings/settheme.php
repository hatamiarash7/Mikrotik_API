<?php
/**
 * Copyright (c) 2019. Arash Hatami
 */
session_start();
// hide all error
error_reporting(0);

// check url
$url2 = explode("&set-theme", $url)[0];

$gettheme = $_GET['set-theme'];
$mtheme = array(
    "dark",
    "light",
    "blue",
    "green",
    "pink",
    
);
$theme_color = array(
    "#3a4149",
    "#008BC9",
    "#008BC9",
    "#4dbd74",
    "#e83e8c",
);


$themenum = array_search($gettheme, $mtheme);

$getthemecolor = $theme_color[$themenum];

if (empty($gettheme)) {  

} else {
    if (in_array($gettheme, $mtheme)) {
        include_once('./include/headhtml.php');
        $gen = '<?php $theme="' . $gettheme . '"; $themecolor="'.$getthemecolor.'";?>';
        $stheme = './include/theme.php';
        $handle = fopen($stheme, 'w') or die('Cannot open file:  ' . $stheme);
        $data = $gen;
        fwrite($handle, $data);
        $_SESSION['theme'] = $gettheme;
        $_SESSION['themecolor'] = $getthemecolor;
        echo '<center><div style="padding-top:10%;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:40px"></i></div><h3>Load '.$gettheme.' theme...</h3></center>';
        echo "<script>window.location='" . $url2 . "'</script>";
        
    } else {
        include_once('./include/headhtml.php');
        echo '<center><div style="padding-top:10%;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:40px"></i></div><h3>'.$gettheme.' theme not found...</h3></center>';
        echo "<script>window.location='" . $url2 . "'</script>";
    }
}

?>
