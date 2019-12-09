<?php 
	session_start();

	// echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";

	include 'koneksi.php';

  if (empty($_SESSION["keranjang"]) OR !isset($_SESSION['keranjang'])) 
  {
    echo "<script>alert('Keranjang Kosong, Silahkan Belanja Dulu'); </script>";
    echo "<script>location='index.php'; </script>";
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

   <!-- container -->
   <div class="container">
                <div class="row">
                <div class="col-sm-12 text-center">
                    <hr>
                    <h2>Detail Keranjang Belanja</h2>
                    <hr>
                </div>
                </div>

       <div class="row">

           <div class="table-responsive">
                <table class="table checkout">
                    <thead class="thead-dark text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">SubHarga</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php  $total = 0;   ?>
                      
                    	<?php $nomor=1; ?>
                    	<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>


                    	<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                  <?php  
                    	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    	$pecah = $ambil->fetch_assoc();
                    	$subharga = $pecah['harga_produk']*$jumlah;                    	
                   ?>
                        <tr>
                        <td><?= $nomor; ?></td>
                        <td><img src="foto_produk/<?= $pecah["foto_produk"]; ?>" width="100" alt="gambar"></td>
                        <td><?= $pecah['nama_produk']; ?></td>
                        <td><input type="number"  class="form-control text-center" readonly value="<?= $jumlah ?>" ></td>
                        <td>Rp <?= number_format($pecah['harga_produk']); ?></td>
                        <td>Rp <?= number_format($subharga); ?></td>

                         <td><center> 
                          <?php if(($jumlah) == 1) :  ?>
                          <a href="tambahkeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-success">Tambah</a>
                          <a href="hapuskeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                          <?php elseif (($jumlah) == $pecah['stok_produk']) :  ?>
                          <a href="kurangkeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-warning">Kurang</a>
                          <a href="hapuskeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                          <?php else : ?>
                          <a href="tambahkeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-success">Tambah</a>
                          <a href="kurangkeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-warning">Kurang</a>
                          <a href="hapuskeranjang.php?id=<?= $id_produk ?>" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        <?php endif; ?>
                        </center></td>
                 
                </tr>
                        </tr>
                        <?php $total += $subharga; ?>
                        <?php $nomor++; ?>
                       <?php endforeach; ?>

                    </tbody>
                </table>
           </div>
        </div>
        <!-- akhir row -->
    <!-- awal row total  -->
<div class="row">

<div class="table-responsive">
     <table class="table checkout">
         <thead class="thead text-center">
             <tr class="bg-secondary">
             <th scope="col">Total Belanja</th>
             <th scope="col">Rp. <?= number_format($total) ?></th>
         </thead>
     </table>
</div>

</div>
    <!-- akhir row total -->
        <hr>
        <a href="index.php" class="btn btn-primary"><< Lanjut Belanja</a>
        <a href="checkout.php" class="btn btn-success"> Checkout </a>
        </div>
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