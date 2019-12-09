<?php 
session_start();
include 'koneksi.php';
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
   
   <?php include "header.php"; ?>

      <!-- produk -->
      <section class="konten">
    <div class="container">
              
        <div class="row">
          <div class="col-sm-12">
            <hr>
            <h2 class="text-center">Produk</h2>  
            <hr>
          </div>
        </div>
      
    <div class="row bg-light">
      <div class="col-md-3 col-6">            
                <div class="card">
                    <div class="card-header">
                        Cari Kategori Produk
                    </div>
                    <div class="card-body">
                        <form action="carikategori.php" method="get">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori">
                                  <?php 
                                    $ambil = $koneksi->query("SELECT * FROM kategori");
                                    while ($pecah = $ambil->fetch_assoc()) {
                                  ?> 
                            <option value="<?= $pecah['id_kategori']; ?>"><?= $pecah['nama_kategori']; ?></option>
                                  <?php } ?>
                            </select>
                        </div>
                        <button>Cari</button>
                        </form>
                    </div>
                </div>
        </div>

      <?php 
      $jumlahDataPerhalaman = 11;
      $ambil = $koneksi->query("SELECT * FROM produk");
      $rows = [];
      while($pecah = $ambil->fetch_assoc()) {
        $rows[] = $pecah;
      };
      $jumlahData = count($rows);
      $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
      $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
      $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
      ?>
      
     <?php $ambil=$koneksi->query("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerhalaman"); ?>
    <?php while($perproduk = $ambil->fetch_assoc()) { ?>
     
        <div class="col-md-3 col-6">
          <div class="card-deck">
           <div class="card">
            <a href="detail.php?id=<?= $perproduk["id_produk"]; ?>"><img src="foto_produk/<?= $perproduk["foto_produk"]; ?>" width="150" class="card-img-top img-fluid" ></a>
            <div class="card-body">
                <h5 class="card-title"><?= $perproduk["nama_produk"]; ?></h5>
                <h5 class="card-title">Rp <?= number_format($perproduk["harga_produk"]); ?></h5>

               <a href="beli.php?id=<?= $perproduk['id_produk']; ?>&stok=<?= $perproduk['stok_produk']; ?>" class ="btn btn-primary float-right" >Beli</a>


            </div>
            </div>
            </div>
          </div>
         <?php }; ?>   

          
 </div>
 <!-- akhir row -->
           <div class="row">
                 <div class="col-md-12">
                  <br> <br> <br>
                    <!-- Navigasi Pagination -->



          <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group">
              <?php if ($halamanAktif > 1) : ?>
              <a class="btn btn-primary" href="?halaman= <?= $halamanAktif - 1; ?>">&laquo</a>
              <?php endif; ?>

                    <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
                       <?php if( $i == $halamanAktif) : ?>
              <a class="btn btn-primary" href="?halaman= <?= $i; ?>" style="font-weight:bold; color:red;"> <?= $i; ?> </a>
               <?php else : ?>
              <a class="btn btn-primary" href="?halaman= <?= $i; ?>"> <?= $i; ?> </a>          
                       <?php endif; ?>
                     <?php endfor; ?>

              <?php if ($halamanAktif < $jumlahHalaman) : ?>
              <a class="btn btn-primary" href="?halaman= <?= $halamanAktif + 1; ?>">&raquo</a>
              <?php endif; ?>
            </div>
          </div>

                    
                   

                    <br>
                 </div> 
           </div>
</div>
    <!-- Akhir Container -->
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