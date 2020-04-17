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
		<link rel="stylesheet" type="text/css" href="AnimateMaster/animate.min.css" media="all" />
	</head>
		<style>
			/* Zebra striping */
			tr:nth-of-type(odd) { 
			  background: #FFF;
			}
			td{ 
			  padding: 7px 4px;  
			  font-size:14px;
			}
			.heading{
				width:90%;
				height:auto;
				float:left;
				background:linear-gradient(#00FFFF,#7FFFD4,#AFEEEE,#F0FFFF);
				text-align:center;
				padding:0px 5%;
				border-radius:5px;
				-moz-border-radius:5px;
				-webkit-border-radius:5px;
			}
			.head a{
				font-size:40px;
				text-decoration:none;
			}
			.head2 a{
				font-size:30px;
				text-decoration:none;
			}
			#input:hover{
				width:80px;
				height:30px;
				padding:2px;
				background:linear-gradient(#0000FF,#00FF00);
				font-size:16px;
				color:#FFF;
				cursor:pointer;
			}
		</style>
<body style="background-color:white;">
			<?php
				include("php/connect_db.php");
				
				@$value = $_GET['details'];

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
				
				$query3 = "SELECT * FROM districts where 	district_id='$district_id'";

				$run3 = mysql_query($query3);

				while($row3 = mysql_fetch_array($run3))
				{
					@$district = $row3['district_name'];
				}
				
				$query4 = "SELECT * FROM blocks where 		block_id='$block_id'";

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
			?>
	<div class='detalis'>
		<div class='heading'>
			<p class="head"><a href="student_list.php"><b>Rozgar Training Center Koderma</b></a></p>
			<p class="head2"><a href="student_list.php">Student Registration Certificate</a></p>		
		</div>
		<table width="90%" style="margin:1% 5%;"><tr><td><fieldset>
			<table width="91%"style="margin:1% 4.5%;"><tr><td>
				<table width="70%" style="float:left;">
					<tr>
						<td>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$name; ?></b></td>
					</tr>
						<td>Father's Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php  echo @$father_name; ?></b></td>
					</tr>
						<td>Mother's Name:&nbsp;&nbsp;&nbsp;&nbsp; <b><?php  echo @$mother_name; ?></b></td>
					</tr>
						<td>Date of Birth:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php  echo @$dob; ?></b></td>
					</tr>
						<td>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$gender; ?></b></td>
					</tr>
				</table>
				<table width="30%" style="float:left; text-align:center;">
					<tr>
						<td>Registration ID: <b><?php  echo @$reg_code; ?></b></td>
					</tr>
						<td><?php echo "<img src='img_folder/$reg_code/$image' widtd='80x' height='100px' align='center' />"; ?></td>
					</tr>
				</table>
			</td></tr></table>
			
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td style="width:400px;">Aadhar No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$aadhar; ?></b></td>
					<td style="width:300px;">Mobile No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$mob; ?></b></td>
				</tr>
				<tr>
					<td colspan="2" align="left">E-mail ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo $email; ?></b></td>
				</tr>
			</table>
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td style="width:400px;">Qualification:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$qualification; ?></b></td>
					<td style="width:300px;">Marital Status:&nbsp;&nbsp;&nbsp;<b><?php  echo @$marital; ?></b></td>
				</tr>
			</table>
			
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td style="width:400px;">State:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$state; ?></b></td>
					<td style="width:300px;">Village:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$village; ?></b></td>
				</tr>
				<tr>
					<td style="width:400px;">District:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$district; ?></b></td>
					<td style="width:300px;">PIN Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$pin; ?></b></td>
				</tr>
				<tr>
					<td colspan="2" align="left">Sub-District:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$block; ?></b></td>
				</tr>
			</table>
			
			<table width="90%"style="margin:1% 5%;">	
				<tr>
					<td colspan="2" align="left">Bank Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$bank_name; ?></b></td>
				</tr>
				<tr>
					<td style="width:400px;">Bank Account:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$bank_account; ?></b></td>
					<td style="width:300px;">Branch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$branch; ?></b></td>
				</tr>
				
			</table>
			
			<table width="90%"style="margin:1% 5%;">	
				<tr>
					<td colspan="2" align="left">Trade:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo $trade; ?></b></td>
					</tr>
				<tr>
					<td colspan="2" align="left">Batch Period:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$batch_period; ?></b></td>				
				</tr>
			</table>
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td style="width:400px;">Admission date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$admission_date; ?></b></td>
					<td style="width:300px;">Pay Fee in Rupees:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$fee; ?></b></td>				
				</tr>			
			</table>
			
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td colspan="2" align="left">Company Name:&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$cname; ?></b></td>
				</tr>
				<tr>
					<td colspan="2" align="left">Job Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$jstatus; ?></b></td>
				</tr>
				<tr>
					<td colspan="2" align="left">Sallary:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$sallary; ?></b></td>
				</tr>
			</table>
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td colspan="2" align="right">Signature's of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>Head of department</td>
				</tr>
				
			</table>
			
		</fieldset></td></tr></table>
		<table width="90%"style="margin:1% 5%;">
				<tr>
					<td align="center"><input id="input" type="button" value="Print" onclick="window.print()" /></td>
				</tr>			
		</table>
	</div>
	
</body>
</html>