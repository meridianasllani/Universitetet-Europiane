<?php include("check.php");?>
<?php include ("header_admin.php");

if(isset($_POST['add'])) {	

	$emri = mysqli_real_escape_string($con,$_POST['emri']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mesazhi = mysqli_real_escape_string($con,$_POST['mesazhi']);
		
	
	
	
	
	// checking empty fields
	if(empty($emri) || empty($email) || empty($mesazhi)) {
		
		if(empty($emri))
		{			
			echo "<font color='red'>Emri eshte i zbrazet.</font><br/>";
		
		}
		
		if(empty($email))
		{			
			echo "<font color='red'>Email eshte i zbrazet.</font><br/>";
		
		}
		if(empty($mesazhi))
		{			
			echo "<font color='red'>Mesazhi eshte i zbrazet.</font><br/>";
		
		}
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	}else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		mysqli_next_result($con);
		$result = mysqli_query($con, "CALL INSERTKONTAKT('$emri','$email','$mesazhi')");
			echo "<script>
         setTimeout(function(){
            window.location.href = 'kontakt.php';
         }, 5000);
      </script>";
		 echo"<p><b>E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		
		//display success messMbiemri
		echo "<br/><a href='kontakt.php'>Shiko Rezultatet</a>";
	
	 }
}
	
?>

<div id="main">

										<!-- Section -->
					<section class="wrapper style1">
						<div style="width:50%"class="inner">
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
							
										<h1 style="text-align:center">Shto te Dhena</h1>
										<center>
										<form method="post" action="#" enctype="multipart/form-data">
											<div class="row uniform">
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="emri" id="name" value="" placeholder="Emri" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="email" name="email" id="name" value="" placeholder="Email" />
												</div>
												<div style="width:100%"align="center"class="6u 12u$(xsmall)">
													<input type="text" name="mesazhi" id="name" value="" placeholder="Mesazhi" />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="add" value="Shto" class="alt" /></li>
													</ul>
												</div>
											</div>
										</form>
										</center>

										<hr />

										
							
						</div>
					</section>

</div>
<?php include("footer.php");?>

<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
