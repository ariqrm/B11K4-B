<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "arkademy";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass,$db_name);
	$id=$_GET['id'];
 
	$name=$_POST['name'];
	$work=$_POST['work'];
	$salary=$_POST['salary'];
 
	mysqli_query($koneksi,"update Nama set name='$name', id_work='$work', id_salary='$salary' where id='$id'");
	header('location:index.php');
 
?>