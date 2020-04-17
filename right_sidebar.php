<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/sidebar.css" media="all" />
	</head>
<style>
.row{
	width:99%;
	height:40px;
	float:left;
	margin:2.5px 0px;
	border:1px dotted white;
}
.col1{
	width:20%;
	height:auto;
	float:left;
	text-align:center;
	padding:2px 0px;
}
.col2 a, .col2 a:link,.col2 a:visited{
	width:80%;
	float:left;
	color:blue;
	padding:5px 0px;
	font-size:23px;
	text-decoration:none;
}
.col2 a:hover,.col2 a:active{
	width:80%;
	float:left;
	color:red;
	padding:5px 0px;
	font-size:23px;
	text-decoration:none;
}
#d,#m{
		width:23%;
		height:30px;
		text-align:center;
		padding:5px 0px;
		margin:5px 0px;
		border-radius:5px;
		color:#FF0000;
		font-weight:bold;
		cursor:pointer;
	}
	#y{
		width:40%;
		height:30px;
		text-align:center;
		padding:5px 0px;
		margin:5px 0px;
		border-radius:5px;
		color:#FF0000;
		font-weight:bold;
		cursor:pointer;
	}
	#y:hover,#m:hover,#d:hover{
		background-color:#DCDCDC;
		color:#000000;
	}
	#age{
		width:95%;
		height:30px;
		margin:5px 0px;
		padding:5px 0px 5px 10px;
		border-radius:5px;
	}
	#ok{
		width:100%;
		height:auto;
		background-color:#C0C0C0;
		text-align:center;
		margin:5px 0px;
		padding:5px 0px;
		border-radius:5px;
		font-size:20px;
		color:#FFFFFF;
		cursor:pointer;
	}
	#ok:hover{
		background-color:#00FFFF;
	}
</style>
<body>
<!-- part of right sidebar  -->
	<div class='head'>
		<h3>Calender</h3>
	</div>
	<div class='body'>
	
		<div class='body_part'>
			 <script src="js/calender.js"></script>
		</div>
	</div>	

	<!-- *************  -->
	<div class='head'>
		<h3>Calculate Your Age</h3>
	</div>
	<div class='body'>
		<div class='body_part'>
	<form action='' method='post'>
	<?php
		if(isset($_POST['ok']))
		{
		
			 $cd = date('d');			 
			 $cm = date('m');
			 $cy = date('Y');
		
			$pd = $_POST['d'];
			$pm = $_POST['m'];
			$py = $_POST['y'];
		
			if($pd>=1 && $pm>=1 && $py>=1)
			{
		
				if($cy>=$py&&$cm>=$pm&&$cd>=$pd)
				{
					$dd=$cd-$pd;
					$mm=$cm-$pm;
					$yy=$cy-$py;
					
					$age = $yy."  साल ,  ".$mm."  माह ,  ".$dd."  दिन ". "years old";
				}
				else
				if($cy>=$py&&$cm>$pm&&$cd<$pd)
				{
					$dd=($cd+30)-$pd;
					$mm=($cm-1)-$pm;
					$yy=$cy-$py;
					
					$age = $yy."  साल ,  ".$mm."  माह ,  ".$dd."  दिन ". "years old";
				}
				else
				if($cd>$pd&&$cm>=$pm&&$cy<$py)
				{
				$dd=($cd+30)-$pd;
				$mm=($cm+11)-$pm;
				$yy=($cy-1)-$py;
					
					$age = $yy."  साल ,  ".$mm."  माह ,  ".$dd."  दिन ". "years old";
				}
				else
				if($cy>$py&&$cm<$pm&&$cd>=$pd)
				{
				$dd=$cd-$pd;
				$mm=($cm+12)-$pm;
				$yy=($cy-1)-$py;
					
					$age = $yy."  साल ,  ".$mm."  माह ,  ".$dd."  दिन ". "years old";
				}
				else
				{
				$dd=($cd+30)-$pd;
				$mm=($cm+11)-$pm;
				$yy=($cy-1)-$py;
					
					$age = $yy."  साल ,  ".$mm."  माह ,  ".$dd."  दिन ". "years old";
				}
			}
			/***********************************************/
			 $i=0;
			 $odd1=0;
			 $todd=0;
			 $remyr=0;
			 $remyr1=0;
			 $lyrs=0;
			 $oyrs=0;
			 $cyr=0;
			 $upyr=0;
			 $leap=0;
			 
			 $montharr = array( 31,28,31,30,31,30,31,31,30,31,30,31 );
			 

			if($py%100==0)
			{
				if($py%400==0)
					{
					$leap=1;
					if($pd>29&&$pm==2)
						{
							$age = 'f';
						}
					}
				else if($pd>28&&$pm==2)
					{
						$age = 'f';
					}
			}
			else if($py%4==0)
			{
				$leap=1;
				if($pd>29&&$pm==2)
					{
						$age = 'f';
					}
			}
			else if($pd>28&&$pm==2)
			{
				$age = 'f';
			}

			if($leap==1)
			{
				$montharr[1]=29;
			}


			if(($pm>12)||($pd>31)|| ($py>5000))
			{
				$age = 'f';
			}

			if(($pd>31 && ($pm == 1||$pm==3||$pm==5||$pm==7||$pm==8||$pm==10||$pm==12)))
			{
				$age = 'f';
			}


			if(($pd>30 && ($pm == 4||$pm==6||$pm==9||$pm==11)))
			{
				$age = 'f';
			}

			$remyr1=$py-1;
			$remyr=$remyr1%400;

			$cyr=$remyr/100;
			if($remyr==0)
			{
				$oyrs=0;
			}
			else if($cyr==0 && $remyr>0)
			{
				$oyrs=0;
			}


			else if($cyr==1)
			{
				$oyrs=5;
			}
			else if($cyr==2)
			{
				$oyrs=3;
			}
			else if($cyr==3)
			{
				$oyrs=1;
			}

				$upyr=$remyr%100;
				$lyrs=$upyr/4;
				$odd1=$lyrs+$upyr;
				$odd1=$odd1%7;
				$odd1=$odd1+$oyrs;
				
				for($i=0;$i<$pm-1;$i++)
				{
					$odd1=$odd1+$montharr[$i];
				}
				
				$todd=$odd1+$pd;
				
				if($todd>7)
				{	
					$todd=$todd%7;  
				}

				if(@$age=='f')
				{
					$age = "----------invalid Date----------";
					$day = "----------Not Responding----------";
				}
				else
				{
					if($todd==0)
					{
						$day = "Sunday "." "." "." आपका जन्म दिन है |";
					}
					if($todd==1)
					{
						$day = "Monday"." "." "." आपका जन्म दिन है |";
					}				
					if($todd==2)
					{
						$day = "Tuesday"." "." "." आपका जन्म दिन है |";
					}
					if($todd==3)
					{
						$day = "Wednesday"." "." "." आपका जन्म दिन है |";
					}
					if($todd==4)
					{
						$day = "Thrusday"." "." "." आपका जन्म दिन है |";
					}
					if($todd==5)
					{
						$day = "Friday"." "." "." आपका जन्म दिन है |";
					}
					if($todd==6)
					{
						$day = "Saturday"." "." "." आपका जन्म दिन है |";
					}
				}
		}
	?>
		<table border=0  align='center' width='100%'>
			<tr>
			<td>
				<select name="d" id="d">
					<option value="">dd</option>
					<?php
					for($i=1;$i<=31;$i++)
					{
					echo "<option value='$i'>$i</option>";
					}
					?>
				</select>  / 
				<select name="m" id="m">
					<option value="">mm</option>
					<?php
					for($i=1;$i<=12;$i++)
					{
					echo "<option value='$i'>$i</option>";
					}
					?>
				</select>  / 
				<select name="y" id="y">
					<option value="">yyyy</option>
					<?php
					for($i=date('Y'); $i>=1900; $i--)
					{
					echo "<option value='$i'>$i</option>";
					}
					?>
				</select>				
			</td>
		  </tr>
		    <tr>
				<td><input type='text' name='age' id='age'  value='<?php echo @$age;  ?>' disabled /></td>
			</tr>
			<tr>
				<td><input type='text' name='day' id='age'  value='<?php echo @$day;  ?>' disabled /></td>
			</tr>
		  <tr>
			<td align='center'><input type='submit' name='ok' id='ok' value='Find Age' /></td>
		  </tr>	
		</table>
	</form>
		</div>
	</div>
	<!-- part of right sidebar  -->
	<div class='head'>
		<h3>Digital India, Technical India</h3>
	</div>
	<div class='body'>
	
		<div class='body_part'>
		<!-- Slide Show -->
		<section>
		  <img class="model animate" src="icon/side/a (1).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="model animate" src="icon/side/a (2).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="model animate" src="icon/side/a (3).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="model animate" src="icon/side/a (4).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="model animate" src="icon/side/a (5).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="model animate" src="icon/side/a (6).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="model animate" src="icon/side/a (7).jpg" style="width:98%; height:auto; margin:1%;">
		</section>

		<script>
		// Automatic Slideshow - change image every 3 seconds
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("model");
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
		</div>
	</div>
	<!-- part of right sidebar  -->
	<div class='head'>
		<h3>Other Links Here</h3>
	</div>
	<div class='body'>
	
		<div class='body_part'>
		
			<div class="row">
				<div class="col1"><img src="icon/a (2).png" width="35px"></div>
				<div class="col2"><a href="http://www.google.com">Google</a></div>
			</div>
			
			<div class="row">
				<div class="col1"><img src="icon/a (1).png" width="35px"></div>
				<div class="col2"><a href="http://www.facebook.com">facebook</a></div>
			</div>
			
			<div class="row">
				<div class="col1"><img src="icon/a (1).jpeg" width="35px"></div>
				<div class="col2"><a href="http://www.gmail.com">Gmail</a></div>
			</div>
			
			<div class="row">
				<div class="col1"><img src="icon/a (4).png" width="35px"></div>
				<div class="col2"><a href="http://www.twitter.com">Twitter</a></div>
			</div>
			
			<div class="row">
				<div class="col1"><img src="icon/a (5).png" width="35px"></div>
				<div class="col2"><a href="http://www.yahoo.com">Yahoo</a></div>
			</div>
			
		</div>		
	</div>
</body>
</html>