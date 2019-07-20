<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "arkademy";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass,$db_name);
	$id=$_GET['id'];
	mysqli_query($koneksi,"delete from Nama where id='$id'");
	header('location:index.php');
 
?>