<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit']))
{	
	$baner_ban_ue_ID = $_GET['baner_ban_ue_ID'];
	$imgData=addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
	
	$titulli= mysqli_real_escape_string($con,$_POST['titulli']);
	$pershkrimi= mysqli_real_escape_string($con,$_POST['pershkrimi']);	
	
	// checking empty fields
	if(empty($titulli) || empty($pershkrimi)) {	
			
		if(empty($titulli)) {
			echo "<font color='red'>Titulli field is empty.</font><br/>";
		}
		
		if(empty($pershkrimi)) {
			echo "<font color='red'>Pershkrimi field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITBANER('$baner_ban_ue_ID','$imgData','$titulli','$pershkrimi')");
		
		//redirectig to the display pProgrami. In our case, it is admin.php
		 
				echo"<script>

				setTimeout(function() {
					window.location.href = 'admin_home.php';
				}, 000);
				</script>";
	}
}
?>
<?php
//getting baner_ban_ue_ID from url
$baner_ban_ue_ID = $_GET['baner_ban_ue_ID'];

//selecting data associated with this particular baner_ban_ue_ID
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHBANER('$baner_ban_ue_ID')");

while($res = mysqli_fetch_array($result))
{
	$imgData = $res['foto_ban_ue'];
	$titulli = $res['titulli_ban_ue'];
	$pershkrimi = $res['pershkrimi_ban_ue'];
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
													<input type="text" name="titulli" id="name" value='<?php echo $titulli;?>'  />
												</div>
												<div class="6u$ 12u$(xsmall)">
													<input type="text" name="pershkrimi" id="email" value='<?php echo $pershkrimi; ?>'  />
												</div>
												<div>
													<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
													<input name="userfile" type="file" />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="edit" value="Edito" class="alt" /></li>
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
