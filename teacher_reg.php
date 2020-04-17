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
		<script>
		$(document).ready(function(){

			$("#state").click(function(){
				var user_option = $("#state").val();

				$.post("php/district_check.php",{state:user_option},function(data){

					$("#district").html(data);

				});

			});

		});

		</script>
		<script>
		    $(document).ready(function(){

		      $("#body").click(function(){
		        var dobf = $("#dob").val();

		        $.post("ageCalculate.php",{dob:dobf},function(data){

		          $("#show").html(data);

		        });

		      });

		    });
		</script>
		<script>
		$(document).ready(function(){

			$("#district").click(function(){
				var user_option1 = $("#state").val();
				var user_option2 = $("#district").val();

				$.post("php/block_check.php",{state:user_option1,district:user_option2},function(data){

					$("#block").html(data);

				});

			});

		});

		</script>
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
<body id="body">
	
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
		<form action="teacher_reg.php" method="post" enctype="multipart/form-data">
			<div>
				<table class="table" border="2">
				<tr>
					<td colspan="2" align="center"><a href="teacher_reg.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['save']; ?></center></a></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><a href="teacher_reg.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['error']; ?></center></a></td>				
				</tr>
				
				<tr>
					<td colspan="2" align="center" id="h">Registration here Only Employee</td>
				</tr>
				<tr>
					<td>Employee Name:</td>
					<td><input type="text" id="f1" name="ename" title=" Required Field" onKeyPress="return chkNum(event,'f1')"required/></td>
				</tr>
				<tr>
					<td>Employee Type:</td>
					<td>
						<?php 
							include("php/connect_db.php");
							$query = "SELECT * FROM `emp_type` order by type ASC";
									
							$emp = mysql_query($query);
									
						?>
							<select name="emp_type" id="f1" required>
							<option value="">--- Select Employee Type ---</option>
								
						<?php while($row = mysql_fetch_array($emp)):; ?>
								
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
								
						<?php endwhile; ?>
								
							</select>
					</td>
				</tr>
				<tr>
					<td>Father's Name:</td>
					<td><input type="text" id="f2" name="fname" title=" Required Field" onKeyPress="return chkNum(event,'f2')"required/></td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type="date" id="dob" name="dob" required/><br><span id="show" style="font-size: 15px;color: #FF0000; padding-left: 30px;"></span></td>	
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<?php 
							include("php/connect_db.php");
							$query = "SELECT * FROM gender order by id ASC";
									
							$test = mysql_query($query);
									
						?>
							<select name="gender" id="gender" required>
							<option value="">--- Select any One ---</option>
								
							<?php while($row = mysql_fetch_array($test)):; ?>
								
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
								
							<?php endwhile; ?>
								
							</select>
					</td>	
				</tr>
				<tr>
					<td>Aadhar id:</td>
					<td><input type="text" id="f4" name="aadhar" maxlength=12  onKeyPress="return chkNumOnly(event,'f4')" required /></td>	
				</tr>
				<tr>
					<td>E-mail ID:</td>
					<td><input type="text" id="email" name="email"required /></td>	
				</tr>
				<tr>
					<td>Mobile No:</td>
					<td><input type="text" id="f5" name="mob" maxlength=10  onKeyPress="return chkNumOnly(event,'f5')" required /></td>	
				</tr>
				<tr>
					<td>Permanent Address:</td>
					<td>
						<table class="table">

										<tr><td>
											<?php 
												include("php/connect_db.php");
												$query = "SELECT * FROM `states` order by state_name ASC";
												
												$states = mysql_query($query);
												
											?>
											<select name="state" id="state" >
											<option value="">--- Select State Name ---</option>
											
											<?php while($row = mysql_fetch_array($states)):; ?>
											
											<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
											
											<?php endwhile; ?>
											
											</select>
										</td></tr>

										<tr><td>
											<select name="district" id="district" required>
											</select>
										</td></tr>
										
										<tr><td>
											<select name="block" id="block" >
											</select>
										</td></tr>
										<tr>
											<td><input type="text" id="f6" name="vill" maxlength="30" placeholder="Enter Street/Village name..." required /></td>	
										</tr>
										<tr>
											<td><input type="text" id="f7" name="pin" maxlength="6"  onKeyPress="return chkNumOnly(event,'f7')" placeholder="Enter PIN Code..." /></td>	
										</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>Choose Your Latest Photo:</td>
					<td><input type="file" id="photo" name="file" required/></td>	
				</tr>
				<tr>
					<td>Joining Date:</td>
					<td><input type="date" id="dob" name="jdate" required/></td>	
				</tr>
				<tr>
					<td>Sallary:</td>
					<td><input type="text" id="f8" name="sallary" maxlength=6  onKeyPress="return chkNumOnly(event,'f8')" required /></td>	
				</tr>
				<tr>
					<td colspan="2" height="30px"  style="text-align:center;color:#FF0000;"><b>NOTICE: </b> All fields are required!</td>	
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="save" id="submit" value="Registration" /></td>	
				</tr>
				
				</table>
			</div>
		</form>
		<?php
		$mydate = getdate(date("U"));
		function generatePassword(){
			$array = array('0','1','2','3','4','5','6','7','8','9','A','K','M','S','R');
			
			$password="";
			for($i=0;$i<=5;$i++){
				$index = rand(0,count($array)-1);
				$password.=$array[$index];
			}
			return $password;
		}

			$reg_code = @$mydate[mday].generatePassword().@$mydate[year];
			
		include("php/connect_db.php");
		
		if(isset($_POST['save']))
		{
			$ename = strtoupper($_POST['ename']);
			$emp_type = $_POST['emp_type'];
			$fname = strtoupper($_POST['fname']);
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$aadhar = $_POST['aadhar'];
			$email = $_POST['email'];
			$mob = $_POST['mob'];
			$state = $_POST['state'];
			$district = $_POST['district'];
			$block = $_POST['block'];
			$vill = strtoupper($_POST['vill']);
			$pin = $_POST['pin'];
			$jdate = $_POST['jdate'];
			$sallary = $_POST['sallary'];
			
			$photo = $_FILES['file']['name'];
			$type = $_FILES['file']['type'];
			$size = $_FILES['file']['size'];
			$tmp = $_FILES['file']['tmp_name'];
			
			if($size>=102400)
			{
				echo "<script>alert('Your image Size is large. NOTE: size<=100kb only!');</script>";
				exit();
			}
						if(($type!="image/jpeg") && ($type!="image/jpg") && ($type!="image/gif") && ($type!="image/png")){
							echo "<script>alert('It is accept only jpeg, png & gif file format!');</script>";
							exit();
						}
						$select = "select *from emp_master where emp_email='$email'";

						$run = mysql_query($select);

						$check = mysql_num_rows($run);

						if($check==1){
							echo "<script>window.open('teacher_reg.php?error=This email address <b>".$email."</b> is already exist. Thank You!','_self');</script>";
							exit();
						}
						
						$select = "select *from student_master where emp_aadhar='$aadhar'";

						$run = mysql_query($select);

						$check = mysql_num_rows($run);

						if($check==1){
							echo "<script>window.open('teacher_reg.php?error=This Aadhar ID <b>".$aadhar."</b> is already exist. Thank You!','_self');</script>";
							exit();
						}
						
			$que = "insert into emp_master( emp_name, emp_type, emp_fname, emp_dob, emp_gender, emp_aadhar, emp_email,emp_mob,state,district,block,village,pin,photo,join_date,sallary,reg_code) 
					values('$ename','$emp_type','$fname','$dob','$gender','$aadhar','$email','$mob','$state','$district','$block','$vill','$pin','$photo','$jdate','$sallary','$reg_code')";
												
			$run = mysql_query($que);
							
				if($run)
				{							
					mkdir("img_folder/$reg_code");
					move_uploaded_file($tmp,"img_folder/$reg_code/$photo");
							
					echo "<script>window.open('teacher_reg.php?save=Your Registration Succeessfully.<br>Hello: ".$ename." <br>Your Registration ID: ".$reg_code." ','_self');</script>";
				}
				else{					
					echo "<script>alert('Some error founds!')</script>";
					exit();
				}
			
		}

		?>
		</section>		
	</div>
</body>
</html>