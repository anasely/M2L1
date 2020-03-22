<?php
/* Page: contact.php */
$VotreAdresseMail="mlsite507@gmail.com";//mettez ici votre adresse mail
if(isset($_POST['mailform'])) { // si le bouton "Envoyer" est appuyé
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            //on vérifie que le champ nom est correctement rempli
            if(empty($_POST['nom'])) {
                echo "Le champ nom est vide";
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: Nom de votre site <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Nom de votre site <".$_POST['mail'].">\r\n";
                    //on prépare les champs:
                    $Mail=$_POST['mail'];
                    $nom='=?UTF-8?B?'.base64_encode($_POST['nom']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,$nom,nl2br($Message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                        echo "Le mail à été envoyé avec succès!";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			body{
				background-color: #366799;
				align-content: center;
				text-align: center;
				padding: 170px;
				
			}
			.nom{
				font-size: 12px;
				  width: 400px;
				height: 40px;

				
			}		
			.mail{
				font-size: 12px;
				width: 400px;
				height: 40px;
			}
			.message{
				font-size: 12px;
			    width: 400px;
				height: 100px;
			}
			.envoye{
				font-size: 12px;
				 width: 290px;
				height: 50px;
			}
			h2{
				font-size: 52px;

			}
			
		</style>
	</head>
	<body>
		<h2> CONTACT NOUS </h2>
		<form method="POST" action="">
			<br>

         <strong>reference:
			<br>
			<input type="text" name="ref" class="" value="<?php echo $_POST['ref'] ?>"></strong>
			<br>
			<br>	
			
			
			<input class="nom" type="text" name="nom" placeholder="Votre nom" value="" /><br /><br />
			<input class="mail" type="email" name="mail" placeholder="Votre email" value="" /><br /><br />
			<textarea  class="message"name="message" placeholder="Votre message"> </textarea><br /><br />
			<input class="envoye" type="submit" value="Envoyer !" name="mailform"/>
		</form>
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
	</body>
</html>