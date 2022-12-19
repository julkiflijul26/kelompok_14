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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
		integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<style>
		html {
			height: 100%;
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
		<a class="navbar-brand" href="index.php">
			<img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			Perpustakaan
		</a>
	</nav>

	<center>
		<div class="container">
			<div id="tambah" class="card-header" style="width: 50rem;">
				<div class="card-body text-center">

					<h1 class="card-title">Update Data Buku</h1>
					<form role="form" action="edit.php" method="get">

						<?php
		while ($row = mysqli_fetch_assoc($result)) {
		 	
		?>

						<input type="hidden" name="id_bk" value="<?php echo $row['id_buku']; ?>">

						<div class="form-group">
							<label style="color: #fff;">Judul Buku</label>
							<input type="text" name="judul_bk" class="form-control"
								value="<?php echo $row['judul_buku']; ?>">
						</div>

						<div class="form-group">
							<label style="color: #fff;">Penerbit Buku</label>
							<input type="text" name="terbit_bk" class="form-control"
								value="<?php echo $row['penerbit_buku']; ?>">
						</div>

						<div class="form-group">
							<label style="color: #fff;">Genre Buku</label>
							<input type="text" name="genre_bk" class="form-control"
								value="<?php echo $row['genre_buku']; ?>">
						</div>

						<div class="form-group">
							<label style="color: #fff;">Harga Buku</label>
							<input type="text" name="harga_bk" class="form-control"
								value="<?php echo $row['harga_buku']; ?>">
						</div>

						<div class="form-group">
							<label style="color: #fff;" for="inputState">Stok buku</label>
							<select id="inputState" name="stok_bk" class="form-control" required>
								<option value="" selected>Pilih...</option>

								<option value="tersedia"
									<?php echo $row['stok_buku'] == 'tersedia' ? 'selected="selected"' : '';?>>
									Tersedia
								</option>

								<option value="kosong"
									<?php echo $row['stok_buku'] == 'kosong' ? 'selected="selected"' : '';?>>
									Kosong
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
