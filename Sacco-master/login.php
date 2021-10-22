<?php
include "includes/header.php";
    
	
	if(isset($_POST["log"]))
	{
		$user = $_POST["user"];
		$pass = md5($_POST["pass"]);
		
		$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$user' and password='$pass'");
		
		$result = mysqli_num_rows($query);
		if($result>0)
		{
			$row = mysqli_fetch_assoc($query);
			$_SESSION["ID"] = $row["id"]; 
			$_SESSION["NAME"] = $row["name"];
			$_SESSION["USERNAME"] = $row["username"];
			$_SESSION["EMAIL"] = $row["email"];
			$_SESSION["TYPE_ID"] = $row["type_id"];
			
			echo "<script>alert('Login Successful!!');location.href='index.php?pg=hm';</script>";
		}
		else
		{
			echo "<script>alert('Sorry Login failed!!');</script>";
		}
		
		
	}

?>
        <marquee><h3>Login Here</h3></marquee>
		<br><br>
         <form action="login.php?pg=rg" method="post" enctype="multipart/form-data">
	  <table width="80%" border="0" cellspacing="0">
	    <tr>
		  <td>Username:</td>
		  <td><input type="text" name="user" required placeholder="Enter your Username"></td>
		</tr>
		<tr>
		  <td>Password:</td>
		  <td><input type="password" name="pass" required placeholder="Enter your Password"></td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="log" value="Login"></td>
		</tr>
	  </table>
	  <p><a href="">Forgot Password?</a></p>
	</form>
<?php
include "includes/footer.php"
?>