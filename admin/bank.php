<?php 
if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>
<h2 class="text-center">DATA BANK</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Bank</th>
      <th>No Rekening</th>
      <th>Nama Nasabah</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM bank"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['nama_bank']; ?></td>
      <td><?= $pecah['no_rek']; ?></td>
      <td><?= $pecah['nasabah']; ?></td>
      <td>
          <a href="index.php?halaman=ubahbank&id=<?= $pecah['id_bank']; ?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
