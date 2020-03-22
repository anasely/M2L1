<?php 

try{
	$bdd = new PDO("mysql:host=localhost;dbname=espace_membre", "root", "root");
	
	}
catch(PDOException $e){
	echo $e->getMessage();
}

$req=$bdd->prepare('SELECT * FROM membres WHERE id=:id');
$req->bindValue(':id',$_GET['user']);
$reponse=$req->execute();
$row=$req->fetch();


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>modifier</title>
<link href="modifie.css" rel="stylesheet" type="text/css">	
<link href="bootstrap.min.css" rel="stylesheet" type="text/css">	
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!--
Copy this code in your html file.
-->
</head>
<body>
    <div class="container">
	<form method="POST" action="modifieuser.php" >


        <p class="h2 text-center">modification users</p>
        <form action="" method="post">
            <div class="preview text-center">
                <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
            </div>
            <div class="form-group">
                <label>username:</label>
					 <input type="hidden" name="user" value="<?=$row['id']?>"> 

                <input class="form-control" type="text" name="username" required placeholder="Enter Your Full Name" value="<?=$row['username']?>"  />
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>mail:</label>
                <input class="form-control" type="email" name="mail" required placeholder="Enter Your Email" value="<?=$row['mail']?>"/>
                <span class="Error"></span>
            </div>  
			<div class="form-group">
                <label>password:</label>
                <input class="form-control" type="text" name="password" required placeholder="Enter Your Email"value="<?=$row['password'] ?>"/>
                <span class="Error"></span>
            </div>	
				<div class="form-group">
                <label>is-admin:</label><br/>
                <input type="text" name="isAdmin" required value="<?=$row['isAdmin'] ?>"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="enregistre">enregistre</button>

            </div>

        </form>
    </div>



<body>
</body>
</html>