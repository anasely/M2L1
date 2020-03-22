<?php	

	$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");

if(isset($_POST['forminscription']))
	
{		
	$username=htmlspecialchars($_POST['username']);
	$mail=htmlspecialchars($_POST['mail']);
	$mail2=htmlspecialchars($_POST['mail2']);
	$mdp=sha1($_POST['mdp']);
	$mdp2=sha1($_POST['mdp2']);


	 
 
   if(!empty($_POST['username']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
   { 
	   
	   
	   $usernamelenght=strlen($username);
	   if($usernamelenght<=255)
	   {
		   if($mail==$mail2)
		   {
			   if(filter_var($mail,FILTER_VALIDATE_EMAIL))
			   {  $requsername=$bdd->prepare("SELECT * FROM membres WHERE username= ? " );
				  $requsername->execute(array($username));
				  $usernameexist=$requsername->rowCount();
				  if($usernameexist==0 ){ 
				  $reqmail=$bdd->prepare("SELECT * FROM membres WHERE mail= ? " );
				  $reqmail->execute(array($mail));
				  $mailexist=$reqmail->rowCount();
				  if($mailexist==0 ){ 
					  
			  if($mdp==$mdp2)
			  {
				  $insertmbr= $bdd->prepare("INSERT INTO membres (username , mail,password ) Value(?,?,?) ");
				  $insertmbr->execute(array($username,$mail,$mdp));
				  $erreur="votre compte a été bien  crée.";
			  }
			   else
			   { 
				  $erreur="votre password ne correspondent pas!";
		       }
			     
				   } else{
					  $erreur="adresse mail déja utilise";
				  }
				} else{ 
				    $erreur="username  déja utilise";
				   }
				   
			   
			 }else{
                  $erreur="votre adresses mail n'est pas valide !";

			   }
			  }
		   
		   else{
			   $erreur="votre adresses mail ne correspondent pas!";
			   
		   }
	   } 
	   else{
		   $erreur="votre username ne doit pas depasser 255 carractere";	   }
   } 


else{
	$erreur="tous les champs doivent etre complete";
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Document sans titre</title>
	<link href='bootstrap.min.css' rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="INSCRIPTIONM2L.css">
</head>

<!------ Include the above in your HEAD tag ---------->

    </head>
<body>
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
	
<!----------------------------------------- php-->

	
</body>
</html>