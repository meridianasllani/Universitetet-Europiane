<?php include("check.php");?>
<?php include_once("header_admin.php");
	?>



		<!-- Main -->
		
			<div id="main">
			<section class="wrapper style1">
					<div class="inner">
			<p style="text-align:right;">Përshëndetje, <em><?php  echo $login_user;?>!</em></p>

		
			<br>
			
			<!--Baneri-->
			<h1 style="text-align:center">Menaxho te dhenat e Perdoruesve</h1>
<div id="wrap">

		<div class="left">
<form style="width:70%; float:left;" method="post" action="#">
											<div class="row uniform">
												<div class="9u 12u$(small)">
													<input type="text" name="term" id="query" value="" />
												</div>
												<div class="3u$ 12u$(small)">
													<input type="submit" value="Kerko" class="fit" />
												</div>
											</div>
										</form>		

		</div>

		<div class="right">
		<a href="add_users.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
										<div  class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Username</th>
														<th>Password</th>
														<th>Modifiko</th>
													</tr>
													</thead>
													<tbody>
													
													<?php
if (!empty($_REQUEST['term'])) {
$term = mysqli_real_escape_string
($con,$_REQUEST['term']);    
mysqli_next_result($con); 
$sql = mysqli_query($con,
"CALL SELECTTERM3('$term')");
while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
			
			
		echo "<td>".$row['username_u_ue']."</td>";
		echo "<td>".$row['password_u_ue']."</td>";

		
	   echo "<td><a href=\"edit_users.php?user_u_ue_ID=$row[user_u_ue_ID]\" class='button special'> 
		Edito</a> | <a href=\"fshij_users.php?user_u_ue_ID=$row[user_u_ue_ID]\" class='button special'
		onClick=\"return confirm('A jeni i sigurt qe deshironi te fshini te dhenat?')\">
		Fshi</a></td></tr>";		
	}

}

?>
												</tbody>
											</table>
										</div>
										
										<hr><br>
										
										</div>
				</section>
	
			

		<?php include_once("footer.php")?>
			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>