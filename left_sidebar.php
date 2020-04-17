<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/sidebar.css" media="all" />
	</head>
<style>
.rows{
	width:99%;
	height:auto;
	float:left;
	margin:0.5px 0px;
	padding:0.5% 0px;
	border:1px dotted white;
}
.cols1{
	width:10%;
	height:auto;
	float:left;
	text-align:center;
	padding:1px 0px;
}
.cols2 a, .cols2 a:link,.cols2 a:visited{
	width:90%;
	float:left;
	color:blue;
	padding:2px 0px;
	font-size:14px;
	text-align:left;
	text-decoration:none;
}
.cols2 a:hover,.cols2 a:active{
	color:#FF0000;
}
.head img{
	cursor:pointer;
}
#mymarquee2{
	width:100%;
	height:410px;
	margin:10px 0px;
}
</style>
<body>

<!-- part of right sidebar  -->
	<div class='head'>
		<h3><img src="icon/stop.png" title="Play Here" alt="Start button" onClick="document.getElementById('mymarquee2').start();" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latest News&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src="icon/start.png" title="Stop Here" alt="Stop button" onClick="document.getElementById('mymarquee2').stop();" /></h3>
	</div>
	<div class='body'>
	<marquee   direction="up" scrollamount="1" id="mymarquee2">
		<div class='body_part'>
				
			<?php 
				include("php/connect_db.php");

				$que ="select *from document order by 1 DESC  limit 0,20 ";
				$run =mysql_query($que);
				$i=1;
				while($row=mysql_fetch_array($run))
				{
					$id = $row['id'];
					$title = $row['title'];
					$doc_name = $row['doc_name'];	
					$path = $row['path'];
				?>				
				<table class="rows">
				<form action="" method="post">
					<tr>
						<td>
							<div class="cols1"><img src="icon/new.gif"width="100%"></div>
							<div class="cols2"><a href='document/<?php echo $path; ?>/<?php echo $doc_name; ?>' target=_blank> <?php echo $title; ?></a></div>
							<div id="show"></div>
						</td>
					</tr>
					</form>				
				</table>				
			<?php } ?>
				
		</div>
	</marquee>
	</div>	
<!-- part of right sidebar  -->
	<div class='head'>
		<h3>Clean India, Green India</h3>
	</div>
	<div class='body'>
	
		<div class='body_part'>
		<img src="icon/clean_india.jpg" alt="image" width="100%" height="auto">
		</div>
	</div>


</body>
</html>