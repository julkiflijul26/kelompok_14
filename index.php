<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

?>
<?php 
	include('dbconnect.php');
	include('functions.php');
	include ('harga.php');

	$query = "SELECT * FROM buku";

	$result = mysqli_query($conn , $query);
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ini perpus</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand" href="#table">
    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    ini perpus
  </a>
</nav>
	<center>
	<div class="container">
	<div id="tambah" class="card-header" style="width: 50rem;">
  <div class="card-body text-center">
    <h1 class="card-title">tambah buku</h1>
				<form role="form" action="tambah.php" method="post">
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul_bk" class="form-control">
					</div>
					<div class="form-group">
						<label>Penerbit</label>
						<input type="text" name="terbit_bk" class="form-control">
					</div>
					<div class="form-group">
						<label>genre</label>
						<input type="text" name="genre_bk" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga_bk" class="form-control">
					</div>
					<div class="form-group">
					<label for="inputState">stok</label>
					<select id="inputState" name="stok_bk" class="form-control" required>
						<option value="" selected>Pilih...</option>
						<option value="tersedia">tersedia</option>
						<option value="kosong">kosong</option>
					</select>
				</div>
					<button type="submit" class="btn btn-info btn-block">Tambah Buku</button>					
				</form>
  </div>
</div>
	</div>
	</center>
	<br>
			<div id="table" class="col-sm-12">
				<h3>Daftar Buku</h3>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul Buku</th>
							<th>Penerbit Buku</th>
							<th>Jenis Buku</th>
							<th>Harga Buku</th>
							<th>Stok Buku</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody> 
						
						<?php
							$no = 1;  
							while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['judul_buku']; ?></td>
							<td><?php echo $row['penerbit_buku']; ?></td>
							<td><?php echo $row['genre_buku']; ?></td>
							<td><?php echo rupiah ($row['harga_buku']); ?></td>
							<td><?php echo $row['stok_buku']; ?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['id_buku'];?>" class="btn btn-success" role="button">Edit</a>
								<a href="delete.php?id=<?php echo $row['id_buku']?>" class="btn btn-danger" role="button">Delete</a>
							</td>
						</tr>

						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<div class="card-body text-center">
				<form role="form" action="logout.php" method="post">
					<button type="submit" class="btn btn-danger btn-block">logout</button>					
				</form>
  </div>

		</div>
		
	</div>
</body>
</html> 
