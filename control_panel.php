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
	</head>
<body>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation_lock.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content' style="background:linear-gradient(#FFE4E1,#FFFFFF);height:600px;">
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
		
		<!--content_body part start-->
		<div class='content_body'>
			<center>
			<a href='backup_database.php'><img src="icon/backup.png" width="270px" height="80px"/></a>
			</center>
		</div>
		
	</div>
</body>
</html>