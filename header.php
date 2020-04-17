<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rozgar Training Center Koderma</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/header.css"  media="all"/>
	<link rel="stylesheet" type="text/css" href="css/login_page.css"  media="all"/>
	<link rel="stylesheet" type="text/css" href="AnimateMaster/animate.min.css"  media="all"/>
	
<script type="text/javascript">
var tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyaer=d.getYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;
document.getElementById('clock').innerHTML = nhour+" : "+nmin+" : "+nsec+" "+ap+"";


}
window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}
</script>

</head>
<body>
	<!--  Headr Part Start Now -->
	<div class="header">
	
		<!--  header_left Part Start Now -->
		<div class="header_left">
			<img src="icon/logos.png" />
		</div>
		
		<!--  header_right Part Start Now -->
		<div class="header_right">
		
			<!--  header_right_top Part Start Now -->
			<div class="header_right_top">
				<ul>
					<li title="Admin Login"><a onclick="document.getElementById('id01').style.display='block'">| Admin Login |</a></li>
					<li title="Contact Us"><a href="contact.php">| Contact Us |</a></li>
					<li title="Home"><a href="index.php"> | Home |</a></li>
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
				<div id="clock" style="color:white;text-align:center;"></div>
				<center style="color:white;">
				<?php
					$mydate = getdate(date("U"));
					echo "$mydate[weekday]: $mydate[mday] $mydate[month] $mydate[year]";
				?>
				</center>
			</div>
			
		</div>
		
	</div>
	
<div id="id01" class="modal"> 

	<form class="modal-content animate " action="" method="post">
	
		<div class="x">
			<span onclick="document.getElementById('id01').style.display='none'" title="Close Modal">&times;</span>
		</div>

		<div class="container">
			<input type="text" id="input" placeholder="Enter Username" name="uname" required>

			<input type="password" id="input" placeholder="Enter Password" name="psw" required>
								
			<button type="submit" name="login">Login</button>
			<input type="checkbox" checked="checked"> Remember me
				<span class="psw"><h4 style="color:red; cursor:pointer;"><a onclick="document.getElementById('id02').style.display='block'">Forgot Password? </a></h4></span>
		</div>

		<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
							  
		</div>
		
	</form>
	<?php

		include("php/connect_db.php");
		
			if(isset($_POST['login'])){
				$uname1 =$_SESSION['admin_name'] = $_POST['uname'];
				
				$run = mysql_query("SELECT * FROM admin_login WHERE name='".md5($_POST['uname'])."' AND pass='".md5($_POST['psw'])."' ");
				
				if(mysql_num_rows($run)>0){
					echo "<script>window.open('control_panel.php','_self')</script>";
				}
				else
					echo "<script>alert('UserName or Password is Incorrect! Try again...');</script>";
			}
	?>
</div>
<div id="id02" class="modal"> 

	<form class="modal-content animate " action="" method="post">
	
		<div class="x">
			<span onclick="document.getElementById('id02').style.display='none'" title="Close Modal">&times;</span>
		</div>

		<div class="container">

			<input type="text" id="input" placeholder=" Username..." name="unamef" required>

			<input type="text" id="input" placeholder="Security Name..." name="Securityf" required>
			
			<input type="text" id="input" placeholder="dob (yyyy-mm-dd)..." name="dobf" required>
								
			<button type="submit" name="find">Find Password</button>
			<input type="checkbox" checked="checked"> Remember me
			</div>

		<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
							  
		</div>
	<?php
	
		include('php/connect_db.php');
		
		if(isset($_POST['find'])){
			

			$unamef = md5($_POST['unamef']);
			$Securityf = md5($_POST['Securityf']);
			$dobf = $_POST['dobf'];
				
			$que = "select *from admin_login where name='$unamef' AND forget='$Securityf'";

			$run2 = mysql_query($que);
			
				while($row2 = mysql_fetch_array($run2))
				{
					$f_pass =$_SESSION['forget'] = $row2['pass'];
					$dob = $row2['dob'];
				}	
				
				if(@$dob == $dobf)
				{
					echo "<script>window.open('forget.php','_self')</script>";		
				}
				else
					echo "<script>alert('Your given information are not matched!. Try again......')</script>";
		}
	?>
	</form>
</div>
</body>
</html>