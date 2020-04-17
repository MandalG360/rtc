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
			function Confirm()
			{
				if (confirm("NOTE: Please check all spelling.                                         Click     Cancel      button for check spelling AND              Click     OK     button for Save data.")) {
				}
				else 
				{
					return false;
				}
			}
		</script>
		<script>
		$(document).ready(function(){

			$("#state").click(function(){
				var user_option = $("#state").val();

				$.post("php/district_select.php",{state:user_option},function(data){

					$("#show").html(data);

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
	<div class='content'>
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
		
		<!--content_body part start-->
		<div class='content_body'>
		
			<div class="insert_form">
				<label><b>Insert Name of Sub-District</b></label><br><br>

				<label>
					<br><br><hr><br><br>
				</label>
				
				<form action="block.php" method="post">
					<div>
						<table class="table">

							<tr>
								<?php 
									include("php/connect_db.php");
									$query = "SELECT * FROM `states` order by state_name ASC";
									
									$states = mysql_query($query);
									
								?>
								<select name="state" id="state">
								<option value="">--- Select State Name ---</option>
								
								<?php while($row = mysql_fetch_array($states)):; ?>
								
								<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
								
								<?php endwhile; ?>
								
								</select>
							</tr>

							<tr>
								<td id="show"></td>
							</tr>

							
							<tr>
								<td style="color:#FF4500; text-align:justify; font-size:24px bold;">Insert Sub-District Name</td>
							</tr>
							
							<tr id="err">   <!-- this id is used for only color-text -->
								<td id="error"></td><!-- this id is used for only notice error -->
							</tr>
							<tr>
								<td><input type="text" id="block" name="block" placeholder="Plz enter Sub-District name..." onchange="myBlock()" onBlur="chkBlnk('block','error')" onKeyPress="return chkNum(event,'error')" /></td>
							</tr>
							
							<tr>
								<td><input type="submit" id="submit" name="submit" value=" Save "  onclick="return Confirm();"/></td>
							</tr>
						</table>
					</div>
					
					<a href="block.php"><center style="color:red;font-size:24px;"><?php echo @$_GET['save']; ?></center></a>
					
				</form>
				<?php 
					if(isset($_POST['submit'])){
						
						include("php/connect_db.php");
						
						$state = $_POST['state'];
						
						@$district = $_POST['district'];
						
						$block = $_POST['block'];
						
						if($state==''||$district==''||$block==''){
							echo "<script>alert('Plz Insert all fields!')</script>";
							exit();
						}
							$select = "select *from blocks where block_name='$block'";

							$run = mysql_query($select);

							$check = mysql_num_rows($run);

							if($check==1){
								echo "<a href='block.php' style='color:black;text-decoration:none;'><h3>".$block." is already exist!!!. Thank You. </h3></a>";
								exit();
							}
							
						
						$que1 = "insert into blocks(block_name,state_id,district_id) values('$block','$state','$district')";
						
						$run = mysql_query($que1);
						
						if($run){
							echo "<script>window.open('block.php?save=Your Data has been Saved. THANK YOU!!!','_self');</script>";
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