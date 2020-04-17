<!DOCTYPE html>

<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
	</head>
<style>
.rows1{
	width:99%;
	height:auto;
	float:left;
	margin:0.5px 0px;
	padding:0.5% 0px;
	border:1px dotted white;
}
.cols11{
	width:5%;
	height:auto;
	float:left;
	text-align:center;
	padding:1px 0px;
}
.cols12 a, .cols12 a:link,.cols12 a:visited{
	width:95%;
	float:left;
	color:blue;
	padding:2px 0px;
	font-size:14px;
	text-align:left;
	text-decoration:none;
}
.cols12 a:hover,.cols12 a:active{
	color:#FF0000;
}
.head img{
	cursor:pointer;
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
					Find result of the given Notice below
				</div>
				
				<!--description-body part start-->
				<div class='description_body'>
					<?php 
						include("php/connect_db.php");

						$que ="select *from document order by 1 DESC  limit 0,50 ";
						$run =mysql_query($que);
						$i=1;
						
						while($row=mysql_fetch_array($run))
						{
							$id = $row['id'];
							$title = $row['title'];
							$doc_name = $row['doc_name'];
							$path = $row['path'];
						?>				
						<table class="rows1">
						<form action="" method="post">
						
							<tr>
								<td>
									<div class="cols11"><?php echo $i++; ?> : </div>
									<div class="cols12"><a href='document/<?php echo $path; ?>/<?php echo $doc_name; ?>' target=_blank> <?php echo $title; ?></a></div>
									<div id="show"></div>
								</td>
							</tr>
							</form>				
						</table>				
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

</body>
</html>