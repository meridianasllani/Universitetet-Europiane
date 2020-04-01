<!DOCTYPE HTML>
<!--
	Urban by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php include_once("config.php")?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

	
		<!-- Header -->
			<header id="header" class="alt">
				<a href="#menu">Menu</a>
			</header>
<?php include_once("nav.php");?>

			<?php 
$query="CALL SELECTBANERUSER()";
mysqli_next_result($con);
$result=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result))
{
	extract($row);
	
	?>
		<!-- Banner -->
		<section id="banner" style="background:url(<?php echo "data:image/jpeg;base64,".base64_encode($foto_ban_ue);?>); background-repeat:no-repeat; background-size: cover;">
				<div class="inner">
					<header>
						<h1><?php echo $titulli_ban_ue; ?></h1>
						<p><?php echo $pershkrimi_ban_ue; ?></p>
					</header>
				</div>
			</section>
			
<?php } ?>
