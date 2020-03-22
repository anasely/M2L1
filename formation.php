<?php
session_start();
include'header.php';
?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>formation</title>

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

        $sql = "SELECT  id_formation,description,date_debut,date_fin,cout FROM formation order by date_debut asc" ;

     $res=mysqli_query($con,$sql);
      ?>
<div class="container" >
    <div class="row col-md-8 col-md-offset- custyle" >
    <table class="table table-striped custab">
    <thead>
    <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Les formations disponibles</a>

        <tr>
            <th style="display:none;">Id</th>
            <th>description</th>
            <th>Date_debut</th>
            <th>date_fin</th>
            <th>cout</th>
            <th class="text-center">s'incrire</th>
        </tr>

    </thead>

        <tr>
     <?php 

        if($res->num_rows > 0){

            while ($row=$res->fetch_array()){ ?>
            
                <td style="display: none;"><?php echo  $row["id_formation"] ?></td>
                <td> <?php echo $row['description']?></td>
                <td><?php echo $row['date_debut']?></td>
                <td><?php echo $row['date_fin']?></td>
                <td><?php echo $row['cout']?></td>
                <td class="text-center"><form action="inscriptFormation.php?id_formation=<?= $row["id_formation"]?>" method="post"><button class="btn" name="envoyer"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span></a></td>
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
            <p class="inscrire"><a href="listeFormation.php">Consultez les formations auxquelles vous êtes inscrit</a></p> 
        </div>
      </div>
</body>
</html>