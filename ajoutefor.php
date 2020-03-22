<?php
 $con = mysqli_connect("localhost", "root", "root", "espace_membre");

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


  $date_debut=htmlspecialchars($_POST['date_debut']);
  $date_fin=htmlspecialchars($_POST['date_fin']);
  $cout=htmlspecialchars($_POST['cout']);
  $description=htmlspecialchars($_POST['description']);
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO formation (date_debut, date_fin, cout,description) VALUES ('$date_debut', '$date_fin', '$cout',' $description')";

    if(mysqli_query($con, $sql)){ 



      ?>
          <span style="color:#366799; margin-left:44% ; font-size: 20px; "> <?php echo " bien inseré";

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
        <label>date debut</label>
          <div class="container">
          <div class="row">
        <div class="form-group">
            <div class="col-s-5 date">
                <div class="input-group input-append date" id="datePicker" >
                    <input type="text" class="form-control" name="date_debut" required="">
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
  </div>
  </div>
    </div>
           <div>
        <label>date fin</label>
          <div class="container">
          <div class="row">
        <div class="form-group">
            <div class="col-s-5 date">
                <div class="input-group input-append date" id="datePicker2">
                    <input type="text" class="form-control" name="date_fin" required="">
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
        </div>
  </div>
  </div>
    </div>  
        
                   <script>
                           
                $(document).ready(function() {
                    $('#datePicker')
                        .datepicker({
                            format: 'yyyy/mm/dd'
                        })
                });
                     </script>
                        <script>
                           
                $(document).ready(function() {
                    $('#datePicker2')
                        .datepicker({
                            format: 'yyyy/mm/dd'
                        })
                });
                     </script>
                        
        
        
        
        
    <div class="form-group " style=""><label><u>cout<br></u></label>
      <input type="text" class="form-control" value="" name="cout" required="" style="width:220px;">
  </div>    

  <div class="form-group" style="">
    <label>description</label>
    <textarea type="text" class="form-control" name="description" required="" >
   
    </textarea>
  </div>
      <div class="form-group" >
    <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="enregistre" style="width:120px;">enregistre</button>
    <br>
    <button style="margin-left: 45%;"><a href="gestion_formation.php">retour</a></button>
          <button style="margin-left: 45%;"><a href="index.php">acceuil</a></button>

      </div>
  <?php
       if(isset($erreur)){
        echo '<font color="red"> '.$erreur.' </font>' ;

     }
  ?>
</body>
</html>
