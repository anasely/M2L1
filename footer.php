<!doctype html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="bootstrap.min.css">


</head>
<body>
	<footer>


		<div id="ok" >
			<div class="container-fluide">
				<div class="row footer_bottom">
					<div class="copy col-lg-5">
						<style type="text/css">
							#ok{
								background-color:#FAFEFE; 
							}
							p{
								padding-left: 20px;
							}
						
                   
                             </style>

			           <p>© 2019 BY Anas Elyassai</p>
			           
			        </div>
			         <div class="copy col-lg-4">

			           <a href="mentions_legales.php">Mentions légales</a> 
			           <?php 
		 						if (isset($_SESSION['id']) && $userinfo['isAdmin'] == 1){ 
		 							?>| <a href='admin.php'>Admin</a> <br /> <a href="gestion_emploi.php" style="padding-left: 40px;">Gestion emploi</a> 
		 							<?php
		 						}
			            ?>
		           
					 
				    		 
				    		 
					        </div>	   					



						
					</div>
				</div>
			</div>
		</div>
		</div> 
        </footer>
</body>	
</html>