<?php 
session_start();

 //    echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";

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
			<div class="col-md-4">
				<div class="card panel-info responsive">
					<div class="card-header">
						<h3 class="card-title">Login pelanggan</h3>
					</div>

					<div class="card-header">
						<form method="post">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<button class="btn btn-primary" name="login">Login</button>
							<a href="daftar.php" class="btn btn-success">Daftar</a>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
	// jika tombol simpan ditekan
	if (isset($_POST["login"])) 
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		// lakukan query cek ke database pelanggan
		$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE username_pelanggan = '$username' AND password_pelanggan = '$password'");
		// ngitung akun yang terambil
		$akunyangcocok = $ambil->num_rows;

		// jika 1 akun cocok maka diloginkan
		if ($akunyangcocok==1) 
		{
			// sukses login
			// mendapatkan akundalam bentuk array
			$akun = $ambil->fetch_assoc();
			// simpan di session pelanggan
			$_SESSION["pelanggan"] = $akun;
			echo "<script>alert('Anda Sukses Login'); </script>";

			// jk sudah belanja
			if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) 
			{
				echo "<script>location='checkout.php'; </script>";
			}
			else
			{
				echo "<script>location='riwayat.php'; </script>";
			}
  			
		}
		else
		{
			// gagal login
			echo "<script>alert('Anda Gagal Login Periksa username & password Anda'); </script>";
  			echo "<script>location='login.php'; </script>";
		}
	}
	 ?>
</body>
</html>