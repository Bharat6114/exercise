<?php
include 'connect.php';
$id=$_GET['deleteid'];
if(isset($_GET['deleteid']))
{
$sql = "delete from `user` where userid=$id";
$result = mysqli_query($con,$sql);
if($result)
{
	header('location:index.php');
}
else{
	mysqli_error($con);
}
}
?>