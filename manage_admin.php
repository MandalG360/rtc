<?php
session_start();

if(!$_SESSION['admin_name']){
	header('location:index.php?error=You are not an Administrator..!');
}
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/body.css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/upperCase.js"></script>
	</head>
		<style>
			/* Zebra striping */
			tr:nth-of-type(odd) { 
			  background: #F5F5F5;
			}
			th { 
			  background: #333; 
			  color: white; 
			  font-weight: bold; 
			}
			td, th { 
			  padding: 6px; 
			  border: 1px solid #ccc; 
			  text-align: left; 
			  padding:0px 5%;
			  font-size:18px;
			}
			#find{
				width:70%;
				height:30px;
				float:left;
				padding-left:5%;
				margin-left:2%;
			}
			#findb{
				width:20%;
				height:35px;
				float:left;
				margin-right:2%;
			}
			</style>
<body>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation_lock.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content'>
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
		
		<!--content_body part start-->
		<section class="section">
		<form action="manage_admin.php" method="post">
			<div>
				<table class="table" border="2">
				<tr>
					<td colspan="2" align="center"><a href="manage_admin.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['message']; ?></center></a></td>
				</tr>
				
				<tr>
					<td colspan="2" align="center" id="h">Manage Admin Password</td>
				</tr>
				<tr>
					<td>Admin Name:</td>
					<td><input type="text" id="f4" name="pass" title=" Admin Name" value="<?php echo $_SESSION['admin_name']; ?>" disabled /></td>
				</tr>
				<tr>
					<td>Current Password:</td>
					<td><input type="password" id="f1" name="pass" title="current password."></td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td><input type="password" id="f2" name="npass" title="New password."></td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" id="f3" name="cpass" title="Confirm password."></td>
				</tr>
				<tr>
					<td colspan="2" align="center" height="30px"></td>	
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="update" id="submit" value="Submit" /></td>	
				</tr>
				</table>
			</div>
			<?php
				include("php/connect_db.php");
				
				if(isset($_POST['update']))
				{
					
					$name = md5($_SESSION['admin_name']);
					$pass = md5($_POST['pass']);
					$npass = md5($_POST['npass']);
					$cpass = md5($_POST['cpass']);
					
					if($pass=="" || $npass=="" || $cpass ==""){
						echo "<script>alert('Please insert all fields.')</script>";
						exit();
					}
					
					if($npass != $cpass){
						echo "<script>alert('Confirm Password does not matched. Try again!')</script>";
						exit();
					}
					
					$query = "select * from admin_login where name='$name'";
					
					$run = mysql_query($query);
					
					while($row = mysql_fetch_array($run))
					{
						$passf = $row['pass'];
					}
					
					$que = "update admin_login set pass='$npass' where name='$name'";
					
					$run2 = mysql_query($que);
					
					if($run2){
						echo "<script>window.open('index.php?message=Password Update Successfully.','_self')</script>";
					}
					else{
						echo "<script>alert('Some error found?. Try again!')</script>";
						exit();
					}
					
				}
			?>
		
		</form>
		</section>		
	</div>
</body>
</html>