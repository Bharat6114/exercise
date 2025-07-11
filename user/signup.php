<?php
include 'connect.php';
$error=array();
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$role=$_POST['role'];
$hpassword = password_hash($password,PASSWORD_DEFAULT);
if(empty($name) or empty($email) or empty($password) or empty($role))
{
array_push($error,"all fields are required");
}
else if(!preg_match("/^[a-zA-Z]*$/",$name))
{
array_push($error,"name only contain alphabet");
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
array_push($error,"please enter valid email");
}
else if(strlen($phone)!=10)
{
array_push($error,"phone contain only 10 digits");
}
else if(!preg_match("/^[0-9]*$/",$phone))
{
array_push($error,"phone only contain digits");
}
else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/",$password))
{
array_push($error,"please enter valid password");
}

else{
$sql ="insert into `profile` (name,email,phone,password,role) values('$name','$email','$phone','$hpassword','$role')";
$result = mysqli_query($con,$sql);
if($result)
{
header('location:index.php');
}
else{
die(mysqli_error($con));
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
<legend>signup form</legend>
<label>name</label>
<input type="text" name="name"><br>
<label>email</label>
<input type="text" name="email"><br>
<label>password</label>
<input type="text" name="password"><br>
<label>phone</label>
<input type="text" name="phone"><br>
<label>role</label>
<input type="text" name="role"><br>
<button type="submit" name="submit">submit</button>
</fieldset>
</form>
</div>

</body>
</html>

