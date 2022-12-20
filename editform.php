<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

?>
<?php 
$id = $_GET['id']; 

include('dbconnect.php');

$query = "SELECT * FROM buku WHERE id_buku='$id'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Toko Buku</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand" href="index.php">
    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    ini perpus
  </a>
</nav>

<center>
	<div class="container">
	<div id="tambah" class="card-header" style="width: 50rem;">
  <div class="card-body text-center">

	<h3>Update Data Buku</h3>
	<form role="form" action="edit.php" method="get">

		<?php
		while ($row = mysqli_fetch_assoc($result)) {
		 	
		?>

		<input type="hidden" name="id_bk" value="<?php echo $row['id_buku']; ?>">

		<div class="form-group">
			<label>Judul Buku</label>
			<input type="text" name="judul_bk" class="form-control" value="<?php echo $row['judul_buku']; ?>">			
		</div>

		<div class="form-group">
			<label>Penerbit Buku</label>
			<input type="text" name="terbit_bk" class="form-control" value="<?php echo $row['penerbit_buku']; ?>">			
		</div>

		<div class="form-group">
			<label>Genre Buku</label>
			<input type="text" name="genre_bk" class="form-control" value="<?php echo $row['genre_buku']; ?>">			
		</div>

		<div class="form-group">
			<label>Harga Buku</label>
			<input type="text" name="harga_bk" class="form-control" value="<?php echo $row['harga_buku']; ?>">			
		</div>

		<div class="form-group">
		      <label for="inputState">Stok buku</label>
		      <select id="inputState" name="stok_bk" class="form-control" required>
		        <option value="" selected>Pilih...</option>

		        <option value="tersedia" <?php echo $row['stok_buku'] == 'tersedia' ? 'selected="selected"' : '';?>>
		        	tersedia
		        </option>

		        <option value="kosong" <?php echo $row['stok_buku'] == 'kosong' ? 'selected="selected"' : '';?>>
		        	kosong
		        </option>

		      </select>
		    </div>
		<button type="submit" class="btn btn-success btn-block">Update Buku</button>

		<?php 
		}
		?>
	</form>
	</div>
	</div>
	</div>
</div>
</body>
</html> 
