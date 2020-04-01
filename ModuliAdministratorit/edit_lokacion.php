<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit']))
{	
	$lokacioni_uni_ue_ID = $_GET['lokacioni_uni_ue_ID'];
	
	$lokacioni= mysqli_real_escape_string($con,$_POST['lokacioni']);
	
	// checking empty fields
			
		if(empty($lokacioni)) {
			echo "<font color='red'>Qyteti eshte i zbrazet.</font><br/>";
		}
		
		
		else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITLOKACION('$lokacioni_uni_ue_ID','$lokacioni')");
		
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
//getting lokacioni_uni_ue_ID from url
$lokacioni_uni_ue_ID = $_GET['lokacioni_uni_ue_ID'];

//selecting data associated with this particular lokacioni_uni_ue_ID
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHLOKACION('$lokacioni_uni_ue_ID')");


while($res = mysqli_fetch_array($result))
{
	$lokacioni = $res['lokacioni_uni_ue'];
}
?>

<div id="main">

										<!-- Section -->
					<section class="wrapper style1">
						<div style="width:50%"class="inner">
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
								<center>
										<h1 style="text-align:center">Edito te Dhena</h1>
										<form method="post" action="#" enctype="multipart/form-data">
											<div class="row uniform">
												<div style="margin-left:25%" class="6u 12u$(xsmall)">
													<input type="text" name="lokacioni" id="name" value='<?php echo $lokacioni;?>' />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="edit" value="Edito" class="alt" /></li>
													</ul>
												</div>
											</div>
										</form>
									<center>

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
