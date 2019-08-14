<?php
session_start();
ob_start();
include "../lib/database.php";

	
	if($_REQUEST['user']=="login")

{
	$qu="select * from admin where ad_name='".$_REQUEST['ad_name']."' and ad_pass='".$_REQUEST['ad_pass']."'";
	$result=mysqli_query($obj->con,$qu);
	$no_records=mysqli_num_rows($result);
	 $arr=mysqli_fetch_array($result); 
	 if($no_records>0)
	 {
		 
		 
		 $_SESSION['aa']=$arr['ad_name'];
		 
		 $_SESSION['bb']=$arr['ad_pass'];
		 
		 header("location:index.php");
	 }
	 else
	 {
		header("location:login.php");
	 }
	 
	
	}
	
	
	if($_REQUEST['user']=="out")
	{
		
		unset($_SESSION['aa']);
		unset($_SESSION['bb']);
		session_destroy();
	header("location:login.php");
	}
	
	?>
	