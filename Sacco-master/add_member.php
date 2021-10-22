<?php
include "includes/header.php";

      if(isset($_POST["sub"]))
	  {
		  $name = $_POST["fname"];
		  $dob = $_POST["dob"];
		  $gender = $_POST["gender"];
		  $address = $_POST["addr"];
		  $email = $_POST["email"];
		  $mobile_no = $_POST["mobno"];
		  $profile_pic = $_FILES["photo"]["name"];
		  $username = $_POST["user"];
		  $password = md5($_POST["pass"]);
		  $con_password = md5($_POST["conpass"]);
		  $date = date("d-m-y");
		  
		  
		  $result = mysqli_query($conn,"SELECT * FROM members WHERE email='$email'") or mysqli_error("Error in Query");
		  $member_check = mysqli_num_rows($result);
		  
		  if($member_check ==0)
		  {
			  //submit ation here
			  if($password ==$con_password)
			  {
				  //submit action
				  $photo_path = "profile_photos/";
				  $image = $photo_path.$profile_pic;
				  
				  $query = mysqli_query($conn,"INSERT INTO members VALUES(0,'$name','$dob','$gender','$address','$email','$mobile_no','$image','$username','$password','$date')") 
				  or mysqli_error("Error in query!!");
				  
				  if($query)
				  {
					  move_uploaded_file($_FILES["photo"]["tmp_name"],$image);
					  
					  mysqli_query($conn,"INSERT INTO users VALUES(0,'$name','$username','$email','$password',2)") 
				       or mysqli_error("Error in query!!");
					  
					  echo "<script>alert('Memeber registration successful!!');location.href='members.php?pg=mb';</script>";
				  }
			  }
			  else
			  {
				  echo "<script>alert('Password and Confirm password do not match');</script>";
			  }
		  }
		  else
		  {
			  echo "<script>alert('The member already exists!!');</script>";
		  }
	  }


?>
    <form action="add_member.php?pg=mem" method="post" enctype="multipart/form-data">
	  <table width="80%" border="0" cellspacing="0">
	    <tr>
		  <td>Full name:</td>
		  <td><input type="text" name="fname" required placeholder="Enter Full Name"></td>
		</tr>
		<tr>
		  <td>Date of Birth:</td>
		  <td><input type="date" name="dob" required></td>
		</tr>
		<tr>
		  <td>Gender:</td>
		  <td><input type="radio" name="gender" value="male" required>Male | <input type="radio" name="gender" value="female" required>Female</td>
		</tr>
		<tr>
		  <td>Address:</td>
		  <td><textarea name="addr" required placeholder="Enter Address"></textarea></td>
		</tr>
		<tr>
		  <td>E-mail:</td>
		  <td><input type="email" name="email" required placeholder="Enter E-mail"></td>
		</tr>
		<tr>
		  <td>Mobile no:</td>
		  <td><input type="text" name="mobno" required placeholder="Enter Mobile no"></td>
		</tr>
		<tr>
		  <td>Profile photo:</td>
		  <td><input type="file" name="photo" required></td>
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
		  <td colspan="2"><input type="submit" name="sub" value="Register"></td>
		</tr>
	  </table>
	</form>
<?php
include "includes/footer.php";
?>