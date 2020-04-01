<?php
//including the database connection file
include("config.php");

//getting  of the data from url
$lokacioni_uni_ue_ID=$_GET['lokacioni_uni_ue_ID'];

//deleting the row from table
mysqli_next_result($con);
$result = mysqli_query($con,"CALL FSHIJLOKACION('$lokacioni_uni_ue_ID')");

//redirecting to the display page (index.php in our case)
header("Location:admin_home.php");
?>