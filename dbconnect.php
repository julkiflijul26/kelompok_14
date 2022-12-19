<?php
$host = "sql307.epizy.com";
$user = "epiz_33185680";
$password = "zNO6OfirkQGHa";
$dbname = "epiz_33185680_perpus";
$conn = mysqli_connect($host, $user, $password, $dbname);

if(!$conn){
	die("error in connection");
}
?>