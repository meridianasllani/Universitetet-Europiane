<center>
<footer id="footer">
				<div class="container">
				
				<?php
				mysqli_next_result($con);
            $result = mysqli_query($con, "CALL SELECTFOOTERUSER()");
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

            ?> 
			<?php echo $pershkrimi_ba_fo_ue; ?>
						<?php } ?>
						
							<?php
			mysqli_next_result($con);
            $result = mysqli_query($con, "CALL SELECTFOOTERUSER2()");
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

            ?> 
			
			
				<div class="copyrightt">
				 <p> <?php echo $pershkrimi_ba_fo_ue; ?></p>
				<?php } ?>
				</div>
				https://www.topuniversities.com/universities/scuola-normale-superiore-di-pisa <br>
				https://studyabroad.shiksha.com/germany/universities/free-university-of-berlin <br>
				https://www.fu-berlin.de/en/index.html <br>
				https://www.goabroad.com/articles/study-abroad/cheapest-universities-in-europe <br>
				https://stackoverflow.com/questions/8141125/regex-for-password-php/34166252
			</footer>
			</center>
			</body>
			</html>
			