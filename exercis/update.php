<?php
include 'connect.php';
$uid=$_GET['uid'];
$did=$_GET['did'];
if(isset($_GET['uid'])&& isset($_GET['did']))
{
$uid=$_GET['uid'];
$did=$_GET['did'];
$sql= "select * from `user` join `department` on user.userid=department.uid where user.userid=$uid and department.did= $did"; 
$result = mysqli_query($con,$sql);
if($result)
{
while($row=mysqli_fetch_assoc($result))
{
$id=$row['userid'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$address=$row['address'];
$dname=$row['dname'];
$did=$row['did'];
$position=$row['position'];
}
}
}
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$dname=$_POST['dname'];
$position=$_POST['position'];

$sql1 = "update `user` set name='$name', email='$email', phone='$phone', address='$address' where userid=$uid";
$result1=mysqli_query($con,$sql1);
if($result1){
	$sql2="update `department` set dname='$dname',position='$position',uid=$uid where did=$did";
	$result2=mysqli_query($con,$sql2);
	if($result2)
	{
		header('location:index.php');
	}
	else{
		mysql_error($con);
	}
}
else{
	echo "data not insrted in table 1";
}
}


?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<form method="POST">
<fieldset>
<legend>update form</legend>
<label>name</label>
<input type="text" name="name" value=<?php echo $name;?> ><br>
<label>email</label>
<input type="text" name="email" value=<?php echo $email;?> ><br>
<label>phone</label>
<input type="text" name="phone" value=<?php echo $phone;?> ><br>
<label>address</label>
<input type="text" name="address" value=<?php echo $address;?> ><br>
<label>department</label>
<input type="text" name="dname" value=<?php echo $dname;?> ><br>
<label>position</label>
<input type="text" name="position" value=<?php echo $position;?> ><br>
<button type="submit" name="submit">submit</button>

</fieldset>
</form>

</div>
</body>
</html>