<?php
session_start();
	$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");

 $requser = $bdd->prepare("Update activity Set DateF = now() Where userid = ? And DateD = ?");
 $requser->execute(array($_SESSION['id'], $_SESSION['DateD']));


$userexist = $requser->rowCount();
 $userinfo = $requser->fetch();
$_SESSION = array();
session_destroy();
header("Location: index.php?id=".$_SESSION['id']);

?>
