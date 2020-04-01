<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit']))
{	
	$ballina_foter_ba_fo_ue = $_GET['ballina_foter_ba_fo_ue'];
	
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
		
	} else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITFOOTER('$ballina_foter_ba_fo_ue','$pershkrimi','$pamjafaqes')");
		
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
//getting ballina_foter_ba_fo_ue from url
$ballina_foter_ba_fo_ue = $_GET['ballina_foter_ba_fo_ue'];

//selecting data associated with this particular ballina_foter_ba_fo_ue
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHFOOTER('$ballina_foter_ba_fo_ue')");

while($res = mysqli_fetch_array($result))
{
	$pershkrimi = $res['pershkrimi_ba_fo_ue'];
	$pamjafaqes = $res['pamjafaqes_ba_fo_ue'];
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
													<input type="text" name="pershkrimi" id="name" value='<?php echo $pershkrimi;?>'  />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="pamjafaqes" id="name" value='<?php echo $pamjafaqes;?>'  />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="edit" value="Shto" class="alt" /></li>
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