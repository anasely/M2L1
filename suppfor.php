
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>

<body>
	
	<?php

        $con=mysqli_connect("localhost","root","root","espace_membre");
	

	
	$sql = "DELETE FROM participant WHERE id_formation=".$_GET['id_formation'].";";
		$sql .= "DELETE FROM formation WHERE id_formation=".$_GET['id_formation']."";
		$delete = mysqli_multi_query($con, $sql) or die("database error:". mysqli_error($con));
		if($delete){
              header("refresh:0 ;url=gestion_formation.php ");		
          }
	?>
	
</body>
</html>