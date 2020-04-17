<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Google Map</h1>
		<div id="map" style="width:100%; height:500px;"></div>
		
		<script>
			function myMap(){
				var mapCanvas = document.getElementById("map");
				var mapOptions = {
					center: new google.maps.LatLng(51.5, -0.2),zoom: 10
				}
				var map = new google.maps.Map(mapCanvas, mapOptions);
			}
		</script>
		
		<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
	</body>
</html>