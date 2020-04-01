<?php include_once("header.php")?>
		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
						<div class="inner">
							<header class="align-center">
								
							</header>
							
								
										<form method="post" action="#">
											<div class="row uniform">
												<div class="6u 12u$(xsmall)">
													<input type="text" name="emri" id="name" value="" placeholder="Emri" />
												</div>
												<div class="6u$ 12u$(xsmall)">
													<input type="text" name="email" id="email" value="" placeholder="Email" />
												</div>
												
												
												<!-- Break -->
												<div class="12u$">
													<textarea name="mesazhi" id="message" placeholder="Jepni mesazhin tuaj per ne" rows=6"></textarea>
												</div>
												<!-- Break -->
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="contact" value="Dergo Mesazhin" /></li>
													</ul>
												</div>
											</div>
										</form>
										<?php



if(isset($_POST['contact']))
{ 
    
	
	$emri= mysqli_real_escape_string($con,$_POST['emri']);
	$email= mysqli_real_escape_string($con,$_POST['email']);	
	$mesazhi= mysqli_real_escape_string($con,$_POST['mesazhi']);	
	
	
		if( empty($emri) || empty($email) || empty($mesazhi) )
	{
		if (empty ($emri))
		{
			echo "<font color='red'>emri eshte i zbrazet</font>
			<br/>";
		}
		if (empty ($email))
		{
			echo "<font color='red'>email eshte i zbrazet </font>
			<br/>";
		}
		if (empty ($mesazhi))
		{
			echo "<font color='red'>mesazhi eshte i zbrazet </font>
			<br/>";
		}
		
		//link to the previous password
		echo "<br/> <a href='javascript:self.history.back();'>Go Back </a>";
	}
	else
	{
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				 echo "<b>$email</b> nuk eshte adresë valide.";
			
				
				}
				else {
		//if all fields are filled
		//insert data to database
		mysqli_next_result($con);
		$result=mysqli_query($con, "CALL INSERTKONTAKT('$emri','$email','$mesazhi')");
		
		//display success messpassword
		
		echo "<font color='green'>E dhena u shtua!";
		
	}
	}
}
	
	
	
	
	//kontrollimi i fushave {fields) te zbrazta
	
	
?>

										<hr />
						
						</div>
					</section>

				
			</div>

		<?php include_once("footer.php")?>
		
		<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			