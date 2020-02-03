<?php
header("Content-type: text/json"); 
?>
<?php


require("../phpsql_dbinfo.php");


$conn = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno()) 
	{ 
        echo "Database connection failed."; 
	}
mysqli_set_charset($conn,"utf8");


echo "{";
echo "\"type\": \"FeatureCollection\",";
echo "\"features\": [";



$query = " select * from org where geolat <> '' limit 100;";
$result1 = mysqli_query($conn, $query);
$count_row = mysqli_num_rows($result1); 

$count_i = 1;
//echo "count_i".$count_i."count_row".$count_row;
while ($row = $result1->fetch_assoc()){
	//echo $row["FEATURES"].",\"dname2\": \"". $row["dname"]." -\",\"color2\": \"black\",\"total\": \"\" },"."\"".$row["GEOMETRY"].",";
	
		if ($count_i < $count_row){
		echo "{\"type\": \"Feature\", \"id\": \"".$row["name"]."\", \"properties\": { \"receiver\": \"".$row["address"]."\"},\"geometry\": { \"type\":\"Point\", \"coordinates\": [".$row["geolon"].",".$row["geolat"]."] } },";
		}else{
		echo "{\"type\": \"Feature\", \"id\": \"".$row["name"]."\", \"properties\": { \"receiver\": \"".$row["address"]."\"},\"geometry\": { \"type\":\"Point\", \"coordinates\": [".$row["geolon"].",".$row["geolat"]."] } }";
		
		}
		
$count_i++;	
}

echo "]";
echo "}";

mysql_close($connection);

//echo $query;
?>

