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
		<link rel="stylesheet" type="text/css" href="css/body.css" media="all" />
		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/validation.js"></script>
	</head>
	<style>
			/* Zebra striping */
			tr:nth-of-type(odd) { 
			  background: #F5F5F5;
			}
			td{ 
			  padding: 6px; 
			  border: 1px solid #ccc; 
			  text-align: left; 
			  padding:0px 5%;
			  font-size:18px;
			}

			</style>
<body>
	
	<!--navigation part start-->
	<div class='navigation'>
		<?php include_once('navigation_lock.php'); ?>
	</div>
	
	<!--content part start-->
	<div class='content' style="background:linear-gradient(#FFE4E1,#FFFFFF);height:600px;">
	
		<div class="welcome">
			<?php include_once("welcome.php"); ?>
		</div>
	
		<!--content_body part start-->
		  <div class='content_body'>
			<div class="insert_form">
			<section>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table" border="2">
						<tr>
							<td colspan="2" align="center" id="h2">Browse here for Latest News on the Computer and Upload it</td>
						</tr>
						<tr>
							<td>Insert Notice Name </td>
						</tr>
						<tr>
							<td><textarea name="title" id="f1" rows="6"></textarea></td>
						</tr>
						<tr>
							<td>Browse Document Here</td>
						</tr>
						<tr>
							<td><input type="file" name="file" id="f2" /></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" name="upload" id="submit" value="Upload" /></td>
						</tr>
					</table>
				</form>
				<?php
					include("php/connect_db.php");
					
					@$mydate = getdate(date("U"));
					function generatePassword(){
						$array = array('0','1','2','3','4','5','6','7','8','9','A','E','I','O','U','a','e','i','o','u');
						
						$password="";
						for($i=0;$i<=5;$i++){
							$index = rand(0,count($array)-1);
							$password.=$array[$index];
						}
						return $password;
					}

						@$path = @$mydate[mday].generatePassword().@$mydate[year];
					
					if(isset($_POST['upload'])){
						
						$title = $_POST['title'];
						
						$doc_name = $_FILES['file']['name'];
						$type = $_FILES['file']['type'];
						$size = $_FILES['file']['size'];
						$tmp = $_FILES['file']['tmp_name'];
						
						if($title==""){
							echo "<script>alert('Please Insert Title Name!');</script>";
							exit();
						}
						if($size>=83886080){
							echo "<script>alert('It is large size. It accept 0MB-10MB ');</script>";
							exit();
						}
						
						$query = mysql_query("insert into document(title,doc_name,path) values('$title','$doc_name','$path')");
						
						if($query){
							
							mkdir("document/$path");
							move_uploaded_file($tmp,"document/$path/$doc_name");
							
							echo "<a href='gallery.php'><font size='3px' align='center' color='red'>Your Document Uploaded Successfully</font><br>
									<font size='3px' align='center' color='red'>Your Document Title is: ".@$title."</font></a>";
						}
					}
					
				?>
			</section>
		  </div>
		</div>
	</div>
</body>
</html>