<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit2']))
	
{	

	$universitetet_uni_ue_ID = $_GET['universitetet_uni_ue_ID'];
	$imgData=addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
	
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
		
	} else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITUNIVERSITETET('$universitetet_uni_ue_ID','$imgData','$emriuniversitetit','$pershkrimi','$lokacioni','$linkubutonit','$emributonit')");
		
		//redirectig to the display pProgrami. In our case, it is admin.ph

				echo"<script>

				setTimeout(function() {
					window.location.href = 'admin_home.php';
				}, 000);
				</script>";
				
	}
}
?>
<?php
//getting universitetet_uni_ue_ID from url
$universitetet_uni_ue_ID = $_GET['universitetet_uni_ue_ID'];

//selecting data associated with this particular universitetet_uni_ue_ID
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHUNIVERSITETET('$universitetet_uni_ue_ID')");

while($res = mysqli_fetch_array($result))
{
	$imgData = $res['foto_uni_ue'];
	$emriuniversitetit = $res['universiteti_uni_ue'];
	$pershkrimi=$res['pershkrimi_uni_ue'];
	$lokacioni=$res['lokacioni_uni_ue'];
	$linkubutonit = $res['butoni_uni_ue'];
	$emributonit = $res['emribut_uni_ue'];
}
?>

<div id="main">

										<!-- Section -->
					<section class="wrapper style1">
						<div style="width:50%"class="inner">
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
							
										<h1 style="text-align:center">Edito te Dhenat</h1>
										<form method="post" action="#" enctype="multipart/form-data">
											<div class="row uniform">
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="emriuniversitetit" id="name" value='<?php echo $emriuniversitetit; ?>' placeholder="Emri i Universitetit" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="linkubutonit" id="name" value='<?php echo $linkubutonit; ?>' placeholder="Linku i Butonit" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="emributonit" id="name" value='<?php echo $emributonit; ?>' placeholder="Emri i Butonit" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="pershkrimi" id="name" value='<?php echo $pershkrimi; ?>' placeholder="Pershkrimi" />
												</div>
												<div class="12u$">
													<div class="select-wrapper">
														<select name="lokacioni" id="category">
															<option selected="selected">Zgjedh Lokacionin</option>
															<?php
															$con = mysqli_connect('localhost','root','','universitetet_europiane') or die ("Connection to database failed");
															$res=mysqli_query($con,"CALL SELECTUNIVERSITETETADMIN()");
															while($row=$res->fetch_array())
															{
															?>
																<option value="<?php echo $row['lokacioni_uni_ue_ID']; ?>"><?php echo $row['lokacioni_uni_ue']; ?></option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
												<div>
													<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
													<input name="userfile" type="file" />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="edit2" value="Edito" class="alt" /></li>
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
