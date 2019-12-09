<?php 
include 'koneksi.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- My fonts -->
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

	<!-- my CSS -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Daftar pelanggan</h3>
					</div>

					<div class="card-body">
						<form method="post" class="form">
							<div class="form-group">
								<label class="control-label">Nama Pelanggan</label>
								<div class="col-md-10">
								<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Username</label>
								<div class="col-md-10">
								<input type="text" class="form-control" name="username" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
								<div class="col-md-10">
								<input type="password" class="form-control" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Alamat</label>
								<div class="col-md-10">
								<textarea class="form-control" name="alamat" required></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">No Hp</label>
								<div class="col-md-10">
								<input type="text" class="form-control" name="telepon" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10">
								<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
				<?php 
					// jika tombol daftar di pencet
				if (isset($_POST['daftar'])) 
				{
					// mengambil data diatas
					$nama = htmlspecialchars($_POST[nama]);
					$username = htmlspecialchars($_POST[username]);
					$password = htmlspecialchars($_POST[password]);
					$alamat = htmlspecialchars($_POST[alamat]);
					$telepon = htmlspecialchars($_POST[telepon]);

					// cek apakah email sudah digunakan
					$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username_pelanggan='$username' ");
					$yangcocok = $ambil->num_rows;

					if ($yangcocok==1) 
					{
						echo "<script>alert('Pendaftaran gagal Username Sudah  dipakai'); </script>";
		  				echo "<script>location='daftar.php'; </script>";
					}
					else
					{
						// insert ke table pelanggan
						$koneksi->query("INSERT INTO pelanggan (username_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$username', '$password', '$nama', '$telepon', '$alamat') ");

						echo "<script>alert('Pendaftaran Sukses Silahkan Login'); </script>";
		  				echo "<script>location='login.php'; </script>";
					}
				}
				 ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>