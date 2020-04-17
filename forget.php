<?php
session_start();

if(!$_SESSION['forget']){
	header('location:index.php?error=Ypur given information is wrong..!');
}
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
	</head>
<body>
	<!--header part start-->
	<div class='header'>
		<?php include_once('header.php'); ?>
	</div>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content'>
		<div class="welcome">
			<b><br><br><br><br><font color='blue' size='4'><fieldset style="background-color:white;width:auto; height:auto;padding:10px;">Your Password is : </b></font><font color='red' size='4'><?php echo $_SESSION['forget']; ?></fieldset></font>
			</div>
		
		<!--content_body part start-->
		<div class='content_body'>
	
		</div>
		
	</div>
</body>
</html>