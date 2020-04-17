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
		<script type="text/javascript" src="js/validation.js"></script>
		
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
		<form action="admission.php" method="post">
			<div>
				<table class="table" border="2">
				<tr>
					<td><a href="admission.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['message']; ?></center></a></td>
				</tr>
				<tr>
					<td><a href="registration.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['message_reg']; ?></center></a></td>
				</tr>
				<tr>
					<td id="h"><input type="text" id="find" name="find" title="Enter Aadhar no." placeholder="Aadhar / Mobile / dob(yyyy-mm-dd) to search..."><input type="submit" id="findb" name="search" title="Search" value="Search"></td>
				</tr>
				</table>
			</div>
		</form>
			<?php
				include("php/connect_db.php");

				if(isset($_POST['search'])){
					
					$find = $_POST['find'];
					
					if($find==""){
						echo "<script>window.open('admission.php?message=Please enter Aadhar / Mobile / DOB through complete Admission process.','_self')</script>";
						exit();
					}
					
					$query = "select * from student_master where dob='$find' OR aadhar='$find' OR mob='$find'";

					$run = mysql_query($query);
					
					while($row = mysql_fetch_array($run))
					{
						echo $mname = $row['mother_name'];
						echo $dob = $row['dob'];
						echo $aadhar = $row['aadhar'];
						echo $mob = $row['mob'];
					}

					if($mname==""){
						if(@$dob==$find || @$aadhar==$find || @$mob==$find){
							echo "<script>window.open('admission_form.php?send=".$find." ','_self')</script>";
						}
						else{
							echo "<script>window.open('admission.php?message_reg=You are not Register! <br>At first <strong> Registration Now,</strong> Thank You.','_self')</script>";
							exit();
						}
					}
					else{
						echo "<script>window.open('admission.php?message=Your Admission is already Copleated. Thank You!','_self')</script>";
						exit();
					}
				}			
			?>		
		</section>		
	</div>
</body>
</html>