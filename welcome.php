<style>
#left{
	width:10%;
	height:auto;
	float:left;
	text-align:left;
	background-color:none;
}
#middle{
	width:80%;
	height:auto;
	float:left;
	text-align:center;
	background-color:none;
	}
#right{
	width:10%;
	height:auto;
	float:left;
	text-align:right;
	background-color:none;
	}
</style>

<div>
	
		<div id="left"><a href="control_panel.php" style="color:#32CD32; text-decoration:none;" title="Control Panel">Home</a></div>
		<div id="middle"><b><font color='blue' size='4'>WELCOME: </b></font><font color='red' size='4'><?php echo $_SESSION['admin_name']; ?></font></a></div>
		<div id="right"><a href="logout.php" style="color:#800080; text-decoration:none;" title="LogOut">LogOut</a></div>
	
</div>