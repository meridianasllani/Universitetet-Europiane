<?php include("check.php");?>
<?php include ("header_admin.php");

if(isset($_POST['add'])) {	

	$imgData=addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	$maxsize = 10000000; //set to approx 10 MB
	$emriuniversitetit = mysqli_real_escape_string($con,$_POST['emriuniversitetit']);
	$pershkrimi= mysqli_real_escape_string($con,$_POST['pershkrimi']);
	$lokacioni= mysqli_real_escape_string($con,$_POST['lokacioni']);
	$linkubutonit = mysqli_real_escape_string($con,$_POST['linkubutonit']);
	$emributonit = mysqli_real_escape_string($con,$_POST['emributonit']);
	
		
	
	
	
	
	// checking empty fields
	if(empty($emriuniversitetit) || empty($linkubutonit) || empty($emributonit) || empty($pershkrimi) || empty($lokacioni)) {
				
		if(empty($emriuniversitetit)) {
			echo "<font color='red'>Emri i Universitetit eshte i zbrazet.</font><br/>";
		}
		
		if(empty($linkubutonit)) {
			echo "<font color='red'>Linku i Butonit eshte i zbrazet.</font><br/>";
		}
		
		if(empty($emributonit)) {
			echo "<font color='red'>Emri i Butonit eshte i zbrazet.</font><br/>";
		}
		
		if(empty($pershkrimi)) {
			echo "<font color='red'>Pershkrimi eshte i zbrazet.</font><br/>";
		}
		
		if(empty($lokacioni)) {
			echo "<font color='red'>Lokacioni eshte i zbrazet.</font><br/>";
		}
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		mysqli_next_result($con);
		$result = mysqli_query($con, "CALL INSERTUNIVERSITETET('$imgData','$emriuniversitetit','$pershkrimi','$lokacioni','$linkubutonit','$emributonit')");
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
										<form method="post" action="" enctype="multipart/form-data">
											<div class="row uniform">
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="emriuniversitetit" id="name" value="" placeholder="Emri i Universitetit" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="linkubutonit" id="name" value="" placeholder="Linku i Butonit" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="emributonit" id="name" value="" placeholder="Emri i Butonit" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="pershkrimi" id="name" value="" placeholder="Pershkrimi" />
												</div>
												<div class="12u$">
													<div class="select-wrapper">
														<select name="lokacioni" id="category">
															<option selected="selected">Zgjedh Lokacionin</option>
															<?php
															mysqli_next_result($con);
															$res=mysqli_query($con,"CALL SELECTUNIVERSITETETADMIN()");
															while($row=$res->fetch_array())
															{
															?>
																<option value="<?php echo $row['lokacioni_uni_ue_ID']; ?>"><?php echo $row['lokacioni_uni_ue']; ?></option>
																<?php
															}
															?>
														</select><br />
													</div>
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
