<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>membres</title>
</head>

<body>
	<?php   
$conn=mysqli_connect("localhost","root","root","espace_membre");
$req="SELECT * FROM membres" ;
$resultat=$conn->query($req);?>
		<table> 
			<style>
				table{
					   border-collapse: collapse;
					   width: 95%;
					   font-size: 25px;
					   text-align: left;
				}
				th{
					background-color:cyan;	
				}
				a{
					color:hotpink;
					font-family:"Gotham";
				}
			</style>
	<div class="tab">
	<tr>
		<th>action</th>
		<th>username</th>
		<th>mail</th>
		<th>admin</th>
	</tr>
	</div>
	<tr>
<?php 
		 if($resultat->num_rows>0){
	
	while($row=$resultat->fetch_array()){?>
		
		
		<td> 
			<form action="modifie.php" method="GET">
			<a href="modifieformulaire.php?user=<?php echo $row['id']?>" >modifier</a> /
			<a href="supprime.php?user=<?php echo $row['id']?>" >supprime</a>
		</td>
		<td><?php echo $row['username']?></td>
		<td><?php echo $row['mail'] ?></td>
		<td ><?php echo $row['isAdmin'] ?></td>
           </form>
		
		</th>
	</tr>

	</div>

		
	<?php
			}
	
}
	

	
	?>
	
     </table>
     <br>
     <br>
     <br>
  			<button style="margin-left: 45%; font-size:100%; "><a href="admin.php">retour</a></button>
</body>
</html>