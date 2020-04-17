<!DOCTYPE html>
<html>
<head>
	<title>Rozgar Training Center Koderma</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/header.css" media="all" />
	
<script type="text/javascript">
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
t=setTimeout('startTime()',500);
}
function checkTime(i)
{
if (i<10)
{
i="0" + i;
}
return i;
}
</script>

</head>
<body onload="startTime()">
	<!--  Headr Part Start Now -->
	<div class="header">
	
		<!--  header_left Part Start Now -->
		<div class="header_left">
			<img src="icon/logo.jpg" />
		</div>
		
		<!--  header_right Part Start Now -->
		<div class="header_right">
		
			<!--  header_right_top Part Start Now -->
			<div class="header_right_top">
				<ul>
					<li title="Logout"><a href="logout.php">LogOut</a></li>
					<li title="Control Panel"><a href="control_panel.php">Home</a></li>
				</ul>
			</div>
			
			<!--  header_right_middle Part Start Now -->
			<div class="header_right_middle">
			
				<!--  header_right_middle_left Part Start Now -->
				<div class="header_right_middle_left">
					<p id="hd">Rozgar Training Center Koderma</p>
				</div>
				
			</div>
			
			<!--  header_right_bottom Part Start Now -->
			<div class="header_right_bottom">
				<div id="txt" style="color:white;text-align:center;"></div>
				<center style="color:white;">
				<?php
					$mydate = getdate(date("U"));
					echo "$mydate[weekday]: $mydate[mday] $mydate[month] $mydate[year]";
				?>
				</center>
			</div>
			
		</div>
		
	</div>
</body>
</html>