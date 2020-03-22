<?php 

$con=mysqli_connect("localhost","root","root","espace_membre");


$req="DELETE FROM emploi where id=".$_GET["id"]."";

$res=mysqli_query($con,$req) or die("database error:". mysqli_error($con));

if($res){
	header("refresh:0 url=gestion_emploi.php");
}
?>