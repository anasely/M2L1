<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="consultation.css">

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

	
	
	
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
		
		
		<br>
        <input type="text" class="DateD" method="post" >debut</label>
        <input type="text" class="DateF" method="post" >fin:</label>
        <button action="">Search</button>
		
			<?php 
					////////////// READ /////////////

	$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");
			
			        $search=($_POST['DateD']);
		
					$etat = $basededonnees->prepare('SELECT DateD, DateF,userid FROM activity WHERE DateD LIKE :DateD');

					//3. Execution de la requette préparé ci dessus
					$reponse = $etat->execute(array(
						':DateD' => '%' . $_POST['DateD'] . '%', ))
		
					 ?>
		
		
		
<table> 
  <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
 <tr>
  <th class="action">dated</th>
  <th class="nom" >datef</th>  
  <th class="prenom">login</th> 
 
 </tr>
 <tr>
				<?php
					//4. Affichage des données recupérées
			
					while ($tache = $etat->fetch()) {
				?>
				
				<td>
	   
					<td><?php echo $tache['DateD']; ?></td>
				   <td> <?php echo $tache['DateF']; ?></td>
				   <td> <?php echo $tache['userid']; ?></td>		

	</tr>   
				
			 <?php } ?>
		</div>
	</section>
</table>
    </div>
</div>
</body>
</html>