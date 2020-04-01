<link rel="stylesheet" href="assets/css/main.css" />
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
			<h1 style="text-align:center">Menaxho te dhenat e Ballines</h1>
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
		<a href="add_banner.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
										
											<table class="alt">
												<thead>
													<tr>
														<th>Foto</th>
														<th>Titulli</th>
														<th>Pershkrimi</th>
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
"CALL SELECTTERM1('$term')");
while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
			
		echo "<td><img src=data:images/jpeg;base64,".base64_encode($row['foto_ban_ue'])." width='300'  height='100'/></td>";
		echo "<td>".$row['titulli_ban_ue']."</td>";
		echo "<td>".$row['pershkrimi_ban_ue']."</td>";

		
	   echo "<td><a href=\"edit_banner.php?baner_ban_ue_ID=$row[baner_ban_ue_ID]\" class='button special'>
		Edito</a> | <a href=\"fshij_baner.php?baner_ban_ue_ID=$row[baner_ban_ue_ID]\" class='button special'
		onClick=\"return confirm('A jeni i sigurt qe deshironi te fshini te dhenat?')\">
		Fshi</a></td></tr>";		
	}

}

?>
												</tbody>
											</table>
									
										
										<hr><br>
										
										<!--Informata-->
										<h1 style="text-align:center">Menaxho te dhenat e Informatave</h1>
<div id="wrap">

		<div class="left">
<form style="width:70%; float:left;" method="post" action="#">
											<div class="row uniform">
												<div class="9u 12u$(small)">
													<input type="text" name="term1" id="query" value="" />
												</div>
												<div class="3u$ 12u$(small)">
													<input type="submit" value="Kerko" class="fit" />
												</div>
											</div>
										</form>		

		</div>

		<div class="right">
		<a href="add_informata.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
								
										<div  class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Foto</th>
														<th>Titulli</th>
														<th>Pershkrimi</th>
														<th>Modifiko</th>
													</tr>
													</thead>
													<tbody>
													<?php
if (!empty($_REQUEST['term1'])) {
$term = mysqli_real_escape_string
($con,$_REQUEST['term1']); 
mysqli_next_result($con);    
$sql = mysqli_query($con,
"CALL SELECTTERM('$term')");
while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
			
		echo "<td><img src=data:images/jpeg;base64,".base64_encode($row['foto_info_ue'])." width='150'  height='200'/></td>";
		echo "<td>".$row['titulli_info_ue']."</td>";
		echo "<td>".$row['pershkrimi_info_ue']."</td>";

		
	   echo "<td><a href=\"edit_informata.php?informata_info_ue_ID=$row[informata_info_ue_ID]\" class='button special'>
		Edito</a> | <a href=\"fshij_informata.php?informata_info_ue_ID=$row[informata_info_ue_ID]\" class='button special'
		onClick=\"return confirm('A jeni i sigurt qe deshironi te fshini te dhenat?')\">
		Fshi</a></td></tr>";		
	}

}

?>
												<tbody>
											</table>
										</div>
										
										
										<hr><br>
										
										<!--UNIVERSITETET-->
										<h1 style="text-align:center">Menaxho te dhenat e Universiteteve</h1>
<div id="wrap">

		<div class="left">
<form style="width:70%; float:left;" method="post" action="#">
											<div class="row uniform">
												<div class="9u 12u$(small)">
													<input type="text" name="term2" id="query" value="" />
												</div>
												<div class="3u$ 12u$(small)">
													<input type="submit" value="Kerko" class="fit" />
												</div>
											</div>
										</form>		

		</div>

		<div class="right">
		<a href="add_universitetet.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
										<div  class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Foto</th>
														<th>Universiteti</th>
														<th>Pershkrimi</th>
														<th>Lokacioni</th>
														<th>Linku Butonit</th>
														<th>Emri i Butonit</th>
														<th>Modifiko</th>
													</tr>
													</thead>
													<tbody>
													<?php
if (!empty($_REQUEST['term2'])) {
$term = mysqli_real_escape_string
($con,$_REQUEST['term2']);
mysqli_next_result($con); 
$sql = mysqli_query($con,
"CALL SELECTTERM5('$term')");

while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
			
		echo "<td><img src=data:images/jpeg;base64,".base64_encode($row['foto_uni_ue'])." width='200'  height='100'/></td>";
		echo "<td>".$row['universiteti_uni_ue']."</td>";
		echo "<td>".$row['pershkrimi_uni_ue']."</td>";
		echo "<td>".$row['lokacioni_uni_ue']."</td>";
		echo "<td>".$row['butoni_uni_ue']."</td>";
		echo "<td>".$row['emribut_uni_ue']."</td>";
		

		
	   echo "<td><a href=\"edit_universitetet.php?universitetet_uni_ue_ID=$row[universitetet_uni_ue_ID]\" class='button special'>
		Edito</a> | <a href=\"fshij_universitetet.php?universitetet_uni_ue_ID=$row[universitetet_uni_ue_ID]\" class='button special'
		onClick=\"return confirm('A jeni i sigurt qe deshironi te fshini te dhenat?')\">
		Fshi</a></td></tr>";		
	}

}

?>
												</tbody>
											</table>
										</div>
										
										<hr><br>
										
										<!--Baneri-->
			<h1 style="text-align:center">Menaxho te dhenat e Lokacionit</h1>
<div id="wrap">

		<div class="left">
<form style="width:70%; float:left;" method="post" action="#">
											<div class="row uniform">
												<div class="9u 12u$(small)">
													<input type="text" name="term7" id="query" value="" />
												</div>
												<div class="3u$ 12u$(small)">
													<input type="submit" value="Kerko" class="fit" />
												</div>
											</div>
										</form>		

		</div>

		<div class="right">
		<a href="add_lokacion.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
										<div  class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Qyteti</th>
														<th>Modifiko</th>
													</tr>
													</thead>
													<tbody>
													
													<?php
if (!empty($_REQUEST['term7'])) {
$term = mysqli_real_escape_string
($con,$_REQUEST['term7']); 
mysqli_next_result($con);    
$sql = mysqli_query($con,
"CALL SELECTTERM6('$term')");
while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
			
			
		echo "<td>".$row['lokacioni_uni_ue']."</td>";

		
	   echo "<td><a href=\"edit_lokacion.php?lokacioni_uni_ue_ID=$row[lokacioni_uni_ue_ID]\" style='float:right' class='button special'> 
		Edito</a>  <a href=\"fshij_lokacion.php?lokacioni_uni_ue_ID=$row[lokacioni_uni_ue_ID]\"  class='button special'
		onClick=\"return confirm('A jeni i sigurt qe deshironi te fshini te dhenat?')\">
		Fshi</a></td></tr>";		
	}

}

?>
												</tbody>
											</table>
										</div>
										
										<hr><br>
										
										<!--FOOTER-->
										<h1 style="text-align:center">Menaxho te dhenat e Footerit</h1>
										
<div id="wrap">

		<div class="left">
<form style="width:70%; float:left;" method="post" action="#">
											<div class="row uniform">
												<div class="9u 12u$(small)">
													<input type="text" name="term3" id="query" value="" />
												</div>
												<div class="3u$ 12u$(small)">
													<input type="submit" value="Kerko" class="fit" />
												</div>
											</div>
										</form>		

		</div>

		<div class="right">
		<a href="add_footer.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
										<div  class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Pershkrimi</th>
														<th>Pamja e Faqes</th>
														<th>Modifiko</th>
													</tr>
													</thead>
													<tbody>
													<?php
if (!empty($_REQUEST['term3'])) {
$term = mysqli_real_escape_string
($con,$_REQUEST['term3']);  
mysqli_next_result($con);   
$sql = mysqli_query($con,
"CALL SELECTTERM4('$term')");
while($row = mysqli_fetch_array($sql)) { 
		echo "<tr>";
			
		echo "<td>".$row['pershkrimi_ba_fo_ue']."</td>";
		echo "<td>".$row['pamjafaqes_ba_fo_ue']."</td>";

		
	   echo "<td><a href=\"edit_footer.php?ballina_foter_ba_fo_ue=$row[ballina_foter_ba_fo_ue]\" class='button special'>
		Edito</a> | <a href=\"fshij_footer.php?ballina_foter_ba_fo_ue=$row[ballina_foter_ba_fo_ue]\" class='button special'
		onClick=\"return confirm('A jeni i sigurt qe deshironi te fshini te dhenat?')\">
		Fshi</a></td></tr>";		
	}

}

?>
												</tbody>
											</table>
										</div>
										
										<hr><br>
										<!--Baneri-->
			<h1 style="text-align:center">Menaxho te dhenat e Menyse</h1>
<div id="wrap">

		<div class="left">
<form style="width:70%; float:left;" method="post" action="#">
											<div class="row uniform">
												<div class="9u 12u$(small)">
													<input type="text" name="term4" id="query" value="" />
												</div>
												<div class="3u$ 12u$(small)">
													<input type="submit" value="Kerko" class="fit" />
												</div>
											</div>
										</form>		

		</div>

		<div class="right">
		<a href="add_menu.php" style="float:right" name="add" class="button">Shtoni</a>
			
		</div>
</div>
<br>
										<div  class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Emri i Menyse</th>
														<th>Linku i Menyse</th>
														<th>Moduli</th>
														<th>Modifiko</th>
													</tr>
													</thead>
													<tbody>
													
													<?php
									
if (!empty($_REQUEST['term4'])) {
$term = mysqli_real_escape_string
($con,$_REQUEST['term4']); 
mysqli_next_result($con);    
$sql = mysqli_query($con,
"CALL SELECTTERM7('$term')");
while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
			
			
		echo "<td>".$row['m_menu_emri_ue']."</td>";
		echo "<td>".$row['m_menu_link_ue']."</td>";
		echo "<td>".$row['moduli_menu_ue']."</td>";

		
	   echo "<td><a href=\"edit_menu.php?m_menu_ue_ID=$row[m_menu_ue_ID]\" style='float:right' class='button special'> 
		Edito</a>  <a href=\"fshij_menu.php?m_menu_ue_ID=$row[m_menu_ue_ID]\"  class='button special'
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