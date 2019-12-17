<? 
header("Content-type: text/json"); 
?>
<?


require("../phpsql_dbinfo.php");
$connection=mysql_connect ($hostname, $username, $password);
mysql_query("SET NAMES UTF8",$connection); 
if (!$connection) {

  die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
echo "{";
echo "\"type\": \"FeatureCollection\",";
echo "\"features\": [";



$query = " select * from case_inputs where geolat <> '' limit 100;";


//echo $query;

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
$count_row =  mysql_num_rows($result);
$count_i = 1;
//echo "count_i".$count_i."count_row".$count_row;
while ($row = @mysql_fetch_assoc($result)){
	//echo $row["FEATURES"].",\"dname2\": \"". $row["dname"]." -\",\"color2\": \"black\",\"total\": \"\" },"."\"".$row["GEOMETRY"].",";
	
		if ($count_i < $count_row){
		echo "{\"type\": \"Feature\", \"id\": \"".$row["case_id"]."\", \"properties\": { \"name\": \"".$row["name"]."\", \"target\": \"".$row["ADDRESS"]."\", \"type_service\":  \"".$row["TYPECODE2"]."\", \"tel\":  \"".$row["TEL"]."\", \"fax\":  \"".$row["FAX"]."\", \"www\": \"".$row["WWW"]."\", \"last_update\": \"".$row["LAST_UPDATE"]."\"},\"geometry\": { \"type\":\"Point\", \"coordinates\": [".$row["geolon"].",".$row["geolat"]."] } },";
		}else{
		echo "{\"type\": \"Feature\", \"id\": \"".$row["case_id"]."\", \"properties\": { \"name\": \"".$row["name"]."\", \"target\": \"".$row["ADDRESS"]."\", \"type_service\":  \"".$row["TYPECODE2"]."\", \"tel\":  \"".$row["TEL"]."\", \"fax\":  \"".$row["FAX"]."\", \"www\": \"".$row["WWW"]."\", \"last_update\": \"".$row["LAST_UPDATE"]."\"},\"geometry\": { \"type\":\"Point\", \"coordinates\": [".$row["geolon"].",".$row["geolat"]."] } }";
		
		}
		
$count_i++;	
}

echo "]";
echo "}";

mysql_close($connection);

//echo $query;
?>

