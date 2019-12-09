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


  // ambil id
  $idpem = $_GET['id'];
  $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
  $detpem = $ambil->fetch_assoc();

	// echo "<pre>";
	// print_r($detpem);
	// echo "</pre>";

  // mendapatkan id pelanggan beli
  $id_pelanggan_beli = $detpem['id_pelanggan'];
  // mendapatkan id pelanggan login
  $id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

  if ($id_pelanggan_login !== $id_pelanggan_beli) 
  {
    echo "<script>alert('Rasah Neko-Neko'); </script>";
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
     <h4>Konfirmasi Pembayaran</h4>
     <p>Kirim Bukti Pembayaran Anda Disini</p>
     <div class="alert alert-info">Total Tagihan Anda <strong>Rp <?= number_format($detpem['total_pembelian']); ?> </strong></div>

     <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama Penyetor</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Bank</label>
          <input type="text" name="bank" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>
        <div class="form-group">
          <label>Foto Bukti</label>
          <input type="file" name="bukti" class="form-control">
          <p class="text-danger">Foto Bukti Harus JPG Ukuran max 2MB</p>
        </div>
        <button class="btn btn-primary" name="kirim">Kirim</button>
     </form>
     <?php 
     // jika tombol button post kirim dipencet maka lakukan
     if (isset($_POST['kirim'])) 
     {
       // uploud dulu foto bukti
      $nama_bukti = $_FILES['bukti']['name'];
      $lokasi_bukti = $_FILES['bukti']['tmp_name'];
      $error = $_FILES['bukti']['error'];

              // eror jika belum memilih uploud gambar
                if ( $error === 4) {
                echo " <script>
                      alert('pilih gambar telebih dahulu!')
                  </script>";
                return false;
              }

              // proses validasi uploud harus jpg, jpeg, png
              $ekstensiGambarValid = ['jpg', 'jpeg'];
              $ekstensiGambar = explode('.', $nama_bukti);
              $ekstensiGambar = strtolower(end($ekstensiGambar));

              if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo " <script>
                      alert('yang anda uploud bukan gambar!')
                  </script>";
                return false;
              }


      // nama berdasarkan waktu agar tidak ke double
      $namafix = date("YmdHis").$nama_bukti;

      move_uploaded_file($lokasi_bukti, "bukti_pembayaran/$namafix");

      $nama = htmlspecialchars($_POST[nama]);
      $bank = htmlspecialchars($_POST[bank]);
      $jumlah = htmlspecialchars($_POST[jumlah]);
      $tanggal = date("Y-m-d");

      $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem', '$nama', '$bank','$jumlah', '$tanggal', '$namafix') ");

      // update data pembelian dari pending sudah kirim pembayaran
      $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

    echo "<script>alert('Trima Kasih Sudah Mengirim Bukti Pembayaran'); </script>";
    echo "<script>location='riwayat.php'; </script>";


     }
      ?>
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