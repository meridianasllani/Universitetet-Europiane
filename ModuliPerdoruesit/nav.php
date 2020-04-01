<!-- Nav -->
			<nav id="menu">
				<ul class="links">
				
				<?php
				mysqli_next_result($con);
            $result = mysqli_query($con, "CALL SELECTMENU_USER();");
			/*SELECT m_menu_name, m_menu_link  FROM main_menu WHERE Modul='ModuliAdministratorit'*/
            while ($row = mysqli_fetch_assoc($result)) {

              extract($row);
			  
			  
if($result==null)
  mysqli_free_result($result);

            ?>
					<li><a href="<?php echo $row['m_menu_link_ue']; ?>"><?php echo $row['m_menu_emri_ue']; ?></a></li>
			<?php } ?>
					
				</ul>
			</nav>
			