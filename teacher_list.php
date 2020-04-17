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
						<label><p id="ht">Employee Registration List</p></label>
						<form action="" method="post">
						<label><p id="sb"><input type="text" name="src" id="s" name="search" title="insert student name"><input type="button" name="search" id="b" title="Search Here" value="Search"></p></label>
						</form>
					</section>
				</div>
			<div>
				<table class="table">
				<tr>
					<th>S.N.</th>
					<th>Employee's Name</th>
					<th>Father's Name</th>
					<th>E-mail ID</th>
					<th>Aadhar ID</th>
					<th>Mobile</th>
					<th>Edit</th>
					<th>Details</th>
				</tr>

				<tr>
					<?php 
					include("php/connect_db.php");

					$que ="select *from emp_master order by 1 DESC";
					$run =mysql_query($que);
					$i=1;
					while($row=mysql_fetch_array($run))
					{
						@$emp_id = $row['emp_id'];
						$emp_name = $row['emp_name'];
						$emp_fname = $row['emp_fname'];
						$emp_email = $row['emp_email'];
						$emp_aadhar = $row['emp_aadhar'];
						$emp_mob = $row['emp_mob'];
					?>
					<td style="color:#FF0000;"><?php echo $i; $i++;?></td>
					<td><?php echo $emp_name; ?></td>
					<td><?php echo $emp_fname ?></td>
					<td><?php echo $emp_email; ?></td>
					<td><?php echo $emp_aadhar ?></td>	
					<td><?php echo $emp_mob; ?></td>	
					<td><a href='emp_edit.php?edit=<?php echo $emp_id; ?>' style="color:#006400;">Edit</a></td>
					<td><a href='emp_details.php?details=<?php echo $emp_id; ?>' style="color:#8B0000;">Details</td>
				</tr>
					<?php } ?>
				</table>
			</div>

		</form>
		</section>		
	</div>
</body>
</html>