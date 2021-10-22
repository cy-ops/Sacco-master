<?php

session_start();
include "includes/config.php";
      $page =$_REQUEST["pg"];
 
  
  if(!isset($_SESSION["ID"]) and $page!=="hm" and $page!=="ab" and $page!=="rg" and $page!=="lg1")
  {
	 echo "<script>location.href='login.php?pg=lg1';</script>";
	 
  }
?>
<html>
<head><title>My sacco-
     <?php
	    if($page=="hm"){echo "Dashboard";}
		if($page=="ab"){echo "About";}
		if($page=="rg"){echo "Register";}
		if($page=="lg1"){echo "Login";}
		if($page=="us"){echo "Users";}
		if($page=="lg"){echo "Logout";}
		if($page=="ln"){echo "Loans";}
		if($page=="sv"){echo "Savings";}
		if($page=="pr"){echo "Profile";}
		if($page=="mb"){echo "Members";}
	 ?>
</title>
<style>
body{
	background-image:url(profile_photos/d.jpg);
	background-attachment:fixed;
}
</style>
</head>
<body>
<center>
   <h1>
     <?php
	    if($page=="hm"){echo "Dashboard";}
		if($page=="ab"){echo "About";}
		if($page=="rg"){echo "Register";}
		if($page=="lg1"){echo "Login";}
		if($page=="us"){echo "Users";}
		if($page=="lg"){echo "Logout";}
		if($page=="ln"){echo "Loans";}
		if($page=="sv"){echo "Savings";}
		if($page=="pr"){echo "Profile";}
		if($page=="mb"){echo "Members";}
	 ?>
	 Page
   </h1>
     <?php
	  include "menu.php";
	 ?>
   <div style="height:400px;">
   <div style="width:77%;height:350px;background-color:lightgrey;border:6px solid red;float:left;">
        
  