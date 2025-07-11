<?php
include 'connect.php';
session_start();
$error=array();
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if(empty($email) or empty($password) or empty($cpassword))
{
array_push($error,"all fields are required");
}
else{
if($password=$cpassword){
$sql ="select * from `profile` where email='$email'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
$row=mysqli_fetch_assoc($result);
$hpass=$row['password'];
$verify= password_verify($password,$hpass);
if($verify)
{
$role=$row['role'];
if($role=="admin")
{
	header('location:admin.php');
}
else{
	header('location:user.php');
	}
	
}
else{
 array_push($error,'please check your password');
}
}
else{
	array_push($error,'password does not match');
}
}
}
}
?>

<html>
<head>
</head>
<body>
<div class="container">
<?php
if(count($error)>0){
foreach ($error as $error){
	echo "<div class='error'>$error</div>";
}
}
?>
<form method="POST">
<fieldset>
<legend>login form</legend>
<label>email</label>
<input type="text" name="email"><br>
<label>password</label>
<input type="text" name="password"><br>
<label>conform password</label>
<input type="text" name="cpassword"><br>
<button type="submit" name="submit">login</button>
</fieldset>
</form>
</div>

</body>
</html>

