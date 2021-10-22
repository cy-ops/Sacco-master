<html>
<head>
</head>
<body>
<h1>My FirstPHP  File</h1>
<form action="index.php" method="post">
Input 1: <input type="text" name ="inp1"required><br>
Input 2: <input type="text" name ="inp2" placeholder= "type first input" required><br>
Email:<input type="email" name="em"placeholder="emily.kwatemba@gmail.com"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
<input type="submit" name="exc" value="run"><br>
</form>
<?php
if(isset($_POST["exc"]))
{
$input1=$_POST["inp1"];
$input2=$_POST["inp2"];
if($input1<$input2)
{
	
	echo"<script>alert('i won the game.');</script>";
}
	else
	{
		echo "<script>
		alert('I lost the game. Go and sleep!!!!');
		</script>";
		
}
}
echo"<b>Emmy</b>";
$name="EMILY ACHIENG";
$age= 21;
echo "she is called $name. she's $age years old.<br>";
$x=20;
$y= 89;

$z=$x+$y;
echo "Addition:".$z."<br>";
$z=$y-$x;
echo"subtraction:".$z."<br>";
$z=$y*$x;
echo"multiplication:".$z."<br>";
$a=4;
$b=5;
echo date("d-m-y");
$d= date ("D");

if($a<$b)
{
echo " i won jackpot!!";
}
else
{
	echo "i lost!!";
}	
if($d =="Fri")
{
	echo "have a nice day!!";
}
echo "</br>";

$i=1;
while($i<5){
	echo "$i"."<br>";
	$i++;
}
for($i=1; $i<5;$i++)
	{
		echo $i."<br>";
	}
/*me*/
?>
</body>
</html>

