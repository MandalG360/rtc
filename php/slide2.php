<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="AnimateMaster/animate.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="AnimateMaster/animate.min.css" media="all" />
		
		<style>
			.mySlides
			{
				display:none;
			}
			.w3-left, .w3-right, .w3-badge 
			{
				cursor:pointer;
			}
			.w3-badge 
			{
				height:13px;
				width:13px;
				padding:0;
			}
			.L,.R{
				float:left;
				width:4%;
				height:300px;
				cursor:pointer;
				color:#FFF;
			}
			.M{
				float:left;
				width:92%;
				height:auto;
				cursor:pointer;
			}
			.L:hover, .R:hover{
				color:#FF0000;
			}

		</style>
	</head>
	
	<body>
	
	<div class="L" onclick="plusDivs(-1)" title="Back">&#10094;&#10094;&#10094;</div>
	
	<div class="M" onclick="plusDivs(1)">
		  <img class="mySlides animated flash" src="slide_Image/a (18).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated fadeInDown" src="slide_Image/a (1).jpg"  style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated jello" src="slide_Image/a (2).jpg"  style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated rubberBand" src="slide_Image/a (3).jpg"  style="width:98%; height:auto; margin:1%;">
		  
		  <img class="mySlides animated flash" src="slide_Image/a (4).jpg"  style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated fadeInDown" src="slide_Image/a (5).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated jello" src="slide_Image/a (6).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated rubberBand" src="slide_Image/a (7).jpg" style="width:98%; height:auto; margin:1%;">
		  
		  <img class="mySlides animated flash" src="slide_Image/a (8).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated fadeInDown" src="slide_Image/a (9).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated jello" src="slide_Image/a (10).jpg"  style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated rubberBand" src="slide_Image/a (11).jpg"  style="width:98%; height:auto; margin:1%;">
		  
		  <img class="mySlides animated flash" src="slide_Image/a (12).jpg"  style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated fadeInDown" src="slide_Image/a (13).jpg"  style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated jello" src="slide_Image/a (14).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated rubberBand" src="slide_Image/a (15).jpg" style="width:98%; height:auto; margin:1%;">
		  
		  <img class="mySlides animated flash" src="slide_Image/a (16).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated fadeInDown" src="slide_Image/a (17).jpg" style="width:98%; height:auto; margin:1%;">
		  <img class="mySlides animated jello" src="slide_Image/a (18).jpg" style="width:98%; height:auto; margin:1%;">	
	</div>
	
	<div class="R" onclick="plusDivs(1)" title="Next">&#10095;&#10095;&#10095;</div>
	

	<script>
	var img = 1;
	showDivs(img);

	function plusDivs(n) 
	{
	  showDivs(img += n);
	}
	function showDivs(n)
	{
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  if (n > x.length) {img = 1}    
	  if (n < 1) {img = x.length}
	  
		for (i = 0; i < x.length; i++)
		{
			x[i].style.display = "none";  
		}
	  x[img-1].style.display = "block"; 
 
	  setTimeout(showDivs, 15000);
	}
	</script>

	</body>
</html> 
