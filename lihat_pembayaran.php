<?php 
session_start();
include 'koneksi.php';

  // ambil id
  $id_pembelian = $_GET['id'];

  $ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian' ");
  $detbay = $ambil->fetch_assoc();

  // echo "<pre>";
  // print_r($detbay);
  // echo "</pre>";

// jk belum ada data pembayaran
if (empty($detbay)) 
{
    echo "<script>alert('Anda Tidak Berhak'); </script>";
    echo "<script>location='riwayat.php'; </script>";
    exit();
}

  // echo "<pre>";
  // print_r($_SESSION);
  // echo "</pre>";

// jika data pelanggan yg bayar tidak sesuai dengan yg login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay['id_pelanggan']) 
{
    echo "<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang lain'); </script>";
    echo "<script>location='riwayat.php'; </script>";
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

 

   <div class="container">
    <hr>
     <h4>Lihat Pembayaran</h4>
     <div class="row">
       <div class="col-md-6">
         <table class="table">
             <tr>
               <th>Nama</th>
               <td><?= $detbay['nama']; ?></td>
             </tr>
             <tr>
               <th>Bank</th>
               <td><?= $detbay['bank']; ?></td>
             </tr>
             <tr>
               <th>Tanggal</th>
               <td><?= $detbay['tanggal']; ?></td>
             </tr>
             <tr>
               <th>Jumlah</th>
               <td>Rp <?= number_format($detbay['jumlah']); ?></td>
             </tr>
         </table>
       </div>
       <div class="col-md-6">
         <img src="bukti_pembayaran/<?= $detbay['bukti']; ?>" class="img-responsive" width="300">
       </div>
     </div>

     <a href="riwayat.php" class="btn btn-primary">Riwayat Belanja</a>
     
   </div>



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