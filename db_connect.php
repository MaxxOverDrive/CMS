<?php

$db_host = "";
$db_username = "";
$db_pass = "";
$db_name = "";

$conn = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name");

if(!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}
?>
