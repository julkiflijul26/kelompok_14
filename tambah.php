<?php

include('dbconnect.php');

$judul = $_POST['judul_bk'];
$penerbit = $_POST['terbit_bk'];
$genre = $_POST['genre_bk'];
$harga = $_POST['harga_bk'];
$stok = $_POST['stok_bk'];

$query =  "INSERT INTO buku(judul_buku , penerbit_buku , genre_buku , harga_buku , stok_buku) VALUES('$judul' , '$penerbit' , '$genre' , '$harga' , '$stok')";

if (mysqli_query($conn , $query)) {
	header("location:index.php");
}

?>
