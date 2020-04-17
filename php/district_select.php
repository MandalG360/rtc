<?php 

if(!@$_POST['state']==""){
include("connect_db.php");
?>
<select name="district" id="district">
<option value="">--- Select District Name ---</option>
<?php
$state=$_POST['state'];
$data = mysql_query("select * from districts where state_id=$state order by district_name ASC");
while ($records = mysql_fetch_array($data)) {
 ?>
<option value="<?php echo $records[0]; ?>"><?php echo $records[1]; ?></option>
<?php
}
 }
?>