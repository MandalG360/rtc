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
		<script type="text/javascript" src="js/validation.js"></script>
	</head>
		<style>
			/* Zebra striping */
			tr:nth-of-type(odd) { 
			  background: #F5F5F5;
			}
			td{ 
			  padding: 6px; 
			  border: 1px solid #ccc; 
			  text-align: left; 
			  padding:0px 5%;
			  font-size:18px;
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
		<div class='content_body'>
			<div class="insert_form">
			
				<form action="" method="post" enctype="multipart/form-data">
				<div>
				<a href="registration.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['save']; ?></center></a>
				<a href="registration.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['error']; ?></center></a>
				</div>
				<table class="table">
					<tr>
						<td id="h">Student Registration Here</td>
					</tr>
					
					<tr><td id="n">Enter Student's Name:</td></tr>
					<tr id="err"><td id="error"></td></tr>
					<tr><td><input type="text" id="f1" name="name" onBlur="chkBlnk('f1','error')" onKeyPress="return chkNum(event,'error')" placeholder="student's name... " /><font color="#FF0000">*</font></td></tr>
					
					
					<tr><td id="n">Student Father's Name:</td></tr>
					<tr id="err"><td id="error2"></td></tr>
					<tr><td><input type="text" id="f2" name="fname" onBlur="chkBlnk('f2','error2')" onKeyPress="return chkNum(event,'error2')" placeholder="student father's name... " /><font color="#FF0000">*</font></td></tr>
					
					
					<tr><td id="n">Select Date of Birth:</td></tr>
					<tr><td><input type="date" id="dob" name="dob"  /><font color="#FF0000">*</font></td></tr>
					
						
					<tr><td id="n">Aadhar No:</td></tr>
					<tr id="err"><td id="error3"></td></tr>
					<tr><td><input type="text" id="f3" name="aadhar"maxlength=12 onBlur="Aadhar('f3','error3')"  onKeyPress="return chkNumOnly(event,'error3')"  placeholder="aadhar no... " /><font color="#FF0000">*</font></td></tr>
					
					
					<tr><td id="n">E-mail ID:</td></tr>
					<tr id="err"><td id="error4"></td></tr>
					<tr><td><input type="email" id="f4" name="email"  onBlur="emails()" placeholder="abc@gmail.com" /><font color="#FF0000">*</font></td></tr>
					
					
					<tr><td id="n">Mobile No:</td></tr>
					<tr id="err"><td id="error5"></td></tr>
					<tr><td><input type="text" id="f5" name="mob"maxlength=10 onBlur="Mobile('f5','error5')"  onKeyPress="return chkNumOnly(event,'error5')" placeholder="mobile no... " /><font color="#FF0000">*</font></td></tr>
				
					<tr><td><br><br><input type="submit" id="submit" name="submit" value="Submit" /></td></tr>
					
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
							echo "<script>alert('Plz Insert all fields, than take this facility!');</script>";
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

						$check = mysqli_num_rows($run);

						if($check==1){
							echo "<script>window.open('registration.php?error=This Aadhar ID <b>".$aadhar."</b> is already exist. Thank You!','_self');</script>";
							exit();
						}
					
					
						$que = "insert into student_master( name, father_name, dob, aadhar, email, mob, reg_code) values('$name','$fname','$dob','$aadhar','$email','$mob','$reg_code')";
												
						$run = mysql_query($que);
							
						if($run){
							
							mkdir("img_folder/$reg_code");
							
							echo "<script>window.open('registration.php?save=Your Registration Succeessfully.<br>Hello: ".$name." <br>Your Registration ID: ".$reg_code." ','_self');</script>";
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
</body>
</html>