
<?php
if (!isset($_SESSION['id']))	{
	echo '<script type="text/javascript"> alert("Vous n\'avez pas le droit d\'inscrire, merci de vous identifiez!"); window.location.href = "index.php"; </script>';
}
?>