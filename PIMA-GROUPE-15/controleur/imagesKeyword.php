<?php
/**
 * Created by PhpStorm.
 * User: Afiz
 * Date: 12/12/2018
 * Time: 21:23
 */
if (!isset($_POST['incremente'])) {
        $_POST['incremente'] = 1;
}
if($_POST['incremente'] < 1){
    $_POST['incremente'] = 1;
}

$page = $_POST['incremente'];
if(!gradedImage($page,getUserId())){
    $page = $page-1;
}