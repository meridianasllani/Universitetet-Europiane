<?php
//including the database connection file
include("config.php");

//getting Shfa3_ID of the data from url
$m_menu_ue_ID = $_GET['m_menu_ue_ID'];

//deleting the row from table
mysqli_next_result($con);
$result = mysqli_query($con,"CALL FSHIJMENU('$m_menu_ue_ID')");

//redirecting to the display page (index.php in our case)
header("Location:admin_home.php");
?>