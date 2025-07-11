<?php
include 'connect.php';
?>
<div class="links">
<button><a href="login.php">login</a></button>
<button><a href="signup.php">create</a></button>

</div>

<div class="container">
<table border="1" style="border-collapse:collapse">
<thead>
<tr>
<th>id</th>
<th>name</th>
<th>email</th>
<th>phone</th>
<th>role</th>
</tr>
</thead>
<tbody>
<?php
$sql="select * from `profile`";
$result=mysqli_query($con,$sql);
if($result)
{
while($row=mysqli_fetch_assoc($result))
{
$id = $row['id'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$role=$row['role'];
echo '<tr>
<td>'.$id.'</td>
<td>'.$name.'</td>
<td>'.$email.'</td>
<td>'.$phone.'</td>
<td>'.$role.'</td>
</tr>';
}
}
?>
</tbody>
</table>
</div>