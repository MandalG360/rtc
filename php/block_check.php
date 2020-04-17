<?php 

if(!@$_POST['district']==""){
include("connect_db.php");
?>
<option value="">--- Select Sub-District Name ---</option>
<?php
$state=$_POST['state'];
$dist=$_POST['district'];
$data = mysql_query("select * from blocks where state_id=$state AND district_id=$dist order by block_name ASC");
while ($records = mysql_fetch_array($data)) {
 ?>
<option value="<?php echo $records[0]; ?>"><?php echo $records[1]; ?></option>
<?php
}
 }
?>