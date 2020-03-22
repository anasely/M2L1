<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>

<body>



a


	
	<?php
try{
	$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");
	
	}
catch(PDOException $e){
	echo $e->getMessage();
}	   
        $req = $bdd->prepare('DELETE FROM membres WHERE id = :id');
        $req->bindValue(':id', $_GET['user']);
       $rep=$req->execute();
	if($rep){
		echo 'yes';
	}else
		echo'non';
mysqli_close($bdd);
	   
    header("refresh:0.5 ;url=membres.php ");
	?>
	



</body>
</html>