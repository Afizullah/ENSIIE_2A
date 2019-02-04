<?php
$id=getUserId();
$email=getEmail($id);
$msg="";

// partie ajax
if (isset($_POST['ajax'])){
	$idform=$_POST['ajax']; 
	$hmdp=_hash($_POST['mdp']);
	$curmdp=getMdp($id);
	if (strcmp($hmdp,$curmdp)!=0){
		die("1");
	}
	//modif email
	if ($idform==1){
		$mail1=secure((filter_var($_POST['mail1'], FILTER_VALIDATE_EMAIL)));
		$mail2=$_POST['mail2'];
		//echec
		if (strcmp($mail1,$mail2)!=0){
			die("2");
		}
		if (mailExist($mail1)){
			die("5");
		}
		//reussite
		else{
			updateEmail($id,$mail1);
			die("4");
		}
	}
	//modif mdp
	if ($idform==2){
		$mdp1=secure($_POST['mdp1']);
		$mdp2=$_POST['mdp2'];
		//echec
		if (strcmp($mdp1,"")==0){
			die("6");
		}
		if (strcmp($mdp1,$mdp2)!=0){
			die("3");
		}
		//reussite
		else{
			updateMdp($id,_hash($mdp1));
			die("4");
		}
	}
}
if (isset($_POST["delUser"])) {
    //suppression du compte
    $hmdp = _hash($_POST['mdp']);
    $curmdp = getMdp($id);
    if (strcmp($hmdp, $curmdp) == 0) {
        deleteAccount($id);
        header("Location:index.php?page=login");
    }
    else{
        $msg = "Mot de passe invalide";
    }
}

?>
