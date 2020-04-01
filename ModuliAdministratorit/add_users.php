<?php include("check.php");?>
<?php include ("header_admin.php");

if(isset($_POST['add'])) {	

	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
		
	
	
	
	
	// checking empty fields
	if(empty($username) || empty($password)) {
		
		if(empty($username))
		{			
			echo "<font color='red'>Username eshte i zbrazet.</font><br/>";
		
		}
		
		if(empty($password))
		{			
			echo "<font color='red'>Passwordi eshte i zbrazet.</font><br/>";
		
		}
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	}else { 
		
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

		if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			
			trigger_error("Ju keni gabuar ne password. Passwordi duhet te permbaje: <ul><li>Passwordi duhet te jete minimum 8 karaktere</li><li>Passwordi duhet te permbaje nje shkronje te madhe</li><li>Passwordi duhet te permbaje nje shkronje te vogel</li><li>Passwordi duhet te permbaje nje numer</li></ul>");
  // tell the user something went wrong
}
	
		else {// if all the fields are filled (not empty) 
			
		//insert data to database	
		mysqli_next_result($con);
		$result = mysqli_query($con, "CALL INSERTUSER('$username','$password')");
			echo "<script>
         setTimeout(function(){
            window.location.href = 'users.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		
		//display success messMbiemri
		echo "<br/><a href='users.php'>Shiko Rezultatet</a>";
	
	 }
}
}
	
?>

<div id="main">

										<!-- Section -->
					<section class="wrapper style1">
						<div style="width:50%"class="inner">
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
							
										<h1 style="text-align:center">Shto te Dhena</h1>
										<form method="post" action="#" enctype="multipart/form-data">
											<div class="row uniform">
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="username" id="name" value="" placeholder="Username" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="password" name="password" id="name" value="" placeholder="Password" />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="add" value="Shto" class="alt" /></li>
													</ul>
												</div>
											</div>
										</form>

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
