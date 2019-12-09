<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">DATA PRODUK</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Kategori</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Berat</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM produk JOIN kategori  ON produk.id_kategori = kategori.id_kategori"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>

    <!--   <?php
      // echo "<pre>";
      // print_r($pecah);
      // echo "</pre>";
      ?>  -->
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['nama_produk']; ?></td>
      <td><?= $pecah['nama_kategori']; ?></td>
      <td>Rp <?= number_format($pecah['harga_produk']); ?></td>
      <td><?= $pecah['stok_produk']; ?></td>
      <td><?= $pecah['berat']; ?></td>
      <td>
        <img src="../foto_produk/<?= $pecah['foto_produk']; ?>" width="100">
      </td>
      <td>
        <a href="index.php?halaman=hapusproduk&id=<?= $pecah['id_produk']; ?>" class="btn-danger btn" onclick="return confirm('Yakin hapus?')">hapus</a>
        <a href="index.php?halaman=ubahproduk&id=<?= $pecah['id_produk']; ?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>