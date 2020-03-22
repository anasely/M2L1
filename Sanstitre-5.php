<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{

		$header.='From:.' .$_POST['nom'].'  <' .$_POST['mail'].' >'."\n";
		$header='Content-Type:text/html; charset="UTF-8"'."\n";
		$header='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<br />
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					'.nl2br($_POST['message']).'
					<br />
				</div>
			</body>
		</html>
		';
		$destinataire = 'mlsite507@gmail.com';

		mail($destinataire, 'mon sujet',$message, $header);
		
		$msg="Votre message a bien été envoyé !";
	} 
	 else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">	



	<link rel="stylesheet" href="bootstrap.min.css" >
	<link type="text/css" rel="stylesheet" href="contact.css" >
<title>contact</title>
</head>

<body>



<!------ Include the above in your HEAD tag ---------->

<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action=''>
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Your Name *" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="mail" class="form-control" placeholder="Your Email *" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone']; } ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="mailform" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>
	
<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
</body>
</html>