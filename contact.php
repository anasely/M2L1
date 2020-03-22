<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header.='From:.' .$_POST['nom'].'  <' .$_POST['mail  '].' >'."\n";
		$header='Content-Type:text/html; charset="uft-8"'."\n";
		$header='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
				</div>
			</body>
		</html>
		';
		$destinataire='mlsite507@gmail.com';

		mail($destinataire, "MESSAGE-M2L", $message, $header);
		$msg=" <font color ='red'> <font size ='5px'> Votre message a bien été envoyé !";
	}
	else
	{
		$msg=" <font color ='red'> <font size ='5px'>  Tous les champs doivent être complétés  !";
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
			<input class="nom" type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" /><br /><br />
			<input class="mail" type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" /><br /><br />
			<textarea  class="message"name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br /><br />
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