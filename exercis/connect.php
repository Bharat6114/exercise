<?php
$servername="localhost";
$username ="root";
$password = "";
$databasename ="exercise";
$con = new mysqli($servername,$username,$password,$databasename);
if(!$con){
	mysqli_error($con);
}