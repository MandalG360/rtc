<!DOCTYPE html>
<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/body.css" media="all" />
		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/validation.js"></script>
	</head>
		<style>
			/* Zebra striping */
			tr:nth-of-type(odd) { 
			  background: #F5F5F5;
			}
			tr:nth-of-type(even) { 
			  background: #F5F5F5;
			}
			td{ 
			  padding: 0px; 
			  text-align: left; 
			  padding:0px;			  
			}
			#s{
				text-align:right;
				font-size:18px;
			}

		</style>
<body BACKGROUND="icon/nice.jpg">
	<!--header part start-->
	<div class='header'>
		<?php include_once('header.php'); ?>
	</div>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content'>
		<div class="welcome">
			<a href="index.php"><center style="color:red;font-size:20;"><?php echo @$_GET['error']; ?></center></a>
			<a href="index.php"><center style="color:red;font-size:20;"><?php echo @$_GET['logout']; ?></center></a>
		</div>
		<!--left_content part start-->
		<div class='left_content'>
			<?php include_once('left_sidebar.php'); ?>
		</div>
		
		<!--middle_content part start-->
		<div class='middle_content'>
			<div class='description'>
				<div class='content_body2'>				
					<form action="" method="post" enctype="multipart/form-data">
					
						<div>
							<a href="reg.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['save']; ?></center></a>
							<a href="reg.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['error']; ?></center></a>
						</div>
						
						<table class="table">
							<tr>
								<td id="h" colspan="2" align="center">Student Registration Here</td>
							</tr>
							<tr id="err"><td></td><td id="error"></td></tr>
							<tr><td id="s">Enter Student's Name:</td>
							<td><input type="text" id="f1" name="name" required onKeyPress="return chkNum(event,'error')" placeholder="student's name... " /><font color="#FF0000">*</font></td></tr>
							
							<tr id="err"><td></td><td id="error2"></td></tr>
							<tr><td id="s">Student Father's Name:</td>
							<td><input type="text" id="f2" name="fname" required onBlur="chkBlnk('f2','error2')" onKeyPress="return chkNum(event,'error2')" placeholder="student father's name... " /><font color="#FF0000">*</font></td></tr>
							
							<tr id="err"><td></td><td></td></tr>
							<tr><td id="s">Select Date of Birth:</td>
							<td><input type="date" id="dob" name="dob" required  /><font color="#FF0000">*</font></td></tr>
							
							<tr id="err"><td></td><td id="error3"></td></tr>	
							<tr><td id="s">Aadhar No:</td>
							<td><input type="text" id="f3" required name="aadhar"maxlength=12 onBlur="Aadhar('f3','error3')"  onKeyPress="return chkNumOnly(event,'error3')"  placeholder="aadhar no... " /><font color="#FF0000">*</font></td></tr>
							
							<tr id="err"><td></td><td id="error4"></td></tr>
							<tr><td id="s">E-mail ID:</td>
							<td><input type="email" id="f4" name="email" required onBlur="emails()" placeholder="abc@gmail.com" /><font color="#FF0000">*</font></td></tr>
							
							<tr id="err"><td></td><td id="error5"></td></tr>
							<tr><td id="s">Mobile No:</td>
							<td><input  type="text" id="f5" required name="mob"maxlength=10 onBlur="Mobile('f5','error5')"  onKeyPress="return chkNumOnly(event,'error5')" placeholder="mobile no... " /><font color="#FF0000">*</font></td></tr>
							
							<tr><td colspan="2" align="center"><br><br><input type="submit" id="submit" name="submit" value="Submit" /></td></tr>
							
						</table>
					</form>
					<?php
					@$mydate = getdate(date("U"));
					function generatePassword(){
						$array = array('0','1','2','3','4','5','6','7','8','9','A','K','M','S','R');
						
						$password="";
						for($i=0;$i<=5;$i++){
							$index = rand(0,count($array)-1);
							$password.=$array[$index];
						}
						return $password;
					}

						@$reg_code = @$mydate[mday].generatePassword().@$mydate[year];
					
					include("php/connect_db.php");
				
					@$name = strtoupper($_POST['name']);
					@$fname = strtoupper($_POST['fname']);
					@$dob = $_POST['dob'];
					@$aadhar = $_POST['aadhar'];
					@$email = $_POST['email'];
					@$mob = $_POST['mob'];
							
					if(isset($_POST['submit'])){
						
						if($name==''||$fname==''||$dob==''||$aadhar==''||$email==''||$mob==''){
							echo "<script>alert('Please Insert all fields, than take this facility!');</script>";
							exit();
						}
						
						$select = "select *from student_master where email='$email'";

						$run = mysql_query($select);

						$check = mysql_num_rows($run);

						if($check==1){
							echo "<script>window.open('registration.php?error=This email address <b>".$email."</b> is already exist. Thank You!','_self');</script>";
							exit();
						}
						
						$select = "select *from student_master where aadhar='$aadhar'";

						$run = mysql_query($select);

						$check = mysql_num_rows($run);

						if($check==1){
							echo "<script>window.open('registration.php?error=This Aadhar ID <b>".$aadhar."</b> is already exist. Thank You!','_self');</script>";
							exit();
						}
					
					
						$que = "insert into student_master( name, father_name, dob, aadhar, email, mob, reg_code) values('$name','$fname','$dob','$aadhar','$email','$mob','$reg_code')";
												
						$run = mysql_query($que);
							
						if($run){
							
							mkdir("img_folder/$reg_code");
							
							echo "<script>window.open('reg.php?save=Your Registration Succeessfully.<br>Hello: ".$name." <br>Your Registration ID: ".$reg_code." ','_self');</script>";
						}
						else{
							echo "<script>alert('Some error founds!')</script>";
							exit();
						}
					}
				?>
				</div>
			</div>
			
		</div>
		
		<!--right_content part start-->
		<div class='right_content'>
			<?php include_once('right_sidebar.php'); ?>
		</div>		
	</div>
	
	<!--footer part start-->
	<div class='footer'>
		<?php include_once('footer.php'); ?>
	</div>

</body>
</html>