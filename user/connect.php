<?php
$databasename="user";
$username="root";
$password="";
$servername="localhost";
$con = new mysqli($servername,$username,$password,$databasename);
if(!$con){
	die(mysqli_error($con));
}

?>