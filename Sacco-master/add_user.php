<?php
include "includes/header.php";
      if(isset($_POST["add"]))
	  {
		  $name = $_POST["fname"];
		  $email = $_POST["email"];
		  $username = $_POST["user"];
		  $password = md5($_POST["pass"]);
		  $con_password = md5($_POST["conpass"]);
		  $type = $_POST["ty_id"];
		  
		  
		  $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") or mysqli_error("Error in Query");
		  $user_check = mysqli_num_rows($result);
		  
		  if($user_check ==0)
		  {
			  //submit ation here
			  if($password ==$con_password)
			  {
				  //submit action
				  
				  $query = mysqli_query($conn,"INSERT INTO users VALUES(0,'$name','$username','$email','$password','$type')") 
				       or mysqli_error("Error in query!!");
				  
				  if($query)
				  {
					  echo "<script>alert('User registration successful!!');location.href='users.php?pg=us';</script>";
				  }
			  }
			  else
			  {
				  echo "<script>alert('Password and Confirm password do not match');</script>";
			  }
		  }
		  else
		  {
			  echo "<script>alert('The user already exists!!');</script>";
		  }
	  }

?>
<h1><marquee>Add User</marquee></h1>
    <br><br>
     <form action="add_user.php?pg=adus" method="post" enctype="multipart/form-data">
	  <table width="80%" border="0" cellspacing="0">
	    <tr>
		  <td>Full name:</td>
		  <td><input type="text" name="fname" required placeholder="Enter Full Name"></td>
		</tr>
		<tr>
		  <td>E-mail:</td>
		  <td><input type="email" name="email" required placeholder="Enter E-mail"></td>
		</tr>
		<tr>
		  <td>Username:</td>
		  <td><input type="text" name="user" placeholder="Enter Your Username"></td>
		</tr>
		<tr>
		  <td>Password:</td>
		  <td><input type="password" name="pass" required placeholder="Enter your Password"></td>
		</tr>
		<tr>
		  <td>Confirm password:</td>
		  <td><input type="password" name="conpass" required></td>
		</tr>
		<tr>
		  <td>User type:</td>
		  <td><select required name="ty_id">
		      <option value="">...Select Type...</option>
		  
		        <?php
				    $query = mysqli_query($conn,"select * from user_type") 
					or mysqli_error ("Error in query!!");
					
					while($row = mysqli_fetch_array($query))
					{
						echo "<option value='".$row["level"]."'>".$row["name"]."</option>";
					}
				?>
		  </select>
		  </td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="add" value="Add User"></td>
		</tr>
	  </table>
	</form>
	 
<?php
include "includes/footer.php"
?>