<?php
/* Kontrollon sesionin */
include('config.php');
session_start();
$user_check=$_SESSION['username'];
mysqli_next_result($con);
$ses_sql = mysqli_query($con,"CALL SELECTCHECK('$user_check')");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['username_u_ue'];
if(!isset($user_check))
{ header("Location: admin_home.php");} 
?>