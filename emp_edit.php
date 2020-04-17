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
		
		<!--content_body part start-->
		<section class="section">
		<form action="" method="post" enctype="multipart/form-data">
		
			<?php
				include("php/connect_db.php");
				
				 $value = $_GET['edit'];
				$query = "SELECT * FROM emp_master WHERE emp_id='$value'";

				$run = mysql_query($query);

				while($row = mysql_fetch_array($run))
				{
					$emp_name = $row['emp_name'];
					$emp_type_id = $row['emp_type'];
					$emp_fname = $row['emp_fname'];
					$emp_dob = $row['emp_dob'];
					$emp_gender_id = $row['emp_gender'];
					$emp_aadhar = $row['emp_aadhar'];
					$emp_email = $row['emp_email'];
					$emp_mob = $row['emp_mob'];
					$sallary = $row['sallary'];

					$state_id = $row['state'];
					$district_id = $row['district'];
					$block_id = $row['block'];
					$village = $row['village'];
					$pin = $row['pin'];
					$photo = $row['photo'];					
					$jdate = $row['join_date'];
					$reg_code = $row['reg_code'];
				}
				
				$query1 = "SELECT * FROM gender where id='$emp_gender_id'";

				$run1 = mysql_query($query1);

				while($row1 = mysql_fetch_array($run1))
				{
					$gender = $row1['gender_type'];
				}
				
				$query2 = "SELECT * FROM states where state_id='$state_id'";

				$run2 = mysql_query($query2);

				while($row2 = mysql_fetch_array($run2))
				{
					$state = $row2['state_name'];
				}
				
				$query3 = "SELECT * FROM districts where district_id='$district_id'";

				$run3 = mysql_query($query3);

				while($row3 = mysql_fetch_array($run3))
				{
					$district = $row3['district_name'];
				}
				
				$query4 = "SELECT * FROM blocks where block_id='$block_id'";

				$run4 = mysql_query($query4);

				while($row4 = mysql_fetch_array($run4))
				{
					$block = $row4['block_name'];
				}
				
				$query5 = "SELECT * FROM emp_type where id='$emp_type_id'";

				$run5 = mysql_query($query5);

				while($row5 = mysql_fetch_array($run5))
				{
					$emp_type = $row5['type'];
				}
				
			?>
		
			<div>
				<table class="table" border="2">

				<tr>
					<td colspan="2" align="center" id="h">Employee Registration Update </td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="text" id="f1" name="id" value="<?php echo @$value; ?>" hidden /></td>	
				</tr>
				<tr>
					<td>Employee Name:</td>
					<td><input type="text" id="f1" name="ename" value="<?php echo @$emp_name; ?>" title=" Required Field" onKeyPress="return chkNum(event,'f1')"required/></td>
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
							<option value="<?php echo $emp_type_id ; ?>"><?php echo @$emp_type ; ?></option>
								
						<?php while($row = mysql_fetch_array($emp)):; ?>
								
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
								
						<?php endwhile; ?>
								
							</select>
					</td>
				</tr>
				<tr>
					<td>Father's Name:</td>
					<td><input type="text" id="f2" name="fname" value="<?php echo @$emp_fname ; ?>" title=" Required Field" onKeyPress="return chkNum(event,'f2')"required/></td>
				</tr>
				<tr>
					<td>Date of Birth:</td>
					<td><input type="date" id="dob" name="dob" value="<?php echo @$emp_dob ; ?>" required/></td>	
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
							<option value="<?php echo $emp_gender_id ; ?>"><?php echo @$gender ; ?></option>
								
							<?php while($row = mysql_fetch_array($test)):; ?>
								
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
								
							<?php endwhile; ?>
								
							</select>
					</td>	
				</tr>
				<tr>
					<td>Aadhar id:</td>
					<td><input type="text" id="f4" name="aadhar" value="<?php echo @$emp_aadhar ; ?>" maxlength=12  onKeyPress="return chkNumOnly(event,'f4')" required /></td>	
				</tr>
				<tr>
					<td>E-mail ID:</td>
					<td><input type="text" id="email" name="email" value="<?php echo @$emp_email ; ?>"required /></td>	
				</tr>
				<tr>
					<td>Mobile No:</td>
					<td><input type="text" id="f5" name="mob" maxlength=10 value="<?php echo @$emp_mob ; ?>"  onKeyPress="return chkNumOnly(event,'f5')" required /></td>	
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
											<option value="<?php echo $state_id ; ?>"><?php echo @$state ; ?></option>
											
											<?php while($row = mysql_fetch_array($states)):; ?>
											
											<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
											
											<?php endwhile; ?>
											
											</select>
										</td></tr>

										<tr><td>
											<select name="district" id="district" required>
											<option value="<?php echo $district_id ; ?>"><?php echo @$district ; ?></option>
											</select>
										</td></tr>
										
										<tr><td>
											<select name="block" id="block" >
											<option value="<?php echo $block_id ; ?>"><?php echo @$block ; ?></option>
											</select>
										</td></tr>
										<tr>
											<td><input type="text" id="f6" name="vill" value="<?php echo @$village ; ?>" maxlength="30" placeholder="Enter Street/Village name..." required /></td>	
										</tr>
										<tr>
											<td><input type="text" id="f7" name="pin" value="<?php echo @$pin ; ?>" maxlength="6"  onKeyPress="return chkNumOnly(event,'f7')" placeholder="Enter PIN Code..." /></td>	
										</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>Your Latest Photo:</td>
					<td><?php echo "<img src='img_folder/$reg_code/$photo' widtd='80x' height='100px' align='center' />"; ?></td>	
				</tr>
				<tr>
					<td>Joining Date:</td>
					<td><input type="date" id="dob" name="jdate" value="<?php echo @$jdate ; ?>" required/></td>	
				</tr>
				<tr>
					<td>Sallary:</td>
					<td><input type="text" id="f8" name="sallary"value="<?php echo @$sallary ; ?>" maxlength=6  onKeyPress="return chkNumOnly(event,'f8')" required /></td>	
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
		include("php/connect_db.php");
		@$id = $_POST['id'];
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
						
			$que = "update emp_master set emp_name='$ename', emp_type='$emp_type', emp_fname='$fname', emp_dob='$dob', emp_gender='$gender', emp_aadhar='$aadhar', emp_email='$email',emp_mob='$mob', state='$state', district='$district', block='$block', village='$vill', pin='$pin', join_date='$jdate' where emp_id='$id' "; 
												
			$runs = mysql_query($que);
							
				if($runs)
				{														
					echo "<script>window.open('teacher_list.php?update=Hello: ".$ename."<br>Your form Updated Succeessfully. ','_self');</script>";
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