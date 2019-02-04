<?php
if (!(isset($_POST['vote']))){
	die("erreur: ce n'est pas une page");
}
$id=getUserId();
$date=$_POST["date"];
if(!(updateVote($date,$_POST['vote'],$id))){
	die("erreur vote non pris en compte");
}
$pos=positive($date);
$neg=negative($date);
?>
