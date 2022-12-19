<?php 
	include('dbconnect.php');
	include ('harga.php');

	$query = "SELECT * FROM buku";

	$result = mysqli_query($conn , $query);
	?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>INI PERPUS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
		integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<style>
		html {
			height: auto;
		}
		body {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: linear-gradient(#141e30, #243b55);
		}

		h1 {
			padding: 10px 20px;
			background-color: #111b28;
			color: #24B4C1;
			font-size: 20px;
			text-decoration: none;
			text-transform: uppercase;
			margin-top: -25px;
			letter-spacing: 1px;
			border-radius: 10px;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-light" style="background-color: #03e9f4;">
		<a class="navbar-brand" href="#table">
			<img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			Perpustakaan
		</a>
	</nav>
	<center>
		<div class="container">
			<div id="tambah" class="card-header" style="width: 50rem;">
				<div class="card-body text-center">
					<h1 class="card-title">Tambah buku</h1>
					<form role="form" action="tambah.php" method="post">
						<div class="form-group">
							<label style="color: #fff;">Judul</label>
							<input type="text" name="judul_bk" class="form-control">
						</div>
						<div class="form-group">
							<label style="color: #fff;">Penerbit</label>
							<input type="text" name="terbit_bk" class="form-control">
						</div>
						<div class="form-group">
							<label style="color: #fff;">Genre</label>
							<input type="text" name="genre_bk" class="form-control">
						</div>
						<div class="form-group">
							<label style="color: #fff;">Harga</label>
							<input type="text" name="harga_bk" class="form-control">
						</div>
						<div class="form-group">
							<label style="color: #fff;" for="inputState">Stok</label>
							<select id="inputState" name="stok_bk" class="form-control" required>
								<option value="" selected>Pilih...</option>
								<option value="tersedia">Tersedia</option>
								<option value="kosong">Kosong</option>
							</select>
						</div>
						<button type="submit" class="btn btn-info btn-block">Tambah Buku</button>
					</form>
				</div>
			</div>
		</div>
	</center>
	<br>
	<div id="table" class="col-sm-12" style="color: #fff;">
		<h3>Daftar Buku</h3>
		<table class="table table-striped table-hover">
			<thead>
				<tr style="color: #fff;">
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
				<tr style="color: #fff;">
					<td><?php echo $no++; ?></td>
					<td><?php echo $row['judul_buku']; ?></td>
					<td><?php echo $row['penerbit_buku']; ?></td>
					<td><?php echo $row['genre_buku']; ?></td>
					<td><?php echo rupiah ($row['harga_buku']); ?></td>
					<td><?php echo $row['stok_buku']; ?></td>
					<td>
						<a href="editform.php?id=<?php echo $row['id_buku'];?>" class="btn btn-success"
							role="button">Edit</a>
						<a href="delete.php?id=<?php echo $row['id_buku']?>" class="btn btn-danger"
							role="button">Delete</a>
					</td>
				</tr>

				<?php
							}
						?>
			</tbody>
		</table>
	</div>

	</div>

	</div>
</body>

</html>