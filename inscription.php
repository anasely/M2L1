<?php
session_start();

  $bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");

if(isset($_POST['connexion'])) {
   $usernameconnect = htmlspecialchars($_POST['usernameconnect']);

   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($usernameconnect) AND !empty($mdpconnect)) {

      $requser = $bdd->prepare("SELECT * FROM membres WHERE username = ? AND password = ?");
      $requser->execute(array($usernameconnect, $mdpconnect));
      $userexist = $requser->rowCount();
if($userexist == 1) { 
     $userinfo = $requser->fetch();
     $datedebut = date("Y-m-d H:i:s");
   $requser2 = $bdd->prepare("Insert into activity(userid,DateD) Values(?,?)");
         $requser2->execute([$userinfo['id'], $datedebut]);         $bdd->exec($requser2);

         $_SESSION['DateD'] = $datedebut;

         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['username'] = $userinfo['username'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['isAdmin'] = $userinfo['isAdmin'];
         header("Location: index.php?id=".$_SESSION['id']);
 
      }else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>M2L - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/Magnific-Popup/magnific-popup.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  include'header.php'; 
  ?>


  <!--================ Header Top Area Start =================-->
 
  <!--================ Header Top Area end =================-->

  <!--================ Header Menu Area start =================-->

  <!--================Header Menu Area =================-->

  <!--================ Hero Banner start =================-->      
  <div class="container">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="#">

                                    <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">username</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Name" value="<?php if(isset($username)) { echo $username; } ?>" /> 
                                            </div>
                                        </div>
                                    </div>

                  <div class="form-group">
                                        <label for="mail" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" name="mail" id="mail" placeholder="Enter your email" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                                            </div>
                                        </div>
                  </div>
                    <div class="form-group" >
                                        <label for="mail2" class="cols-sm-2 control-label">Confirm Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" name="mail2" id="mail2" placeholder="Confirm your email" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mdp" class="cols-sm-2 control-label">Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Enter your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mdp2" class="cols-sm-2 control-label">Confirm Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="Confirm your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group1 ">
                    <div class="container">
                    <div id="btn-group-vertical">
                                        <button type="submit" class="btn btn-primary " name="forminscription">Register</button>
                                         <button type="submit" class="btn btn-primary"><a href="connexionM2L.php" > login </button></a>
                                        </div>
                    </div>
                                </form>
                <?php
                if(isset($erreur))
                {
                  echo '<font color="red"> '.$erreur.' </font>' ;
                }
                ?>
                            </div>

                        </div>
                    </div>
                </div>
</div>
  <!--================ Hero Banner end =================-->


  <!--================ Work Statics section start =================-->

  
  <!--================ Work Statics section end =================-->        


  <?php
  include'footer.php';
  ?>
  <!--================ Blog section end =================-->  

  <!-- ================ start footer Area ================= -->

  <!-- ================ End footer Area ================= -->

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>