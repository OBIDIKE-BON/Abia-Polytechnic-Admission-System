<?php

require("constants.php");
$server = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
$sql=  mysqli_query($server, "CREATE DATABASE IF NOT EXISTS `de_light`");
if (!$server) {
    die('could not connect to database ' . mysqli_error($server));
}
if (!$sql) {
    die('could not create a database' . mysqli_error($server));
}
$select = mysqli_select_db($server, DB_NAME);
if (!$select) {
    die('could not select database' . mysqli_error($server));
}
?>