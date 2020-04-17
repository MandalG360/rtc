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
			<div>
				<a href="admission_form.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['message']; ?></center></a>
			</div>
		<!--content_body part start-->
		<section class="section">

			<?php
				include("php/connect_db.php");
				
				@$value = $_GET['send'];
				
				$query = "select * from student_master where dob='$value' OR aadhar='$value' OR mob='$value'";

				$run = mysql_query($query);

				while($row = mysql_fetch_array($run))
				{
					@$ids = $row['reg_id'];
					@$name = $row['name'];
					@$father_name = $row['father_name'];
					@$dob = $row['dob'];
					@$aadhar = $row['aadhar'];
					@$email = $row['email'];
					@$mob = $row['mob'];
					@$image = $row['image'];
					@$reg_code = $row['reg_code'];
				}
			?>
		<form action="" method="post" enctype="multipart/form-data">

		<div>
			<table class="table" border="2">
				<tr>
					<td id='h' colspan="2" align="center">Student's Details </td>
				</tr>
				<tr>
					<td><input type="password" id="f1" name="id" value="<?php echo $ids; ?>" hidden /></td>	
					<td><input type="password" id="f1" name="path" value="<?php echo $reg_code; ?>" hidden /></td>
				</tr>
				<tr>
					<td>Student's Name:</td>
					<td><input type="text" id="f1" name="name" value="<?php echo $name; ?>" disabled /></td>	
				</tr>
				<tr>
					<td>Father's Name:</td>
					<td><input type="text" id="f2" name="fname"value="<?php echo $father_name; ?>" disabled /></td>	
				</tr>
				<tr>
					<td>Mother's Name:</td>
					<td><input type="text" id="f3" name="mname" maxlength="30" onKeyPress="return chkNum(event,'f3')" required /><font color="#FF0000">*</font></td>	
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type="text" id="dob" name="fname" value="<?php echo $dob; ?>" disabled /></td>	
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
								
							</select><font color="#FF0000">*</font>
					</td>	
				</tr>
				<tr>
					<td>Aadhar id:</td>
					<td><input type="text" id="f4" name="aadhar" value="<?php echo $aadhar; ?>" disabled /></td>	
				</tr>
				<tr>
					<td>E-mail ID:</td>
					<td><input type="text" id="email" name="email" value="<?php echo $email; ?>" disabled /></td>	
				</tr>
				<tr>
					<td>Mobile No:</td>
					<td><input type="text" id="f5" name="mob" value="<?php echo $mob; ?>" disabled /></td>	
				</tr>
				<tr>
					<td>Qualification:</td>
					<td>
						<?php 
							include("php/connect_db.php");
							$query = "SELECT * FROM `qualification` order by type ASC";
												
							$qua = mysql_query($query);
												
						?>
							<select name="qualification" id="f5" >
							<option value="">--- Select any Option ---</option>
						<?php while($row = mysql_fetch_array($qua)):; ?>
											
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
											
						<?php endwhile; ?>
											
							</select><font color="#FF0000">*</font>
					</td>
				</tr>
				<tr>
					<td>Marital Status:</td>
					<td>
						<?php 
							include("php/connect_db.php");
							$query = "SELECT * FROM `marital` order by type ASC";
												
							$marital = mysql_query($query);
												
						?>
							<select name="marital" id="f5" >
							<option value="">--- Select any Option ---</option>
						<?php while($row = mysql_fetch_array($marital)):; ?>
											
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
											
						<?php endwhile; ?>
											
							</select><font color="#FF0000">*</font>
					</td>
				</tr>
				<tr>
					<td>Photo:</td>
					<td><input type="file" id="f6" name="files" /><font color="#FF0000">*</font></td>
				</tr>
				<tr>
					<td>Scan Signature:</td>
					<td><input type="file" id="sign" name="file" required/><font color="#FF0000">*</font></td>	
				</tr>
				<tr>
					<td id='h' colspan="2" align="center">Address Details </td>
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
											</select><font color="#FF0000">*</font>
										</td></tr>
										
										<tr><td>
											<select name="block" id="block" >
											</select>
										</td></tr>
										<tr>
											<td><input type="text" id="f6" name="vill" maxlength="30" placeholder="Enter Street/Village name..." required /><font color="#FF0000">*</font></td>	
										</tr>
										<tr>
											<td><input type="text" id="f7" name="pin" maxlength="6"  onKeyPress="return chkNumOnly(event,'f7')" placeholder="Enter PIN Code..." /><font color="#FF0000">*</font></td>	
										</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td id='h' colspan="2" align="center">Bank Details </td>
				</tr>
				<tr>
					<td>Bank Name:</td>
					<td><input type="text" id="f8" name="bname" maxlength="60" onKeyPress="return chkNum(event,'f8')"/></td>	
				</tr>
				<tr>
					<td>Bank Account no:</td>
					<td><input type="text" id="f9" name="baccount" maxlength="20"  onKeyPress="return chkNumOnly(event,'f9')"/></td>	
				</tr>
				<tr>
					<td>Branch:</td>
					<td><input type="text" id="f10" name="branch" maxlength="30" onKeyPress="return chkNum(event,'f10')"/></td>	
				</tr>
				<tr>
					<td id='h' colspan="2" align="center">Admission Details </td>
				</tr>
				<tr>
					<td>Trade:</td>
					<td><input type="text" id="f11" name="trade" maxlength="60" onKeyPress="return chkNum(event,'f11')" required /><font color="#FF0000">*</font></td>	
				</tr>
				<tr>
					<td>Batch Period:</td>
					<td><input type="text" id="f12" name="period" required /><font color="#FF0000">*</font></td>	
				</tr>
				<tr>
					<td>Pay Fee in Rupees:</td>
					<td><input type="text" id="f13" name="pay" maxlength="6"  onKeyPress="return chkNumOnly(event,'f9')"required /><font color="#FF0000">*</font></td>	
				</tr>
				<tr>
					<td>Admission Date:</td>
					<td><input type="date" id="f14" name="addm_date" required/><font color="#FF0000">*</font></td>	
				</tr>
				<tr>
					<td colspan="2" align="center" height="30px"></td>	
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="save" id="submit" value="Submit" /></td>	
				</tr>
			</table>
		</div>
		</form>
		<?php
			@$id = $_POST['id'];
			@$path = $_POST['path'];

				include("php/connect_db.php");
	
				if(isset($_POST['save']))
				{
					$mname = strtoupper($_POST['mname']);
					$gender = $_POST['gender'];
					
					@$photo = $_FILES['files']['name'];
					@$type = $_FILES['files']['type'];
					@$size = $_FILES['files']['size'];
					@$tmps = $_FILES['files']['tmp_name'];
					
					@$sign = $_FILES['file']['name'];
					@$type = $_FILES['file']['type'];
					@$size = $_FILES['file']['size'];
					@$tmp = $_FILES['file']['tmp_name'];
					
					$qualification = $_POST['qualification'];
					$marital = $_POST['marital'];
					$state = $_POST['state'];
					$district = $_POST['district'];
					$block = $_POST['block'];
					$vill = strtoupper($_POST['vill']);
					$pin = $_POST['pin'];
					$bname = strtoupper($_POST['bname']);
					$baccount = $_POST['baccount'];
					$branch = strtoupper($_POST['branch']);
					$trade = strtoupper($_POST['trade']);
					$period = $_POST['period'];
					$pay = $_POST['pay'];
					$addm_date = $_POST['addm_date'];
					
						if($size>=102400){
							echo "<script>alert('Your image Size is large. NOTE: size<=100kb only!');</script>";
							exit();
						}
						if(($type!="image/jpeg") && ($type!="image/jpg") && ($type!="image/gif") && ($type!="image/png")){
							echo "<script>alert('It is accept only jpeg, png & gif file format!');</script>";
							exit();
						}
						
						$que2 = "update student_master set mother_name='$mname', gender='$gender', image='$photo', sign='$sign' where reg_id='$id'";
						
						$run2 = mysql_query($que2);
						
						if($run2){
							
							$que3 = "insert into student (reg_id,qualification,marital,state_id,district_id,block_id,village,pin,bank_name,bank_account,branch,trade,batch_period,fee,admission_date) 
									values('$id','$qualification','$marital','$state','$district','$block','$vill','$pin','$bname','$baccount','$branch','$trade','$period','$pay','$addm_date')";
							
							$run3 = mysql_query($que3);
							
							if($run3){
								move_uploaded_file($tmps,"img_folder/$path/$photo");
								move_uploaded_file($tmp,"img_folder/$path/$sign");
								echo "<script>window.open('admission.php?message=Admission Completed Successfully!','_self')</script>";
							}
							else{
								echo "<script>alert('Some error founds?. Try again!')</script>";
							exit();
						}
						}
						else{
							echo "<script>alert('Some error found?. Try again!')</script>";
							exit();
						}
				}
		?>
		</section>		
	</div>
</body>
</html>