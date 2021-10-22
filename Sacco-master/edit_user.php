<?php
include "includes/header.php";
      if(isset($_POST["add"]))
	  {
		  $name = $_POST["fname"];
		  $email = $_POST["email"];
		  $username = $_POST["user"];
		  $type_id = $_POST["ty_id"];
		  
		  $id =$_POST["id"];
		  
		  
				  
				  $query = mysqli_query($conn,"UPDATE users SET name='$name',email='$email',username ='$username',type_id='$type_id' WHERE id=$id") 
				       or mysqli_error("Error in query!!");
				  
				  if($query)
				  {
					  echo "<script>alert('User updated successful!!');location.href='users.php?pg=us';</script>";
				  }
			  }
        if(isset($_REQUEST["id"]))
	  {
		  $qr=mysqli_query($conn,"SELECT * FROM users WHERE id=".$_REQUEST["id"]);
		  $rw=mysqli_fetch_assoc($qr);
	  }
?>
<h1><marquee>Edit User</marquee></h1>
    <br><br>
     <form action="edit_user.php?pg=edus" method="post" enctype="multipart/form-data">
	 <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
	  <table width="80%" border="0" cellspacing="0">
	    <tr>
		  <td>Full name:</td>
		  <td><input type="text" name="fname" value="<?php echo $rw["name"];?>" required placeholder="Enter Full Name"></td>
		</tr>
		<tr>
		  <td>E-mail:</td>
		  <td><input type="email" name="email" value="<?php echo $rw["email"];?>" required placeholder="Enter E-mail"></td>
		</tr>
		<tr>
		  <td>Username:</td>
		  <td><input type="text" name="user" value="<?php echo $rw["username"];?>" placeholder="Enter Your Username"></td>
		</tr>
		<tr>
		  <td>User type:</td>
		  <td><select required name="ty_id">
		      <option value="">...Select Type...</option>
		  
		        <?php
				    $query = mysqli_query($conn,"select * from user_type");
					
					while($row = mysqli_fetch_array($query))
					{
						echo "<option value='".$row["level"]."'";
						   if($rw['type_id']==$row["level"]){ echo "selected"; }
						   echo ">".$row["name"]."</option>";
					}
				?>
		  </select>
		  </td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="add" value="Edit User"></td>
		</tr>
	  </table>
	</form>
	 
<?php
include "includes/footer.php"
?>