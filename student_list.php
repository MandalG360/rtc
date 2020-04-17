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

		<script>
		$(document).ready(function(){

			$("#s").keyup(function(){

				$.get("php/search.php",{search:$(this).val()},function(data){
					$("datalist").empty();
					$("datalist").html(data);
				});

			});

		});

		</script>
	</head>
<body>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation_lock.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content' id="content">
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
		
		<!--content_body part start-->
		<section class="section2">
		<form action="student_list.php" method="post">
			
				<div class="top">
					<section>
						<label><a href="student_list.php"><center style="color:red;font-size:18px;"><?php echo @$_GET['update']; ?></center></a></label>
						<label for="s"><p id="ht">Admission & Registration List Of Student
						<input type="text" list="myname" id="s" name="search" title="Search by Name..." placeholder="Search by Name..." /></p></label>
						<datalist id="myname">
							
						</datalist>
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
					<th>Admission</th>
					<th>Edit</th>
					<th>Details</th>
				</tr>

				<tr>
					<?php 
					include("php/connect_db.php");

					$que ="select *from student_master order by 1 DESC";
					$run =mysql_query($que);
					$i=1;
					while($row=mysql_fetch_array($run))
					{
						$reg_id = $row['reg_id'];
						$name = $row['name'];
						$fname = $row['father_name'];
						$aadhar = $row['aadhar'];
						$mob = $row['mob'];
						$gender = $row['gender'];
						
						if($gender==""){
							$show = "<font color='#0000FF'>Panding...</font>";	
						}
						else{
							$show = "<font color='#00FF00'>Complete</font>";
						}
					?>
					<td style="color:#FF0000;"><?php echo $i; $i++;?></td>
					<td><?php echo $reg_id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $fname ?></td>
					<td><?php echo $aadhar; ?></td>
					<td><?php echo $mob ?></td>	
					<td><?php echo $show; ?></td>	
					<td><a href='edit.php?edit=<?php echo $reg_id; ?>' style="color:#006400;">Edit</a></td>
					<td><a href='details.php?details=<?php echo $reg_id; ?>' style="color:#8B0000;">Details</td>
				</tr>
					<?php } ?>
				</table>
			</div>

		</form>
		</section>		
	</div>
</body>
<script type="text/javascript">
function search(){
var str=document.getElementById('content');
var find=document.getElementById('s');
var patt1=/find/g;
document.write(str.match(patt1));
}
</script>
</html>