
<h2>
<a href="index.php ?pg=hm">Home</a> | 
<?php
    if(!isset($_SESSION["ID"]))
	{
	?>	

<a href="about.php ?pg=ab">About</a> | <a href="register.php ?pg=rg">Register</a> | <a href="login.php ?pg=lg1">Login</a>
<?php
	}
	else
	{
?>
  <a href="members.php ?pg=mb">Members</a>
      <?php
	    if($_SESSION["TYPE_ID"]==1)
		{
	  ?>
 
 | <a href="users.php ?pg=us">Users</a> 
 <?php
		}
 ?>
| <a href="profile.php ?pg=pr">Profile</a> | <a href="loan.php ?pg=ln">Loans</a> | <a href="savings.php ?pg=sv">Savings</a> | <a href="logout.php">Logout</a>
</h2>
<?php
	}
?>