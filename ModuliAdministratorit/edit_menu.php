<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit']))
{	
	$m_menu_ue_ID = $_GET['m_menu_ue_ID'];
	
	$emri = mysqli_real_escape_string($con,$_POST['emri']);
	$link = mysqli_real_escape_string($con,$_POST['link']);
	$moduli = mysqli_real_escape_string($con,$_POST['moduli']);
	
	// checking empty fields
	if(empty($emri) || empty($link) || empty($moduli)) {
		
		if(empty($emri))
		{			
			echo "<font color='red'>Emri eshte i zbrazet.</font><br/>";
		
		}
		
		if(empty($link))
		{			
			echo "<font color='red'>Linku eshte i zbrazet.</font><br/>";
		
		}
		
		if(empty($moduli))
		{			
			echo "<font color='red'>Moduli eshte i zbrazet.</font><br/>";
		
		}
		
	} else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITMENU('$m_menu_ue_ID','$emri','$link','$moduli')");
		
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
//getting m_menu_ue_ID from url
$m_menu_ue_ID = $_GET['m_menu_ue_ID'];

//selecting data associated with this particular m_menu_ue_ID
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHMENU('$m_menu_ue_ID')");

while($res = mysqli_fetch_array($result))
{
	$emri = $res['m_menu_emri_ue'];
	$link = $res['m_menu_link_ue'];
	$moduli = $res['moduli_menu_ue'];
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
													<input type="text" name="emri" id="name" value='<?php echo $emri; ?>'  />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="link" id="name" value='<?php echo $link; ?>'  />
												</div>
												<div align="center"class="6u 12u$(xsmall)">
													<input type="text" name="moduli" id="name" value='<?php echo $moduli; ?>'  />
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