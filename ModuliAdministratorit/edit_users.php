<?php include("check.php");?>
<?php include ("header_admin.php");?>
<?php include_once("config.php");

if(isset($_POST['edit']))
{	
	$user_u_ue_ID = $_GET['user_u_ue_ID'];
	
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);	
	
	// checking empty fields
	if(empty($username) || empty($password)) {	
			
		if(empty($username)) {
			echo "<font color='red'>Username eshte i zbrazet.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Passwordi eshte i zbrazet.</font><br/>";
		}
		
	} else {	
		//updating the table
		mysqli_next_result($con);
		$result = mysqli_query($con,"CALL EDITUSER('$user_u_ue_ID','$username','$password')");
		
		//redirectig to the display pProgrami. In our case, it is admin.ph

				echo"<script>

				setTimeout(function() {
					window.location.href = 'users.php';
				}, 000);
				</script>";
				
	}
}
?>
<?php
//getting user_u_ue_ID from url
$user_u_ue_ID = $_GET['user_u_ue_ID'];

//selecting data associated with this particular user_u_ue_ID
mysqli_next_result($con);
$result = mysqli_query($con,"CALL ZGJEDHUSER('$user_u_ue_ID')");

while($res = mysqli_fetch_array($result))
{
	$username = $res['username_u_ue'];
	$password = $res['password_u_ue'];
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
													<input type="text" name="username" id="name" value='<?php echo $username;?>'  />
												</div>
												<div class="6u$ 12u$(xsmall)">
													<input type="password" name="password" id="email" value='<?php echo $password; ?>'  />
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
