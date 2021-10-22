<?php
include "includes/header.php";
      if(isset($_REQUEST['id']))
	 {
		 $del = mysqli_query($conn,"DELETE FROM users WHERE id=".$_REQUEST['id']);
		 if($del)
		 {
			 
			 echo "<script>alert('User deleted successfuly!!');location.href='users.php?pg=us'</script>";
		 }
		 
	 }
?>
<marquee><h4>list of Users</h4></marquee>
    <br><br>
	<strong><a href="add_user.php?pg=adus">Add User</a></strong>
     <table width="80%" border="1" cellpadding="1" cellspacing="0">
	  <tr>
	     <th>S/N</th><th>Name</th><th>Username</th><th>Email</th><th>Level</th><th>Action</th>
	 </tr>
	 <?php
	    $query = mysqli_query($conn,"SELECT * FROM users");
		$i=1;
		while($row = mysqli_fetch_array($query))
		{
			?>
			 <tr>
	     <td><?php echo $i?></td><td><?php echo $row["name"];?></td>
		 <td><?php echo $row["username"];?></td>
		 <td><?php echo $row["email"];?></td>
		 <td>
		 <?php
            $query1= mysqli_query($conn,"SELECT * FROM user_type WHERE level='".$row["type_id"]."'");
			while($row1 = mysqli_fetch_array($query1))
			{
				echo $row1["name"];
			}
		 ?>
		 </td>
		 <td><a href="edit_user.php?pg=edus&id=<?php echo $row["id"];?>">Edit</a> | <a onclick="javascript:return confirm('Are you sure you want to delete User?');" href="?pg=us&id=<?php echo $row["id"];?>">Delete</a></td>
	         </tr>
		<?php
		$i++;
		}
	    ?>
	 </table>
	 
<?php
include "includes/footer.php"
?>