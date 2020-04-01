<?php
//including the database connection file
include("config.php");

//getting Shfa3_ID of the data from url
$ballina_foter_ba_fo_ue = $_GET['ballina_foter_ba_fo_ue'];

//deleting the row from table
mysqli_next_result($con);
$result = mysqli_query($con,"CALL FSHIJFOOTER('$ballina_foter_ba_fo_ue')");

//redirecting to the display page (index.php in our case)
header("Location:admin_home.php");
?>