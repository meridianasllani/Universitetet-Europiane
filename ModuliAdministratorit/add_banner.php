<?php include("check.php");?>
<?php include ("header_admin.php");

if(isset($_POST['add'])) {	

	$imgData=addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB
	$titulli = mysqli_real_escape_string($con,$_POST['titulli']);
	$pershkrimi = mysqli_real_escape_string($con,$_POST['pershkrimi']);
		
	
	
	
	
	// checking empty fields
	if(empty($titulli) || empty($pershkrimi)) {
				
		if(empty($titulli)) {
			echo "<font color='red'>Titulli eshte i zbrazet.</font><br/>";
		}
		
		if(empty($pershkrimi)) {
			echo "<font color='red'>Pershkrimi eshte i zbrazet.</font><br/>";
		}
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$con = mysqli_connect('localhost','root','','universitetet_europiane') or die ("Connection to database failed");
		$result = mysqli_query($con, "CALL INSERTBANER('$imgData','$titulli','$pershkrimi')");
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
													<input type="text" name="titulli" id="name" value="" placeholder="Titulli" />
												</div>
												<div class="6u$ 12u$(xsmall)">
													<input type="text" name="pershkrimi" id="email" value="" placeholder="Pershkrimi" />
												</div>
												<div>
													<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
													<input name="userfile" type="file" />
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
