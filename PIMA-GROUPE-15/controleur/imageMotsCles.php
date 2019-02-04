<?php
if(isset($_GET["mot_cle"])){
    $mot_cle=$_GET["mot_cle"];
}
else{
    header("Location:index.php?page=motsCles");
}
if (!isset($_POST['incremente'])) {
    $_POST['incremente'] = 1;
}
if($_POST['incremente'] < 1){
    $_POST['incremente'] = 1;
}

$page = $_POST['incremente'];
$dates=dateByMotCle($mot_cle);
$dates=array_slice($dates,($page-1)*12,12);
if(!$dates){
    $dates=array_slice($dates,($page-2)*12,12);
    $page=$page-1;
}

