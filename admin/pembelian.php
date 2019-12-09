<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">DATA PEMBELIAN</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
      <th>Tanggal</th>
      <th>Status Pembelian</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
 <!--      <?php
      // echo "<pre>";
      // print_r($pecah);
      // echo "</pre>";
      ?> -->
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['nama_pelanggan']; ?></td>
      <td><?= $pecah['tanggal_pembelian']; ?></td>
      <td><?= $pecah['status_pembelian']; ?></td>
      <td>Rp <?= number_format($pecah['total_pembelian']); ?></td>
      <td>
          <a href="index.php?halaman=detail&id=<?= $pecah['id_pembelian']; ?>" class="btn btn-info">detail</a>
          <a href="index.php?halaman=hapuspembelian&id=<?= $pecah['id_pembelian']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
          <?php if ($pecah['status_pembelian']!=="pending") : ?>
            <a href="index.php?halaman=pembayaran&id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
            <a href="print.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-warning" target="_blank">Print</a>
          <?php endif; ?>

      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>