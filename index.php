<?php
session_start();
include 'header.php';
?>
<!doctype html>
<html>
	<head>
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="index.css">
<meta charset="UTF-8">
<title>M2L</title>

</head>

	
<body>
	<div class="container">
	<h1 >BIENVENUE SUR LE SITE DE LA MAISON DES LIGUE DE LORRAINE</h1>
	
<p>La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales de Lorraine et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL). Installée depuis 2003 dans la banlieue Nancéienne, la M2L accueille l'ensemble du mouvement sportif Lorrain qui représente près de 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles.<p>
  </div>
			
<div class="slideshow-container">

<div class="mySlides fade">
			
  <img src="img/scotter.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">
  <img src="img/tennis.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <img src="img/footbal.jpg" style="width:100%">
 
</div>
 <div class="mySlides fade">
  <img src="img/patinage.jpg" style="width:100%">
 
</div>
 <div class="mySlides fade">
  <img src="img/piscine.jpg" style="width:100%">
 
</div>    



<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
   <span class="dot"></span> 
   <span class="dot"></span> 
   <span class="dot"></span> 
</div>
	<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 1500); // Change image every 2 seconds
}
</script>

</div>	
		</div>
  </br>
<?php  include('footer.php')?>
</body>
</html>

