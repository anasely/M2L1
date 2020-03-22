<?php

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
         <form action="#" method="GET">
<div class="container" >
    <div class="row col-md-8 col-md-offset- custyle" >
    <table class="table table-striped custab">
    <thead>
    <a href="ajoutefor.php" class="btn btn-primary btn-xs pull-right"><b>+</b> ajoute des formations </a>

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
                     

                                <td class="text-center"><a class='btn btn-info btn-xs' href="modifor.php?id_formation=<?php echo $row['id_formation']?>""><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="suppfor.php?id_formation=<?php echo $row['id_formation']?>"" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> supp</a></td>

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