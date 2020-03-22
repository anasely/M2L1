<!doctype html>
<html>
	<head>
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="header.css">

<title>M2L</title>

</head>

<body>
	<div class="container-fluid">
	<a href="index.php"><img  id="logo" style="margin-top: 12px;" src="img/logo.png" ></a>
<nav>
  <ul>
    <li >
		<a class="active" href="index.php?id=<?php echo $_SESSION['id']?>" >Acceuil &ensp;</a>
    </li>
    <li class="deroulant"><a href="index.php?id=<?php echo $_SESSION['id']?>">M2L &ensp;</a>
      <ul class="sous">
        <li><a href="statut_juridique.php">statut juridique</a></li>
        <li><a href="locaux.php">locaux</a></li>
        <li><a href="personnel.php">personnel</a></li>
        <li><a href="materiel.php">materiel</a></li>
        <li><a href="Services.php">Services</a></li>
      </ul>
    </li>
	 
    <li><a href="emploi.php?id=<?php echo $_SESSION['id']?>">emploi</a></li>
    <li><a href="formation.php">formation</a></li>
    <li><a href="contact.php">contact</a></li>
	<li ><a href="connexionM2L.php">connexion</a></li>
	<li><a href="inscriptionM2L.php">inscription</a></li>
	  
  </ul>
</nav>	
</div>
		
		<?php  
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
	
		<div align="right" class="profil">
         <h4>Profil de : <?php echo $userinfo['username']; ?></h4>
                  username = <?php echo $userinfo['username']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?> 
			<br />		 
         <a href="deconnecte.php" class="btn btn-light">Se déconnecter </a>
		
         <br/>
         <?php
			if( $userinfo['isAdmin'] ){
				echo '<a href="admin.php" class="btn btn-light">administration </a>';
			}
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
       
         <?php
         }
         ?>
		</div>
	<?php   
}
?>

</div>
</body>

</html>
