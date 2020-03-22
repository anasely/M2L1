<?php 
session_start();
        $con=mysqli_connect("localhost","root","root","espace_membre");

		$id=$_SESSION['id'];
$req = "DELETE FROM participant WHERE id_formation=".$_GET['id_formation']." and id=$id";


	$DELETE=mysqli_query($con, $req) or die("database error:". mysqli_error($con));

if($DELETE){
    header("refresh:0 ;url=listeformation.php ");
	}
 ?>


