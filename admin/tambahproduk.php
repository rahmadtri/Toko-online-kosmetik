<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">TAMBAH PRODUK</h2>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
       <label><strong>PILIH KATEGORI PRODUK</strong></label> <br>
        <select name="kategori">
         <?php 
        $ambil = $koneksi->query("SELECT * FROM kategori");
         while ($pecah = $ambil->fetch_assoc()) {
        ?>
 
         <option value="<?= $pecah['id_kategori']; ?>"><?= $pecah['nama_kategori']; ?></option>
        <?php } ?>
         </select>     
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input name="nama" type="text" class="form-control" placeholder="Nama Produk" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input name="harga" type="number" class="form-control" placeholder="Harga" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Stok Barang</label>
        <input name="stok" type="number" class="form-control" placeholder="Stok Barang" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input name="berat" type="number" class="form-control" placeholder="Berat" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10" placeholder="Deskripsi"></textarea>     
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
 <?php 
if (isset($_POST['save'])) 
{
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $namafix = date("YmdHis").$nama;
    move_uploaded_file($lokasi, "../foto_produk/$namafix");

    $koneksi->query("INSERT INTO produk(nama_produk, id_kategori, harga_produk, berat, foto_produk, deskripsi_produk, stok_produk) VALUES ('$_POST[nama]', '$_POST[kategori]', '$_POST[harga]', '$_POST[berat]', '$namafix', '$_POST[deskripsi]', '$_POST[stok]') ");


    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
  ?>

  
  