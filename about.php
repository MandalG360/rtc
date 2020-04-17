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
		<div class="welcome">
			<a href="index.php"><center style="color:red;font-size:20;"><?php echo @$_GET['error']; ?></center></a>
			<a href="index.php"><center style="color:red;font-size:20;"><?php echo @$_GET['logout']; ?></center></a>
		</div>
		<!--left_content part start-->
		<div class='left_content'>
			<?php include_once('left_sidebar.php'); ?>
		</div>
		
		<!--right_content part start-->
		<div class='middle_content'>
		
			<!--slide part start-->
			<div class='slide'>
				
			</div>
			
			<!--description part start-->
			<div class='description'>
			
				<div class='description_head'>
					<p>Rozgar Training Center Koderma Foundation of Axis Bank</p>
				</div>
				
				<div class='description_body'>
				<p>
						To empower them all, it is necessary that they earn their own livelihood and to provide them with various skills required in an individual to be able to earn in the local market, NBJK with the kind support of Axis Bank Foundation, Stichting Kinderhulp Bodhgaya, USHA International Ltd. and Youth 4 Jobs, has started Rozgar Training Centre.<br><br>
These training centres are at Hazaribag, Koderma, Ramgarh, Ranchi, East Singhbhum, Dhanbad, Giridih, Deoghar, Dumka, Khunti and Gaya districts of Bihar and Jharkhand. Centres provide quality practical learning in streams like basic computer, BPO, bed side patient attendant, mobile phone repairing, housekeeping, beautician, electrician, bike repair, motor driving, agriculture, tailoring etc including spoken English & life skills.<br>
Last year, these centres have trained 6330 youths cumulatively, out of which 3485 are engaged with jobs as per the skills they learnt there. Also 180 youths with disabilities were provided such training and 150 have been placed already. Skill support program on tailoring is being run in villages of 37 districts of Bihar and Jharkhand with help of Usha International Ltd. that involved 492 marginalized rural women to conduct Usha Silai Schools where 1673 girls could complete the foundation course of tailoring at doorstep.

								</P><br>
					<div  id="readMore"  class="readMore">

						<p>Bihar and Jharkhand are most backward states of India. Climate change results in erratic & uncertain rainfall leading to drought situation every year or alternate year. This forces the youths either to migrate to big cities or to involve in criminal activities or extremist organization.</P><br><br>
										
						<p>In Jharkhand, employment in the state stands lowest in the country at 63.8% of main workers to all workers. Conversely, the share of marginal workers (36.2%) is the highest in the country. Of those who are employed, only 4.3% are employed in industrial sector. There is a great risk that unemployed youth may join some criminal/extremist group and may harm the whole nation.<br>
WHO estimates that about 10% of the population has some types of disability with 3-4 % having sever disability. Person with disabilities are most sufferers. They are not easily accepted in the society and over 80% of person with disabilities do not get opportunity to earn.
</P>
										<div class='description_foot'>
											<p onclick="document.getElementById('readMore').style.display='none'" title="Click Me, I Closed more Result.">Hide...</P>
										</div>
					</div>
				</div>				
				<div class='description_foot'>
					<p onclick="document.getElementById('readMore').style.display='block'" title="Click Me, I desplay more Result.">Read More...</P>
				</div>

			</div>
			
		</div>
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