<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>

	ul.topnav {
		height:35px;
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background:linear-gradient(#008B8B,#008080);
	}

	ul.topnav li {
		float: left;
	}

	ul.topnav li a {
	  display: inline-block;
	  color: #f2f2f2;
	  text-align: center;
	  padding: 8px 16px;
	  text-decoration: none;
	  transition: 0.3s;
	  font-size: 17px;
	  font-weight:bold;
	}

	ul.topnav li a:hover {
		background:linear-gradient(#008080,#008B8B);
		color:#C0C0C0;
		font-size: 20px;
		padding: 4px 8px;
	}

	ul.topnav li.icon {
		display: none;
	}

	@media screen and (max-width:680px) {
	  ul.topnav li:not(:first-child) {display: none;}
	  ul.topnav li.icon { float: right; display: inline-block;}
	}

	@media screen and (max-width:680px) {
	  ul.topnav.responsive {position: relative;height:auto;}
	  ul.topnav.responsive li.icon { position: absolute; right: 0; top: 0;}
	  ul.topnav.responsive li { float: none; display: inline;}
	  ul.topnav.responsive li a { display: block; text-align: left;}
	}
	</style>
	</head>
	<body>
		<div class="nav">
			<ul class="topnav" id="topnav">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="gallery_unlock.php">Photo Gallery</a></li>
				<li><a href="reg.php">Registration</a></li>
				<li><a href="notice_unlock.php">Download</a></li>
				<li class="icon">
					<a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
				</li>
			</ul>
		</div>
		<script>
		function myFunction() {
			var x = document.getElementById("topnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
		</script>
	</body>
</html>