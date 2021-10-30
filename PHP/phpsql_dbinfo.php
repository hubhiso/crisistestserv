<?php

$username="root";
$password="hiso";
$database="crisistest";
$hostname = "localhost";

$connection=mysqli_connect ($hostname, $username, $password);

mysqli_query("SET NAMES UTF8",$connection); 
if (!$connection) {

  die('Not connected : ');
}

$db_selected = mysqli_select_db($connection, "crisisserv2");
if (!$db_selected) {

  die ('Can\'t use db : ');

}

?>