<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<?php
/* Index.php faqja qe permban formen e loginit) */
	include_once('login.php'); // Include Login Script
	if ((isset($_SESSION['username']) != '')) 
	{
		header('Location: admin_home.php');
	}	
?>
<?php include_once("header_login.php")?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">
		<!-- Main -->
			<div style="background-color:white" id="main">

			

				<!-- Section -->
					<section style="width:100%" class="wrapper style1">
						<div class="inner">
							
										<h1 style="text-align:center">Kyqu</h1>
										<form style="text-align: center" method="post" action="#">
											<div style="width:100%;" class="row uniform">
												<div style="width:75%;padding-left:33%;">
													<input type="text" name="username" id="name" value="" placeholder="Perdoruesi" />
												</div><br><br><br>
												<div style="width:75%;padding-left:33%;">
													<input type="password" name="password" id="password" value="" placeholder="Fjalekalimi" />
												</div>
												<!-- Break -->
												
												<div style="width:75%;padding-left:30%">
													<ul class="actions">
														<li><input type="submit" name="submit" value="Kyqu" /></li>
													</ul>
												</div>
											</div>
										</form>

										<hr />

										
							
						</div>
					</section>

			</div>

				<?php include_once("footer.php")?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>