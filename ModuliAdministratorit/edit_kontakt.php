<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit']))
{	
	$kontakt_ko_ue_ID = $_GET['kontakt_ko_ue_ID'];
	
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
		
	} else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITKONTAKT('$kontakt_ko_ue_ID','$emri','$email','$mesazhi')");
		
		//redirectig to the display pProgrami. In our case, it is admin.ph

				echo"<script>

				setTimeout(function() {
					window.location.href = 'kontakt.php';
				}, 000);
				</script>";
				
	}
}
?>
<?php
//getting kontakt_ko_ue_ID from url
$kontakt_ko_ue_ID = $_GET['kontakt_ko_ue_ID'];

//selecting data associated with this particular kontakt_ko_ue_ID
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHKONTAKT('$kontakt_ko_ue_ID')");

while($res = mysqli_fetch_array($result))
{
	$emri = $res['emri_ko_ue'];
	$email = $res['email_ko_ue'];
	$mesazhi = $res['mesazhi_ko_ue'];
}
?>

<div id="main">

					<section class="wrapper style1">
						<div style="width:50%"class="inner">
						<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>
							
										<h1 style="text-align:center">Edito te Dhena</h1>
										<center>
										<form method="post" action="#" enctype="multipart/form-data">
											<div class="row uniform">
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="emri" id="name" value='<?php echo $emri; ?> ' placeholder="Emri" />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="email" name="email" id="name" value='<?php echo $email; ?>' placeholder="Email" />
												</div>
												<div style="width:100%" align="center"class="6u 12u$(xsmall)">
													<input type="text" name="mesazhi" id="name" value='<?php echo $mesazhi; ?>' placeholder="Mesazhi" />
												</div>
												<div class="12u$">
													<ul class="actions">
														<li><input type="submit" name="edit" value="Edito" class="alt" /></li>
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
