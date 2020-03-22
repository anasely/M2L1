<?php
 $con = mysqli_connect("localhost", "root", "root", "espace_membre");

if($con === true){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    $id=htmlspecialchars($_POST['id']);
    $offre=htmlspecialchars($_POST['offre']);
    $date=htmlspecialchars($_POST['date']);
    $type=htmlspecialchars($_POST['type']);
    $description=htmlspecialchars($_POST['description']);

    $req="select * from emploi where id=".$_GET["id"]."";

    $row = mysqli_fetch_assoc(mysqli_query($con,$req));

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       
        $sql="UPDATE emploi SET offre='$offre',date='$date',type='$type',description='$description' WHERE id=".$_GET["id"]."";

        if(mysqli_query($con, $sql)){ 

            ?>
              <span style="color:#366799; margin-left:44% ; font-size: 20px; "> <?php echo " bien inseré ";

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }else{
        $error="les champs sont vide";
    }

    ?>

    </span>
<?php
 

// Close connection
mysqli_close($con);          

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    
    <title>Document sans titre</title>
    <link type="text/css" rel="stylesheet" href="emploi.css">
    <link type="text/css" rel="stylesheet" href="bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" hre="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>

<form action="" method="POST">
    <div class="container" style="margin-top: 120px;">
     <form class="form-horizontal" method="post" action="#">
      <div class="jumbotron">
          <div class="form-group" style="">
        <div class="form-group" style="">
           </div>
              <label>
            <div class="form-group" style="">
            <br>
            </div> 
              </label>
              <div>
              <label>date</label>
                  <div class="container">
                    <div class="row">
        <div class="form-group">
            <div class="col-s-5 date">
                <div class="input-group input-append date" id="datePicker">
                    <input type="text" class="form-control" name="date"  value="<?php echo $row['date'] ?>" required="">
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
    </div></div>

   
                     <script>
           
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'yyyy/mm/dd'
        })
});
     </script> 


              
              
              
    <div class="form-group " style=""><label>offre</label>
     <input type="text" class="form-control" value="<?php echo $row['offre'];?>" required="" name="offre" style="width:215px;"  >
    </div>  

     
        <p>
    <div class="form-group" style="">
      <label>type</label> </u>
        
      <select class="form-control" name="type" value="<?php echo $row['type'];?>"  required="" style="width:220px;"> 
        <option value="cdd">cdd</option>
         <option value="cdi">cdi</option>
      </select>
    </div>
    </p>



    <div class="form-group" style="">
        <label>description</label>
        <textarea type="text" class="form-control" name="description"  required=""  style="height: 20%;" ><?php echo $row['description'];?></textarea>
    </div>
      <div class="form-group" >
    <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="enregistre" style="width:120px;">enregistre</button>
    <br>
    <button style="margin-left: 45%;"><a href="gestion_emploi.php">retour</a> </n> <button style="margin-left: 45%;"><a href="index.php">acceuil</a></button></button>



      </div>
    <?php
         if(isset($erreur)){
                echo '<font color="red"> '.$erreur.' </font>' ;

         }
    ?>
</div>
</div>
</div>
</div>
</form>

</body>
</html>


