<?php
session_start();

include 'koneksi.php';

// ambil data produk
$id_produk = $_GET["id"];


// query data barang berdasarkan id
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id_produk");
$pecah = $ambil->fetch_assoc();

  // echo "<pre>";
  // print_r($pecah);
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

   <!-- container -->
   <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
            <hr>
            <h2>Detail Produk</h2>
            <hr>
          </div>
        </div>



       <div class="row">

           <div class="col-md-4  offset-md-2">
        <input type="hidden" name="id" value="<?= $pecah['id_produk']; ?>">
                <div class="card mb-3">
                <img src="foto_produk/<?= $pecah["foto_produk"]; ?>" class="card-img-top" alt="gambar detail">
                </div>
           </div>

           <div class="col-md-4">
           <div class="card bg-secondary mb-3">
                  <h5 class="card-header"><?= $pecah['nama_produk']; ?></h5>
                  <div class="card-body">
                    <h5 class="card-title">Rp <?= number_format($pecah["harga_produk"]); ?></h5>
                    <h6>Stok : <?= $pecah['stok_produk']; ?></h6>
                    <p class="card-text"><span>berat : </span><?= $pecah['berat']; ?> gram</p>

                    <form method="post">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jumlah" required  min="1" max="<?= $pecah['stok_produk']; ?>">
                           <div class="input-group-btn">
                             <button class="btn btn-primary" name="beli">Beli</button>
                           </div>
                        </div>
                      </div>
                    </form>

                    <?php 
                    // jk tombol beli ditekan
                    if (isset($_POST['beli'])) 
                    {
                      // mebdapatkan jumlah yang di inputkan
                      $jumlah = $_POST['jumlah'];
                      // masukan di keranjang belanja
                      $_SESSION['keranjang'][$id_produk] = $jumlah;

                      echo "<script>alert('Produk Telah Masuk Ke keranjang Belanja'); </script>";
                      echo "<script>location='keranjang.php'; </script>";
                    }
                     ?>

                   
                      <a href="index.php" class="btn btn-primary"><< Menu Produk</a>
                     
                  </div>
              </div>
           </div>

       </div>
       <div class="row">
         <div class="card col-md-12 bg-light">
            <h3>Deskripsi</h3>
            <textarea class="bg-light"><?= $pecah['deskripsi_produk']; ?></textarea>
          </div>
        </div>

          <hr>
          <h4 class="text-center">Kategori Produk</h4>
          <br>
      <div class="row bg-secondary">
              <?php 
              $ambil = $koneksi->query("SELECT * FROM kategori");
              while ($pecah = $ambil->fetch_assoc()) { ?>
              <div class="col-md-4 col-6 mb-3">
                <div class="card-deck">
                    <div class="card text-center bg-secondary">
                      <h5><?= $pecah['nama_kategori']; ?></h5>
                   <a href="carikategori.php?kategori=<?= $pecah['id_kategori']; ?>" ><img src="foto_kategori/<?= $pecah['gambar_kategori']; ?>" class="img-fluid img-thumbnail rounded-circle" width="200" ></a>
                   </div>
                 </div>
              </div>
                <?php }; ?> 
      </div>

    
     
    </div>
    <!-- Akhir Container -->

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