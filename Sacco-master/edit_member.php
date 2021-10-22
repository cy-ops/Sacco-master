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
		  $username = $_POST["user"];
		  $id = $_POST['id'];
		  
		  
				  $query = mysqli_query($conn,"UPDATE members SET name='$name', dob='$dob', gender='$gender', address='$address', email='$email', mobile_no='$mobile_no', username='$username' WHERE id='$id'") 
				  or mysqli_error("Error in query!!");
				  
				  if($query)
				  {
					  echo "<script>alert('Memeber updated successful!!');location.href='members.php?pg=mb';</script>";
				  }
			 
		  
	  }
	  if(isset($_REQUEST["id"]))
	  {
		  $qr=mysqli_query($conn,"SELECT * FROM members WHERE id=".$_REQUEST["id"]);
		  $rw=mysqli_fetch_assoc($qr);
	  }


?>
<marquee><h3>Edit Member</h3></marquee>
    <form action="edit_member.php?pg=edit" method="post" enctype="multipart/form-data">
	  
	   <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
	
	  <table width="80%" border="0" cellspacing="0">
	    <tr>
		  <td>Full name:</td>
		  <td><input type="text" value="<?php echo $rw["name"];?>" name="fname" required placeholder="Enter Full Name"></td>
		</tr>
		<tr>
		  <td>Date of Birth:</td>
		  <td><input type="date" value="<?php echo $rw["dob"];?>" name="dob" required></td>
		</tr>
		<tr>
		  <td>Gender:</td>
		  <td><input type="radio" <?php if($rw["gender"]=="male"){echo "checked";}?> name="gender" value="male" required>Male | <input type="radio" name="gender" <?php if($rw["gender"]=="female"){echo "checked";}?> value="female" required>Female</td>
		</tr>
		<tr>
		  <td>Address:</td>
		  <td><textarea name="addr" required placeholder="Enter Address"><?php echo $rw["address"];?></textarea></td>
		</tr>
		<tr>
		  <td>E-mail:</td>
		  <td><input type="email" value="<?php echo $rw["email"];?>" name="email" required placeholder="Enter E-mail"></td>
		</tr>
		<tr>
		  <td>Mobile no:</td>
		  <td><input type="text" value="<?php echo $rw["mobile_no"];?>" name="mobno" required placeholder="Enter Mobile no"></td>
		</tr>
		<tr>
		  <td>Username:</td>
		  <td><input type="text" value="<?php echo $rw["username"];?>" name="user" placeholder="Enter Your Username"></td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="sub" value="Edit"></td>
		</tr>
	  </table>
	</form>
<?php
include "includes/footer.php";
?>