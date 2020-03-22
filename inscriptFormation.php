<?php
include 'header.php';
include'acces2.php';



        $con =mysqli_connect("localhost","root","root","espace_membre");
        
        $idf=$_GET['id_formation'];
        $id=$_SESSION['id'];
        $sql="insert into participant (id_formation,id) values ('$idf','$id')";

        if(!mysqli_query($con,$sql)){
        	    printf("Errormessage: %s\n", $mysqli->error);
        }else{

        	echo '<script type="text/javascript"> alert("Votre inscription a bien été prise en compte!"); window.location.href = "formation.php"; </script>';
        }
