<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "iDiscuss";

$conn = mysqli_connect("localhost","root","","iDiscuss");
if (!$conn) {
 	die("Not connect".mysqli_connect_error());
 } 
 ?>