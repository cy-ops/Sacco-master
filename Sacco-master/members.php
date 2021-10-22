<?php
include "includes/header.php";

     if(isset($_REQUEST['id']))
	 {
		 $res = mysqli_query($conn,"SELECT profile_pic, email FROM members WHERE id=".$_REQUEST['id']);
		 $rw = mysqli_fetch_assoc($res);
		 $photo = $rw['profile_pic'];
		 $email = $rw['email'];
		 
		 $del = mysqli_query($conn,"DELETE FROM members WHERE id=".$_REQUEST['id']);
		 if($del)
		 {
			 unlink($photo);
			 $del =mysqli_query($conn,"DELETE FROM users WHERE email='$email'");
			 echo "<script>alert('Member deleted successfuly!!');location.href='members.php?pg=mb'</script>";
		 }
		 
	 }
	 
?>
Welcome to Members page
    <br><br>
	<?php
	    if($_SESSION["TYPE_ID"]==1)
		{
	  ?>
	<strong><a href="add_member.php?pg=mem">Add Member</a></strong>
	<?php
		}
 ?>
     <table width="80%" border="1" cellpadding="1" cellspacing="0">
	  <tr>
	     <th>S/N</th><th>Name</th><th>Date of Birth</th><th>Gender</th><th>Address</th><th>Email</th><th>Mobile No.</th><th>Username</th><th>Date Registered</th>
	     <th>Profile Pic</th><th>Action</th>
	 </tr>
	 <?php
	    $query = mysqli_query($conn,"SELECT * FROM members");
		$i=1;
		while($row = mysqli_fetch_array($query))
		{
			?>
			 <tr>
	     <td><?php echo $i?></td><td><?php echo $row["name"];?></td>
		 <td><?php echo $row["dob"];?></td>
		 <td><?php echo $row["gender"];?></td>
		 <td><?php echo $row["address"];?></td>
		 <td><?php echo $row["email"];?></td>
		 <td><?php echo $row["mobile_no"];?></td>
		 <td><?php echo $row["username"];?></td>
		 <td><?php echo $row["date_entered"];?></td>
		<td><img width="50px" src="<?php echo $row["profile_pic"];?>"></td>
		 <td><a href="?id=<?php echo $row["id"];?>">Delete</a> | 
		 <?php
	         if($_SESSION["EMAIL"]==$row["email"] or $_SESSION["TYPE_ID"]==1)
		      {
	       ?>
	  <a href="edit_member.php?pg=edit&id=<?php echo $row["id"];?>">Edit</a>
	  		 | 
			 <?php
			  
			    if($_SESSION["TYPE_ID"]==1)
				{
			 ?>
			  <a onclick="javascript:return confirm('Are you sure you want to delete Memmber?');" href="?pg=mb&id=<?php echo $row["id"];?>">Delete</a><?php } ?><?php } ?></td>
	         </tr>
		<?php
		$i++;
		}
	    ?>
	 </table>

<?php
include "includes/footer.php"
?>