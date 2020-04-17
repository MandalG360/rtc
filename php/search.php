<?php 
include("connect_db.php");

$data = $_GET['search'];

$que = "SELECT name FROM student_master WHERE name LIKE '%$data%' ORDER BY name";

$res = mysql_query($que);

if(!$res){
	echo "Error!!!";
}
else{
	while ($row = mysql_fetch_array($res)) {
		echo "<option value='".$row['name']."'>";
	}
}

?>