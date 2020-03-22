

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>offres</title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link type="text/css" rel="stylesheet" href="formation.css">

<!------ Include the above in your HEAD tag ---------->


</head>
<body>

    <?php 

        $con=mysqli_connect("localhost","root","root","espace_membre");
          if ($con->connect_error) {
               die("Connection failed: " . $con->connect_error);
         }

        $sql = "SELECT  id,offre,description,date,type FROM emploi order by type asc" ;

     $res=mysqli_query($con,$sql);
      ?>
         <form action="#" method="GET">
<div class="container" >
    <div class="row col-md-8 col-md-offset- custyle" >
    <table class="table table-striped custab">
    <thead>
    <a href="ajouteoffre.php" class="btn btn-primary btn-xs pull-right"><b>+</b> ajoute des  offres </a>

        <tr>
        	<th style="display:none;">id</th>
            <th style="display:none;">description</th>
            <th>offre</th>
            <th>date</th>
            <th>type</th>
            <th class="text-center">action</th>
        </tr>

    </thead>

        <tr>
     <?php 

        if($res->num_rows > 0){

            while ($row=$res->fetch_array()){ ?>
                 <td style="display: none;"><?php echo  $row["id"] ?></td>
                <td style="display: none;"><?php echo  $row["description"] ?></td>
                <td> <?php echo $row['offre']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['type']?></td>         

                <td class="text-center"><a class='btn btn-info btn-xs' href="modifoffre.php?id=<?php echo $row['id']?>""><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                <a href="suppoffre.php?id=<?php echo $row['id']?>"" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> supp</a>
                </td>

                </button></form></td>

                </tr>



<?php

 }
  echo"</table>";

 }else { echo "0 results"; }

 $con->close();

  ?>


</table>
    
</div>
</div>
</div>

<div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <p class="inscrire"><a href="admin.php">Retour</p> 
        </div>
      </div>
</body>
</html>