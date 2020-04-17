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
			<style type="text/css">
				body{
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				}
				#sss{
				background-color:#FF0000;
				}
				a{
				text-decoration:none;
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				}
				table { 
				border-collapse: collapse;
				text-decoration:none;
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				 }
				td { padding: .3em 10px; border: 1px #ccc solid; }
				#head { background: #fc9; float:left; }
				#eee { background: #fff;}
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
			<center><p>

				<a href="backup.php" id="sss">
				<img src="icon/backup.png" alt="backup" />
				</a>
				<br />
				<br />
				Backup Archives
				<br />
				<table
				<tr id="head">
				<td>
				File Name
				</td>
				<td>
				Action
				</td>
				</tr>
				<?php
				// List the files
				$dir = opendir ("./DB_backup"); 
				while (false !== ($file = readdir($dir))) { 

					// Print the filenames that have .sql extension
					if (strpos($file,'.sql',1)) { 

					// Remove the sql extension part in the filename
					$filenameboth = str_replace('.sql', '', $file);
										
					// Print the cells

						echo "<tr id='eee'>";
						echo '<td>'.$filenameboth.".sql".'</td>';
						echo "<td>"."<a href='DB_backup/" . $filenameboth . ".sql' class='view'  target=_blank><font color='#0000FF'>Download SQL</font></a>"."</td>";
						echo "</tr>";
						
					} 
				} 
				?>
			  </table>
			</p></center>
		</div>
		
	</div>
</body>
</html>