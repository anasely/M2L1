<?php  
session_start();
include 'header.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>listeformation</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link type="text/css" rel="stylesheet" href="formation.css">
</head>
<body>
    <?php 

    $con=mysqli_connect("localhost","root","root","espace_membre");
    if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
 }

$id=$_SESSION['id'];

 $sql = "select * from formation, participant where participant.id_formation = formation.id_formation and participant.id = '$id'" ;

 $res=mysqli_query($con,$sql);
 ?>


 <div class="container" >
    <div class="row col-md-8 col-md-offset- custyle" >
        <table class="table table-striped custab">
            <thead>

                <tr>
                    <th style="display:none;">Id</th>
                    <th>description</th>
                    <th>Date_debut</th>
                    <th>date_fin</th>
                    <th>cout</th>
                    <th>supprime</th>

                </tr>

            </thead>

            <tr>
               <?php 

               if(mysqli_num_rows($res) > 0){

                while ($row = mysqli_fetch_array($res)){ ?>

                    <td style="display: none;"><?php echo  $row["id_formation"]; ?></td>
                    <td> <?php echo $row['description'];?></td>
                    <td><?php echo $row['date_debut'];?></td>
                    <td><?php echo $row['date_fin'];?></td>
                    <td><?php echo $row['cout'];?></td>
                    <form action="#" method="GET">

                    <td> <a href="supp2.php?id_formation=<?php echo $row['id_formation']?>"" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> supp</a></td>
                   
                </form>
                </tr>


                <?php

            }
            echo"</table>";

        }else { echo "0 results"; }

        $con->close();

        ?>


    </table>

</body>
</html>