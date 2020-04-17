<!DOCTYPE html>

<html>
	<head>
		<title>Rozgar Training Center</title>
		<link rel="stylesheet" type="text/css" href="css/master.css" media="all" />
	</head>
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
		<table width="100%" height="300px">
			<tr>
				<td width="50%" height="auto">
					<img class="mySlides animate" src="slide_Image/1.gif"  style="width:98%; height:600px; margin:1%;">
				</td>
				<td width="50%" height="auto">
					<table width="90%" height="200px" style="text-align:center; background-color:white; margin-right:10%;">
						<tr><td>Name: Ashish Kumar</td></tr>
						<tr><td>Mob: 9155035586</td></tr>
						<tr><td>E-mail: 666kmandal@gmail.com</td></tr>
						<tr><td>Address: Giridih (Jharkhand)</td></tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) 
	{
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) 
	{
		myIndex = 1
	}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000);
}
</script>
</body>
</html>