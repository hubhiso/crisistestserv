<?php
$username="root";
$password="root";
$database="crisistest2021";
$hostname = "localhost";

$connection=mysqli_connect($hostname,$username,$password,$database) or die("not connection");
//mysqli_select_db($database) or die("no choose data base");
mysqli_query("SET NAMES UTF8");



?>