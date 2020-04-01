<?php
//including the database connection file
include("config.php");

//getting  of the data from url
$kontakt_ko_ue_ID=$_GET['kontakt_ko_ue_ID'];

//deleting the row from 
mysqli_next_result($con);
$result = mysqli_query($con,"CALL FSHIJKONTAKT('$kontakt_ko_ue_ID')");

//redirecting to the display page (index.php in our case)
header("Location:kontakt.php");
?>