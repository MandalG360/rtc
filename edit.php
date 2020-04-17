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
				
				@$value = $_GET['edit'];

					$q = "select * from student_master where reg_id='$value'";

					$r = mysql_query($q);
					
					while($ro = mysql_fetch_array($r))
					{
						@$mname = $ro['mother_name'];
					}

					if($mname==""){
						$query = "SELECT * FROM student_master WHERE reg_id='$value'";
					}
					else{
						$query = "SELECT * FROM student_master NATURAL JOIN student WHERE reg_id='$value'";
					}

				$run = mysql_query($query);

				while($row = mysql_fetch_array($run))
				{
					@$name = $row['name'];
					@$father_name = $row['father_name'];
					@$mother_name = $row['mother_name'];
					@$dob = $row['dob'];
					@$genderCode = $row['gender'];
					@$aadhar = $row['aadhar'];
					@$email = $row['email'];
					@$mob = $row['mob'];
					@$image = $row['image'];					
					@$sign = $row['sign'];
					
					@$qualification_id = $row['qualification'];					
					@$marital_id = $row['marital'];
					@$state_id = $row['state_id'];
					@$district_id = $row['district_id'];
					@$block_id = $row['block_id'];
					@$village = $row['village'];
					@$pin = $row['pin'];
					@$bank_name = $row['bank_name'];
					@$bank_account = $row['bank_account'];
					@$branch = $row['branch'];
					@$trade = $row['trade'];					
					@$batch_period = $row['batch_period'];
					@$fee = $row['fee'];
					@$admission_date = $row['admission_date'];
					@$cname = $row['company_name'];
					@$jstatus = $row['job_status'];
					@$sallary = $row['sallary'];
					@$reg_code = $row['reg_code'];
					
					
				}
				
				$query1 = "SELECT * FROM gender where id='$genderCode'";

				$run1 = mysql_query($query1);

				while($row1 = mysql_fetch_array($run1))
				{
					@$gender = $row1['gender_type'];
				}
				
				$query2 = "SELECT * FROM states where state_id='$state_id'";

				$run2 = mysql_query($query2);

				while($row2 = mysql_fetch_array($run2))
				{
					@$state = $row2['state_name'];
				}
				
				$query3 = "SELECT * FROM districts where district_id='$district_id'";

				$run3 = mysql_query($query3);

				while($row3 = mysql_fetch_array($run3))
				{
					@$distric = $row3['district_name'];
				}
				
				$query4 = "SELECT * FROM blocks where block_id='$block_id'";

				$run4 = mysql_query($query4);

				while($row4 = mysql_fetch_array($run4))
				{
					@$block = $row4['block_name'];
				}
				
				$query5 = "SELECT * FROM marital where id='$marital_id'";

				$run5 = mysql_query($query5);

				while($row5 = mysql_fetch_array($run5))
				{
					@$marital = $row5['type'];
				}
				
				$query6 = "SELECT * FROM qualification where id='$qualification_id'";

				$run6 = mysql_query($query6);

				while($row6 = mysql_fetch_array($run6))
				{
					@$qualification = $row6['type'];
				}
				if($mother_name==""){
					echo "<script>alert('At first Admission is Required. Then edit function is enabled!')</script>";
					exit();
				}
			?>
		<form action="" method="post" enctype="multipart/form-data">

		<div>
			<table class="table" border="2">
				<tr>
					<td id='h' colspan="2" align="center">Student's Details </td>
				</tr>
				<tr>
					<td><input type="text" id="f1" name="id" value="<?php echo $value; ?>" hidden /></td>	
					<td><input type="text" id="f1" name="path" value="<?php echo $aadhar; ?>" hidden /></td>
				</tr>
				<tr>
					<td>Student's Name:</td>
					<td><input type="text" id="f1" name="name" value="<?php echo @$name; ?>"  required/></td>	
				</tr>
				<tr>
					<td>Father's Name:</td>
					<td><input type="text" id="f2" name="fname"value="<?php echo @$father_name; ?>" required /></td>	
				</tr>
				<tr>
					<td>Mother's Name:</td>
					<td><input type="text" id="f3" name="mname" value="<?php echo @$mother_name; ?>" maxlength="30" onKeyPress="return chkNum(event,'f3')" required /></td>	
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type="date" id="dob" name="dob" value="<?php echo @$dob; ?>"  required/></td>	
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
							<option value="<?php echo @$genderCode; ?>"><?php echo @$gender; ?></option>
								
							<?php while($row = mysql_fetch_array($test)):; ?>
								
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
								
							<?php endwhile; ?>
								
							</select>
					</td>	
				</tr>
				<tr>
					<td>Aadhar id:</td>
					<td><input type="text" id="f4" name="aadhar" value="<?php echo @$aadhar; ?>" required /></td>	
				</tr>
				<tr>
					<td>E-mail ID:</td>
					<td><input type="text" id="email" name="email" value="<?php echo @$email; ?>" required /></td>	
				</tr>
				<tr>
					<td>Mobile No:</td>
					<td><input type="text" id="f5" name="mob" value="<?php echo @$mob; ?>" required /></td>	
				</tr>
				<tr>
					<td>Qualification:</td>
					<td>
						<?php 
							include("php/connect_db.php");
							$q1 = "SELECT * FROM qualification order by type ASC";
									
							$t1 = mysql_query($q1);
									
						?>
							<select name="qualification" id="gender" required>
							<option value="<?php echo $qualification_id; ?>"><?php echo @$qualification; ?></option>
								
							<?php while($r1 = mysql_fetch_array($t1)):; ?>
								
							<option value="<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?></option>
								
							<?php endwhile; ?>
								
							</select>
					</td>	
				</tr>
				<tr>
					<td>Marital Status:</td>
					<td>
						<?php 
							include("php/connect_db.php");
							$q2 = "SELECT * FROM marital order by type ASC";
									
							$t2 = mysql_query($q2);
									
						?>
							<select name="marital" id="gender" required>
							<option value="<?php echo $marital_id; ?>"><?php echo @$marital; ?></option>
								
							<?php while($r2 = mysql_fetch_array($t2)):; ?>
								
							<option value="<?php echo $r2[0]; ?>"><?php echo $r2[1]; ?></option>
								
							<?php endwhile; ?>
								
							</select>
					</td>	
				</tr>
				<tr>
					<td>Photo:</td>
					<td><?php echo "<img src='img_folder/$reg_code/$image' widtd='80x' height='100px' align='center' />"; ?></td>	
				</tr>
				<tr>
					<td>Scan Signature:</td>
					<td><?php echo "<img src='img_folder/$reg_code/$sign' widtd='100px' height='50px' align='center' />"; ?></td>	
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
											<option value="<?php echo $state_id; ?>"><?php echo @$state; ?></option>
											
											<?php while($row = mysql_fetch_array($states)):; ?>
											
											<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
											
											<?php endwhile; ?>
											
											</select>
										</td></tr>

										<tr><td>
											<select name="district" id="district" required>
											<option value="<?php echo $district_id; ?>"><?php echo @$distric; ?></option>
											</select>
										</td></tr>
										
										<tr><td>
											<select name="block" id="block" >
											<option value="<?php echo $block_id; ?>"><?php echo @$block; ?></option>
											</select>
										</td></tr>
										<tr>
											<td><input type="text" id="f6" name="vill" value="<?php echo @$village; ?>" maxlength="30" placeholder="Enter Street/Village name..." required /></td>	
										</tr>
										<tr>
											<td><input type="text" id="f7" name="pin" value="<?php echo @$pin; ?>" maxlength="6"  onKeyPress="return chkNumOnly(event,'f7')" placeholder="Enter PIN Code..." required/></td>	
										</tr>
									</table>
				<tr>
					<td id='h' colspan="2" align="center">Bank Details </td>
				</tr>
				<tr>
					<td>Bank Name:</td>
					<td><input type="text" id="f8" name="bname" value="<?php echo @$bank_name; ?>" maxlength="60" onKeyPress="return chkNum(event,'f8')"/></td>	
				</tr>
				<tr>
					<td>Bank Account no:</td>
					<td><input type="text" id="f9" name="baccount" value="<?php echo @$bank_account; ?>" maxlength="20"  onKeyPress="return chkNumOnly(event,'f9')"/></td>	
				</tr>
				<tr>
					<td>Branch:</td>
					<td><input type="text" id="f10" name="branch" value="<?php echo @$branch; ?>" maxlength="30" onKeyPress="return chkNum(event,'f10')"/></td>	
				</tr>
				<tr>
					<td id='h' colspan="2" align="center">Admission Details </td>
				</tr>
				<tr>
					<td>Trade:</td>
					<td><input type="text" id="f11" name="trade" value="<?php echo @$trade; ?>" maxlength="60" onKeyPress="return chkNum(event,'f11')" required /></td>	
				</tr>
				<tr>
					<td>Batch Period:</td>
					<td><input type="text" id="f12" name="period"  value="<?php echo @$batch_period; ?>" required /></td>	
				</tr>
				<tr>
					<td>Pay Fee in Rupees:</td>
					<td><input type="text" id="f13" name="pay" value="<?php echo @$fee; ?>" maxlength="6"  onKeyPress="return chkNumOnly(event,'f9')"required /></td>	
				</tr>
				<tr>
					<td>Admission Date:</td>
					<td><input type="date" id="f14" name="addm_date" value="<?php echo @$admission_date; ?>" required/></td>	
				</tr>
				<tr>
					<td id='h' colspan="2" align="center">Job Details </td>
				</tr>
				<tr>
					<td>Company Name:</td>
					<td><input type="text" id="f15" name="cname" value="<?php echo @$cname; ?>" maxlength="60" onKeyPress="return chkNum(event,'f15')"/></td>	
				</tr>
				<tr>
					<td>Job Status:</td>
					<td><input type="text" id="f16" name="jstatus" value="<?php echo @$jstatus; ?>" maxlength="60" onKeyPress="return chkNum(event,'f16')"/></td>	
				</tr>
				<tr>
					<td>Sallary:</td>
					<td><input type="text" id="f17" name="sallary" value="<?php echo @$sallary; ?>" maxlength="6"  onKeyPress="return chkNumOnly(event,'f17')"/></td>	
				</tr>
				<tr>
					<td colspan="2" align="center" height="30px"></td>	
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="save" id="submit" value="Update" /></td>	
				</tr>
			</table>
		</div>
		</form>
		<?php
			@$id = $_POST['id'];

				include("php/connect_db.php");
	
				if(isset($_POST['save']))
				{
					$name = strtoupper($_POST['name']);
					$fname = strtoupper($_POST['fname']);
					$mname = strtoupper($_POST['mname']);
					$dob = $_POST['dob'];
					$gender = $_POST['gender'];
					$aadhar = $_POST['aadhar'];
					$email = $_POST['email'];
					$mob = $_POST['mob'];
					
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
					
					$cname = $_POST['cname'];
					$jstatus = $_POST['jstatus'];
					$sallary = $_POST['sallary'];

						$que2 = "update student_master set name='$name', father_name='$fname', mother_name='$mname', dob='$dob', gender='$gender', aadhar='$aadhar', email='$email', mob='$mob' where reg_id='$id'";
						
						$run2 = mysql_query($que2);
						
						if($run2){
							
							$que3 = "update student set qualification='$qualification', marital='$marital', state_id='$state', district_id='$district', block_id='$block', village='$village', pin='$pin', bank_name='$bname', bank_account ='$baccount', branch='$branch', trade ='$trade ', batch_period='$period', fee='$fee', admission_date='$addm_date', company_name ='$cname', job_status='$jstatus', sallary='$sallary' where reg_id='$id'";
						
							$run3 = mysql_query($que3);
							
							if($run3){
								echo "<script>window.open('student_list.php?update=Updated is Successfully of ".$name." ','_self')</script>";
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