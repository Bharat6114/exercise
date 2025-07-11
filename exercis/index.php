<?php
include 'connect.php';
?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
<div class="link"><a href="create.php">create</a>
</div>
<table border="1">
<thead>
<tr>
<th>id</th>
<th>name</th>
<th>email</th>
<th>phone</th>

<th>address</th>
<th>department name</th>
<th>position</th>
<th>operation</th>
</tr>
</thead>
<tbody>
<?php
$sql= "select * from `user` join `department` on user.userid=department.uid"; 
$result = mysqli_query($con,$sql);
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
echo '<tr>
<td>'.$id.'</td>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$phone.'</td>
<td>'.$address.'</td>
<td>'.$dname.'</td>
<td>'.$position.'</td>
<td>
<button><a href="delete.php?deleteid='.$id.'">delete</a></button>
<button><a href="update.php?uid='.$id.'&did='.$did.'">update</a></button>
</td>
</tr>';
}
?>
</tbody>
</table>

</div>
</body>
</html>