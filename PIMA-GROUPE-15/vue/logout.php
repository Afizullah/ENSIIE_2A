<?php
/**
 * Created by PhpStorm.
 * User: Afiz
 * Date: 13/11/2018
 * Time: 21:14
 */

session_start();
session_destroy();
header("Location:index.php?page=login");
 ?>
