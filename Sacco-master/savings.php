<?php
include "includes/header.php";

 if(isset($_POST["sub"]))
	  {
		  $membersname=$_POST["ty_id"];
		  $shares=$_POST["sh_con"];
		  $tcon=$_POST["tt_sh"];
		  $datec=$_POST["datec"];
		  
$query = mysqli_query($conn,"INSERT INTO savings VALUES(0,'$membersname','$shares','$tcon','$datec')")or mysqli_error("Error in query!!");
				  
				  if($query)
				  {			  				  
					  echo "<script>alert('Memeber shares saved successful!!');location.href='savings.php?pg=sv';</script>";
				  }
		  
	  }
?>
<marquee><h1>Shares Contribution</h1></marquee>
<form action="savings.php?pg=sv" method="post" enctype="multipart/form-data">
	  <table width="80%" border="0" cellspacing="0">
	    <tr>
		  <td>Member's Name:</td>
		  <td><select required name="ty_id">
		      <option value="">...Select Member...</option>
			  <?php
			  $query = mysqli_query($conn,"select * from members") 
					or mysqli_error ("Error in query!!");
					
					while($row = mysqli_fetch_array($query))
					{
						echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
					}
					?>
		  </select>
		  </td>
		</tr>
		<tr>
		  <td>Shares Contributed</td>
		  <td><input type="text" name="sh_con" required></td>
		</tr>
		<tr>
		  <td>Total Shares:</td>
		  <td><input type="text" name="tt_sh" required</td>
		</tr>
		<tr>
		  <td>Date contributed:</td>
		  <td><input type="date" name="datec" required></td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="sub" value="Save shares"></td>
		</tr>
	  </table>
	</form>
<?php
include "includes/footer.php"
?>