<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
</head>
	
	
	<?php
try{
	$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");
	
	}
catch(PDOException $e){
	echo $e->getMessage();
}
$res = $bdd->prepare('UPDATE  membres SET  username =:username , mail =:mail, password=:password, isAdmin=:isAdmin  WHERE id=:id');
$res->bindValue(':id',$_POST['user']);
$res->bindValue(':username',$_POST['username']);
$res->bindValue(':mail',$_POST['mail']);
$res->bindValue(':password',$_POST['password']);
$res->bindValue(':isAdmin',$_POST['isAdmin']);
$reponse = $res->execute();

if($reponse){
	echo'<u> <p class="result_modifi"> Bien modifié<u></p>';
}else{
	echo'<u>  <p class="result_modifi">Erreur De Modifié  <u></p>';
}	
mysqli_close($bdd);
	header("refresh:0.5; url=membres.php")

?>
<body>
</body>
</html>