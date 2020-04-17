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
		<div class='content_body'>
		
			<div class="insert_form">
				<label><b>Insert Name of State</b></label><br><br>

				<label>
					<br><br><hr><br><br>
				</label>
				
				<form action="state.php" method="post">
					<div>
						<table class="table">
							<tr>
								<td style="color:#FF4500; text-align:justify; font-size:24px bold;">Insert State Name</td>
							</tr>
							<tr id="err">   <!-- this id is used for only color-text -->
								<td id="error"></td><!-- this id is used for only notice error -->
							</tr>
							<tr>
								<td><input type="text" id="state" name="state" placeholder="Plz enter state name..." onchange="myState()" onBlur="chkBlnk('state','error')" onKeyPress="return chkNum(event,'error')" disabled /></td>	
							</tr>
							
							<tr>
								<td><input type="submit" id="submit" name="submit" value=" Save " /></td>
							</tr>
						</table>
					</div>
					
					<a href="state.php"><center style="color:red;font-size:24px;"><?php echo @$_GET['save']; ?></center></a>
					
				</form>
				<?php 
					if(isset($_POST['submit'])){
						
						include("php/connect_db.php");
						
						@$state = $_POST['state'];
						
						if($state==''){
							echo "<script>alert('Plz Insert State Name!');</script>";
							exit();
						}
						
							$select = "select *from states where state_name='$state'";

							$run = mysql_query($select);

							$check = mysql_num_rows($run);

							if($check==1){
								echo "<a href='state.php' style='color:black;text-decoration:none;'><h3>".$state." is already exist!!!. Thank You. </h3></a>";
								exit();
							}
						
						$que1 = "insert into states(state_name ) values('$state')";
						
						$run = mysql_query($que1);
						
						if($run){
							echo "<script>window.open('state.php?save=Your Data has been Saved. THANK YOU!!!','_self');</script>";
						}
						else
							echo "<script>alert('Some error founds!')</script>";
							exit();
					}
				?>
			</div>
			
		</div>
		
	</div>
</body>
</html>