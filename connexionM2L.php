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
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="connexionM2L.css">
</head>

<!------ Include the above in your HEAD tag ---------->

    </head>
<body>


<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="usernameconnect" class="text-info">Username:</label><br>
                                <input type="text" name="usernameconnect" id="usernameconnect" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mdpconnect" class="text-info">Password:</label><br>
                                <input type="password" name="mdpconnect" id="mdpconnect" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="connexion" class="btn btn-info btn-md" value="connexion">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="inscriptionM2L.php" class="text-info">Register here</a>
								<a href="index.php" class="alert">acceuil</a>
                            </div>
                        </form>
						<?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</body>
</html>