<!DOCTYPE html>

<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
	</head>
<style>
#photo{
	float:left;
	width:130px;
	height:110px;
	padding:5px;
	margin:5px;
	text-align:center;
	background-color:#8DBC8F;
}
#photo:hover{
	width:140px;
	height:120px;
	background-color:#cacaca;
	cursor:pointer;
	margin:0px;
}
/* The Modal (background) */
.modal2 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 5px;
}

/* Modal Content/Box */
.modal2-content {
    background-color: #fefefe;
    margin: 2% 10% 0.1% 10%; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}
.p{
	float:left;
	width:100%;
	height:auto;
}
</style>
<body BACKGROUND="icon/nice.jpg">
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
			<a href="index.php"><center style="color:red;font-size:20;"><?php echo @$_GET['error']; ?></center></a>
			<a href="index.php"><center style="color:red;font-size:20;"><?php echo @$_GET['logout']; ?></center></a>
		</div>
		<!--left_content part start-->
		<div class='left_content'>
			<?php include_once('left_sidebar.php'); ?>
		</div>
		
		<!--middle_content part start-->
		<div class='middle_content'>
		
			<!--description part start-->
			<div class='description'>
			
				<!--description-head part start-->
				<div class='description_head'>
					<center><b> RTC Koderma Photo Gallery Desk</b></center>
				</div>
				
				<!--description-body part start-->
				<div class='description_body'>
					<?php
						include("php/connect_db.php");
						
						$que ="select *from gallery order by 1 DESC limit 0, 40 ";
						$run =mysql_query($que);
						$i=1;
						while($row=mysql_fetch_array($run))
						{
							$id = $row['id'];
							$title = $row['title'];
							$photo = $row['photo'];	
							$path = $row['path'];
							?>
									<div id="photo"><b onclick="document.getElementById('photos').style.display='block'"><?php echo "<img src='gallery/$path/$photo' width='130px' height='110px' align='center' />"; ?></b></div>
								
					<?php } ?>
				</div>	
				
				<!--description-foot part start-->
				<div class='description_foot'>
					
				</div>
				
			</div>
			
		</div>
		
		<!--right_content part start-->
		<div class='right_content'>
			<?php include_once('right_sidebar.php'); ?>
		</div>		
	</div>
	
	<!--footer part start-->
	<div class='footer'>
		<?php include_once('footer.php'); ?>
	</div>
<div id="photos" class="modal2"> 
	<form class="modal2-content animate " action="" method="post" style=" background-color: rgba(0,0,0,0.4);">
		<div class="x">
			<span onclick="document.getElementById('photos').style.display='none'" title="Close Modal">&times;</span>
		</div>
		<div class="P">
			<img src='gallery/<?php echo $path; ?>/<?php echo $photo; ?>' width='100%' height='575px' align='center' />
		</div>	
	</form>
</div>
</body>
</html>