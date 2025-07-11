<?php
include 'connect.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$dname=$_POST['dname'];
$position=$_POST['position'];

$sql = "insert into `user` (name,email,phone,address) values ('$name','$email','$phone','$address')";
$result=mysqli_query($con,$sql);
if($result){
	$sql1= "select * from `user` where email='$email'"; 
	$result1=mysqli_query($con,$sql1);
	if($result1)
	{
	$row = mysqli_fetch_assoc($result1);
    $uid =$row['userid'];
	$sql2="insert into `department` (dname,position,uid) values('$dname','$position','$uid')";
	$result2=mysqli_query($con,$sql2);
	if($result2)
	{
		header('location:index.php');
	}
	else{
		mysqli_error($con);
		}
	}
	
}
else{
	mysqli_error($con);
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
<legend>create form</legend>
<label>name</label>
<input type="text" name="name"><br>
<label>email</label>
<input type="text" name="email"><br>
<label>phone</label>
<input type="text" name="phone"><br>
<label>address</label>
<input type="text" name="address"><br>
<label>department</label>
<input type="text" name="dname"><br>
<label>position</label>
<input type="text" name="position"><br>
<button type="submit" name="submit">submit</button>

</fieldset>
</form>

</div>
</body>
</html>