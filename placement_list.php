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
		<link rel="stylesheet" type="text/css" href="css/list_sheet.css" media="all" />
		<script src="js/jquery.js"></script>
		<script src="js/upperCase.js"></script>
	</head>
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
		<section class="section2">
		<form action="student_list.php" method="post">
			<div class="top">
					<section>
						<label><a href="student_list.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['update']; ?></center></a></label>
						<label><p id="ht">Placement List </p></label>
						<form action="" method="post">
						<label><p id="sb"><input type="text" name="src" id="s" name="search" title="insert student name"><input type="button" name="search" id="b" title="Search Here" value="Search"></p></label>
						</form>
					</section>
				</div>
			<div>
				<table class="table">
				<tr>
					<th>S.N.</th>
					<th>ID</th>
					<th>Student's Name</th>
					<th>Father's Name</th>
					<th>Aadhar ID</th>
					<th>Mobile</th>
					<th>Company Name</th>
					<th>Job Status</th>
					<th>Details</th>
				</tr>

				<tr>
					<?php 
					include("php/connect_db.php");

					$que = "SELECT * FROM student_master NATURAL JOIN student WHERE sallary>1";
					$run =mysql_query($que);
					$i=1;
					while($row=mysql_fetch_array($run))
					{
						$reg_id = $row['reg_id'];
						$name = $row['name'];
						$fname = $row['father_name'];
						$aadhar = $row['aadhar'];
						$mob = $row['mob'];
						$company_name = $row['company_name'];
						$job_status = $row['job_status'];
					?>
					<td style="color:#FF0000;"><?php echo $i; $i++;?></td>
					<td><?php echo $reg_id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $fname ?></td>
					<td><?php echo $aadhar; ?></td>
					<td><?php echo $mob ?></td>	
					<td><?php echo $company_name; ?></td>	
					<td><?php echo $job_status; ?></td>
					<td><a href='details.php?details=<?php echo $reg_id; ?>' style="color:#8B0000;">Details</td>
				</tr>
					<?php } ?>
				</table>
			</div>

		</form>
		</section>		
	</div>
</body>
</html>