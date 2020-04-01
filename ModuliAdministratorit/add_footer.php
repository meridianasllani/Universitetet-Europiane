<?php include("check.php");?>
<?php include ("header_admin.php");

if(isset($_POST['add'])) {	

	$pershkrimi = mysqli_real_escape_string($con,$_POST['pershkrimi']);
	$pamjafaqes = mysqli_real_escape_string($con,$_POST['pamjafaqes']);
		
	
	
	
	
	// checking empty fields
	if(empty($pershkrimi) || empty($pamjafaqes)) {
		
		if(empty($pershkrimi))
		{			
			echo "<font color='red'>Pershkrimi eshte i zbrazet.</font><br/>";
		
		}
		
		if(empty($pamjafaqes))
		{			
			echo "<font color='red'>Pamja faqes eshte i zbrazet.</font><br/>";
		
		}
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	}else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database
		mysqli_next_result($con);		
		$result = mysqli_query($con, "CALL INSERTFOOTER('$pershkrimi','$pamjafaqes')");
			echo "<script>
         setTimeout(function(){
            window.location.href = 'admin_home.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		
		//display success messMbiemri
		echo "<br/><a href='admin_home.php'>Shiko Rezultatet</a>";
	
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
													<input type="text" name="pershkrimi" id="name" value="" placeholder="Pershkrimi" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="pamjafaqes" id="name" value="" placeholder="Pamja e Faqes" />
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
