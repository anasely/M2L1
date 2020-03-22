 <?php 
session_start();

include"header.php" ; 
 ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">


	<link rel="stylesheet" type="text/css" href="emploi.css">
	<link rel="stylesheet" href="bootstrap.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<body>
	<style type="text/css" > .article {
    background-color: #e9ecef;
    padding: 30px;
    margin-bottom: 10px;
}
.publie{
	margin: 12%;
}</style>
	
	<div class="container">
	<div class="publie">
		<section>
			<?php
			$con = mysqli_connect("localhost", "root", "root", "espace_membre");
			$query = "SELECT * FROM `emploi`  ";

			$result = $con->query($query) or die($mysqli->error.__LINE__);
			
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {?>
						<article>
							
				     	<form action="contact2.php" method="post" class="form-example">

                        <h4 align="center">réference</u> :  <?php echo $row['id'] ?></h4>
					    <u><h5>publié-le</u> :<?php echo $row['date'] ?> </h5></u>
						<u><h5>contrat</u> : <?php echo $row['type'] ?> </h5></u>
					    <input type="hidden" name="ref" value="<?php echo $row['id'] ?>">
						
							
                          <br>
                         <button type="button" class="btn btn-info" data-toggle="collapse" >
	                         <strong><?php echo $row['offre'] ?></strong>
	                         <br>

						 </button>
						 <br>
						 <br>
                            
							  <div >

								  <h4 style="border-style: groove ;"><u><span style="color: #366799 ; font-size:12px;">description: </span></u> <br><br><?php echo nl2br ($row['description']) ?> </h4></br>
							
                             <button type="submit" class="btn btn-info pull-right">postuler</button>
						</form>
				
					     </article>

	              <?php
				}	
			}else {

			   ?> <span style="color:#366799; margin-left:44% ; font-size: 20px; "> <?php echo 'pas D/offre';  

			}
			?>
			</span>
			
		</section>
	</div>	
	</div>	
    </div>

</u></form></article></section></div></div>	
</body>	

<?php include("footer.php") ?>
</head>
</html>