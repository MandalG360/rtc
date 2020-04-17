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
			  padding: 8px 4px;  
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

				$query = "SELECT * FROM emp_master WHERE emp_id='$value'";

				$run = mysql_query($query);

				while($row = mysql_fetch_array($run))
				{
					@$emp_name = $row['emp_name'];
					@$emp_type_id = $row['emp_type'];
					@$emp_fname = $row['emp_fname'];
					@$emp_dob = $row['emp_dob'];
					@$emp_gender_id = $row['emp_gender'];
					@$emp_aadhar = $row['emp_aadhar'];
					@$emp_email = $row['emp_email'];
					@$emp_mob = $row['emp_mob'];
					@$sallary = $row['sallary'];

					@$state_id = $row['state'];
					@$district_id = $row['district'];
					@$block_id = $row['block'];
					@$village = $row['village'];
					@$pin = $row['pin'];
					@$photo = $row['photo'];
					@$reg_code = $row['reg_code'];
					@$jdate = $row['join_date'];					
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
	<div class='detalis'>
		<div class='heading'>
			<p class="head"><a href="teacher_list.php"><b>Rozgar Training Center Koderma</b></a></p>
			<p class="head2"><a href="teacher_list.php">Employee Registration Certificate</a></p>		
		</div>
		<table width="90%" style="margin:0px 5%;"><tr><td><fieldset>
			<table width="91%"style="margin:1% 4.5%;"><tr><td>
				<table width="70%" style="float:left;">
					<tr>
						<td>Employee Name:&nbsp;&nbsp;&nbsp;<b><?php  echo @$emp_name; ?></b></td>
					</tr>
					<tr>
						<td>Employee Type:&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$emp_type; ?></b></td>
					</tr>
					<tr>
						<td>Father's Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php  echo @$emp_fname; ?></b></td>
					</tr>
					
					<tr>
						<td>Date of Birth:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php  echo @$emp_dob; ?></b></td>
					</tr>
					<tr>
						<td>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$gender; ?></b></td>
					</tr>
				</table>
				<table width="30%" style="float:left; text-align:center;">
					<tr>
						<td>Registration ID: <b><?php  echo @$reg_code; ?></b></td>
					</tr>
						<td><?php echo "<img src='img_folder/$reg_code/$photo' widtd='80x' height='100px' align='center' />"; ?></td>
					</tr>
				</table>
			</td></tr></table>
			
			<table width="90%"style="margin:1% 5%;">
				<tr>
					<td style="width:400px;">Aadhar No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$emp_aadhar; ?></b></td>
					<td style="width:300px;">Mobile No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$emp_mob; ?></b></td>
				</tr>
				<tr>
					<td colspan="2" align="left">E-mail ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo $emp_email; ?></b></td>
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
					<td colspan="2" align="left">Joining date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$jdate; ?></b></td>				
				</tr>
				<tr>
					<td colspan="2" align="left">Sallary:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php  echo @$sallary; ?></b></td>
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