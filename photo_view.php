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
	<div class='content' style="background:linear-gradient(#FFE4E1,#FFFFFF);height:auto;">
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
		
		<!--content_body part start-->
		<div class='content_body'>
		<?php
			@$id = $_GET['id'];
			include("php/connect_db.php");

					$que ="select *from gallery where id='$id'";
					$run =mysql_query($que);
					$i=1;
					while($row=mysql_fetch_array($run))
					{
						$title = $row['title'];
						$photo = $row['photo'];
						$path = $row['path'];	
					}
			
			echo "<a href='photo_list.php'><img src='gallery/$path/$photo' width='100%' height='auto' align='center' /></a>";
		?>
		</div>
		
	</div>
</body>
</html>