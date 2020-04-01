<?php include_once("header.php");
include_once("config.php");
$id = $_GET['id'];
?>

		<!-- Main -->
			<div id="main">

				<!-- Section -->
					<section class="wrapper">
					<?php
				
				$query="CALL PROVE('$id')";
				$con = mysqli_connect('localhost','root','','universitetet_europiane') or die ("Connection to database failed");
				mysqli_next_result($con);
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					
					extract($row);
					
					?>
						<div class="inner">
						
							<header class="align-center">
							
								<h1><?php echo $universiteti_uni_ue; ?></h1>
								<p><?php echo $lokacioni_uni_ue; ?></p>
							</header>
							<div class="flex flex-2">
							
								<div class="col col2">
								<br>
								
									<p><?php echo $pershkrimi_uni_ue; ?></p>
								</div>
								<div class="col col1 first">
									<div class="image round fit">
										<?php echo"  <img src=data:images/jpeg;base64,".base64_encode($foto_uni_ue)."> " ; ?> 
									</div>
								</div>
							</div>
						
						</div>
						<?php } ?>
					</section>

				<!-- Section -->
					
			</div>

		<?php include_once("footer.php")?>
		
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>