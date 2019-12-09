
<?php 
session_start();
include 'koneksi.php';

// jika tidak ada session pelanggan
if (empty($_SESSION["pelanggan"]) OR !isset($_SESSION['pelanggan'])) 
  {
    echo "<script>alert('Silahkan Login'); </script>";
    echo "<script>location='login.php'; </script>";
    exit();
  }

	// echo "<pre>";
	// print_r($_SESSION['pelanggan']);
	// echo "</pre>";
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

   <section class="riwayat">
   	<div class="container">
   		<hr>
   		<h4 class="text-center">Riwayat Pembelian <?= $_SESSION['pelanggan']['nama_pelanggan']; ?></h4>
   		<hr>
      <div class="table-responsive">
   		<table class="table table-bordered">
   			<thead>
   				<tr>
   					<th>No</th>
   					<th>Tanggal</th>
   					<th>Status</th>
   					<th>Total</th>
   					<th>Opsi</th>
   				</tr>
   			</thead>
   			<tbody>
   				 <?php 
   				 $no = 1;
   				 // mengambil id dari session yang login
   				 $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];

   				 $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
   				 while ($pecah = $ambil->fetch_assoc()) {
   				  ?>
   				<tr>
   					<td><?= $no; ?></td>
   					<td><?= $pecah['tanggal_pembelian']; ?></td>
   					<td>
              <?= $pecah['status_pembelian']; ?>
              <br>
                  <?php if (!empty($pecah['resi_pengiriman'])): ?>
                    Resi : <?= $pecah['resi_pengiriman']; ?>
                  <?php endif ?>    
            </td>
   					<td>Rp <?= number_format($pecah['total_pembelian']); ?></td>
   					<td>
   						<a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="badge badge-info">Nota</a>
              <?php if ($pecah['status_pembelian']=='pending') : ?>
                <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="badge badge-success">Konfirmasi Pembayaran</a>
              <?php else: ?>
                <a href="lihat_pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="badge badge-warning">Lihat Pembayaran</a>
              <?php endif ?>
   						
   					</td>
   				</tr>
   				<?php $no++; ?>
   				<?php }; ?>
   			</tbody>
   		</table>
      </div>
			


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