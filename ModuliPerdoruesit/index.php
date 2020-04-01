<?php ob_start();?>
<?php include_once("header.php");

?>

<?php
$visits = 1;
if (isset($_COOKIE["visits"])) {
    $visits = (int)$_COOKIE["visits"];
	
}    $Month = 2592000 + time();
    //this adds 30 days to the current time
 setcookie("visits", date("F jS - g:i a"), $Month);
	if(isset($_COOKIE['visits']))
    {
    $last = $_COOKIE['visits'];
    echo "<p style='text-align:right;'>Vizita juaj e fundit ishte me: " . $last."</p>";
    }
    else
    {   echo "<p style='text-align:right;'>Vizita juaj e pare ne webaplikacion tone! Ju deshirojme mireseardhje!</p>";    }
ob_end_flush();
 ?> 		<!-- Main -->
			<div id="main">
			<?php
			mysqli_next_result($con);
			$query="CALL SELECTINFORMATAUSER()";
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				extract($row);
				?>

				<!-- Section -->
					<section class="wrapper style1">
						<div class="inner">
						
							<!-- 2 Columns -->
								<div class="flex flex-2">
									<div class="col col1">
										<div class="image round fit">
											<?php echo"<img src=data:image/jpeg;base64,".base64_encode($foto_info_ue).">"; ?> 
										</div>
									</div>
									<div class="col col2">
										<h3 style="text-align:center"><?php echo $titulli_info_ue; ?></h3>
										<p><?php echo $pershkrimi_info_ue; ?></p>
									</div>
								</div>
						</div>
					</section>
					
			<?php } ?>
<hr>


				
				<!-- Section -->
					<section class="wrapper style1">

						<div class="inner">
						
							

							<div class="flex flex-3">
							<?php
				mysqli_next_result($con);
				$query="CALL SELECTUNIVERSITETUSER()";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					
					extract($row);
					
					?>
							
								<div class="col align-center">
									<div class="image round fit">
										<?php echo"<img src=data:image/jpeg;base64,".base64_encode($foto_uni_ue)." width='200'  height='300'>"; ?> 
									</div>
									<p><?php echo $universiteti_uni_ue; ?></p>
									<a target="_blank" href='<?php echo $butoni_uni_ue;?>?id=<?php echo $row['universitetet_uni_ue_ID'];?>' class="button"><?php echo $emribut_uni_ue;?></a>
								</div>
								
								<?php } ?>

							</div>

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
			