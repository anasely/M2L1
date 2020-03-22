<?php
if (!isset($userinfo['id']))	{
	echo '<script type="text/javascript"> alert("Vous n\'avez pas accès à cette page, merci de vous identifiez!"); window.location.href = "connexion.php"; </script>';
}
?>