<?php 

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">DETAIL PEMBELIAN</h2>
<hr>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
      // echo "<pre>";
      // print_r($detail);
      // echo "</pre>";
 ?>




 <div class="row">
   <div class="col-md-4">
     <h4>Pembelian</h4>
      <p>
       Tanggal : <?= $detail['tanggal_pembelian']; ?> <br>
       Status : <?= $detail['status_pembelian']; ?> <br>
      </p>

   </div>
   <div class="col-md-4">
     <h4>Pelanggan</h4>
        <strong><?= $detail['nama_pelanggan']; ?></strong> <br>
        <p>
           <?= $detail['telepon_pelanggan']; ?> <br>
           <?= $detail['username_pelanggan']; ?>
       </p>
   </div>
   <div class="col-md-4">
     <h4>Pengiriman</h4>
     <strong><?= $detail['nama_kota']; ?></strong>
     <p>
      Alamat : <?= $detail['alamat_pengiriman']; ?> <br>
      Catatan Pembeli : <?= $detail['catatan']; ?> <br>
     </p>
   </div>
 </div>

 <table class="table table-bordered">
  <thead>
    <tr>
      <th>no</th>
      <th>nama produk</th>
      <th>harga</th>
      <th>jumlah</th>
      <th>subtotal</th>
    </tr>
  </thead>

   <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['nama_produk']; ?></td>
      <td>Rp <?= number_format($pecah['harga_produk']); ?></td>
      <td><?= $pecah['jumlah']; ?></td>
      <td>
       Rp <?= number_format($pecah['harga_produk']*$pecah['jumlah']); ?></td>

    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
  <tfoot>
            <tr>
              <th colspan="4">TOTAL BELANJA</th>
              <th>Rp <?= number_format($detail['total_belanja']); ?></th>
            </tr>
    <tr>
      <th colspan="4">BIAYA KIRIM</th>
      <th>Rp <?= number_format($detail['tarif']); ?></th>
    </tr>
    <tr>
      <th colspan="4">TOTAL</th>
      <th>Rp <?= number_format($detail['total_pembelian']); ?></th>
    </tr>
  </tfoot>

  </table>