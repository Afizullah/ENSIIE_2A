<?php
function secure($val) {
    return htmlspecialchars(trim($val));
}

function _hash($val){
	return hash('sha256',$val);
}

function getUserId(){
	return $_SESSION['id'];
}

function getUserFName(){
	return $_SESSION['prenom'];
}
?>