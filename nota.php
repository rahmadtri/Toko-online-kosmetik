
<?php 
session_start();
include 'koneksi.php';

if (empty($_SESSION["pelanggan"]) OR !isset($_SESSION['pelanggan'])) 
  {
    echo "<script>alert('Silahkan Login'); </script>";
    echo "<script>location='login.php'; </script>";
    exit();
  }
?>

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<!-- My fonts -->
<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

<!-- my CSS -->
<link rel="stylesheet" href="css/style.css">


    <title>KosmetikKlatenMurah</title>
  </head>
  <body>
   <!-- header -->
   <?php include "header.php"; ?>

   <section class="konten">
   	<div class="container">
   		<hr>
   		<h4 class="text-center">Detail Pembelian</h4>
   		<hr>
			<?php 
			$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			 ?>
			 
			 <!--  <pre><?php  print_r($detail); ?></pre>  -->

			<!-- jika pelanggan yang beli tidak sama dengan pelanggan login maka dilarikan ke riwayat.php -->
			<!-- pelanggan beli harus pelanggan login -->
			<?php 
			// mendapatkan id pelanggan beli
			$id_pelangganbeli = $detail['id_pelanggan'];

			// mendapatkan id pelanggan login dari session
			$id_pelangganlogin = $_SESSION['pelanggan']['id_pelanggan'];

			if ($id_pelangganbeli!==$id_pelangganlogin) 
			{
			echo "<script>alert('nggak usah neko-neko'); </script>";
  			echo "<script>location='riwayat.php'; </script>";
  			exit();
			}
			 ?>

			 
			 <div class="row text-center">
			 	<div class="col-md-4">
			 		<h5>Pembelian</h5>
			 		<strong>No Pembelian : <?= $detail['id_pembelian']; ?></strong> <br>
			 		Tanggal : <?= $detail['tanggal_pembelian']; ?> <br>
			 		<strong>Total : Rp <?= number_format($detail['total_pembelian']); ?></strong> 
			 	</div>

			 	<div class="col-md-4">
			 		<h5>Pelanggan</h5>
			 		<strong><?= $detail['nama_pelanggan']; ?></strong> <br>
						 <p>
						     <?= $detail['telepon_pelanggan']; ?> <br>
						     <?= $detail['username_pelanggan']; ?>
						 </p>
			 	</div>

			 	<div class="col-md-4">
			 		<h5>Pengiriman</h5>
			 		<strong><?= $detail['nama_kota']; ?></strong> <br>
			 		Ongkos Kirim : Rp <?= number_format($detail['tarif']); ?> <br>
			 		Alamat : <?= $detail['alamat_pengiriman']; ?>
			 	</div>
			 </div>

		   <div class="table-responsive">
			 <table class="table table-bordered text-center">
			  <thead>
			    <tr>
			      <th>No</th>
			      <th>Nama Produk</th>
			      <th>Harga</th>
			      <th>Berat</th>
			      <th>Jumlah</th>
			      <th>Subberat</th>
			      <th>Subtotal</th>
			    </tr>
			  </thead>

			   <tbody>
			    <?php $nomor=1; ?>
			    <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
			    <?php while($pecah = $ambil->fetch_assoc()) { ?>
			    <tr>
			      <td><?= $nomor; ?></td>
			      <td><?= $pecah['nama']; ?></td>
			      <td>Rp <?= number_format($pecah['harga']); ?></td>
			      <td><?= $pecah['berat']; ?> Gr</td>
			      <td><?= $pecah['jumlah']; ?> Pcs</td>
			      <td><?= $pecah['subberat']; ?> Gr</td>
			      <td>Rp <?= number_format($pecah['subharga']); ?></td>
			    </tr>
			    <?php $nomor++; ?>
			  <?php } ?>
			  </tbody>
				 <tfoot>
				    <tr>
				      <th colspan="6">TOTAL BELANJA</th>
				      <th>Rp <?= number_format($detail['total_belanja']); ?></th>
				    </tr>
				    <tr>
				      <th colspan="6">BIAYA KIRIM</th>
				      <th>Rp <?= number_format($detail['tarif']); ?></th>
				    </tr>
				    <tr>
				      <th colspan="6">TOTAL</th>
				      <th>Rp <?= number_format($detail['total_pembelian']); ?></th>
				    </tr>
				  </tfoot>

			  </table>
			</div>

			  <div class="row justify-content-center">
			  	<div class="col-md-7">
			  		<div class="alert alert-info text-center">
			  			<p>
			  				Silahkan Melakukan Pembayaran Rp <?= number_format($detail['total_pembelian']); ?> ke
			  				<br>
			 <?php 
			$ambil = $koneksi->query("SELECT * FROM bank");
			$pecah = $ambil->fetch_assoc();
			 ?>

			 <strong>Bank <?= $pecah['nama_bank']; ?> <?= $pecah['no_rek']; ?> AN. <?= $pecah['nasabah']; ?>  </strong>

		

			  			</p>
			  		</div>
			  	</div>
			  </div>

			  <a href="riwayat.php" class="btn btn-primary">Riwayat Belanja</a>
   	</div>
   </section>


   <!-- Footer -->
   <?php include "footer.php"; ?>
   <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>