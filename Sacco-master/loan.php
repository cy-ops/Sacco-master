<?php
include "includes/header.php";



?>
<marquee><h1>Request Loan</h1></marquee>
<br><br>
<form action="loan.php?pg=ln" method="post" enctype="multipart/form-data">
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
		  <td>Current Loan</td>
		  <td><input type="text" name="c_ln" required></td>
		</tr>
		<tr>
		  <td>Loan Required:</td>
		  <td><input type="text" name="ln_rq" required</td>
		</tr>
		<tr>
		  <td>Previous Loan Bal:</td>
		  <td><input type="text" name="pr_ln" required></td>
		</tr>
		<tr>
		  <td>Loan Repayment:</td>
		  <td><input type="text" name="ln_re" required></td>
		</tr>
		<tr>
		  <td>Loan Date:</td>
		  <td><input type="date" name="date" required></td>
		</tr>
		<tr>
		  <td colspan="2"><input type="submit" name="sub" value="Request Loan"></td>
		</tr>
	  </table>
	</form>
<?php
include "includes/footer.php"
?>