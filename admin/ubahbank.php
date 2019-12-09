<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">UBAH DATA BANK</h2>
<?php 

$ambil=$koneksi->query("SELECT * FROM bank WHERE id_bank='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Bank</label>
        <input name="nama_bank" type="text" class="form-control" value="<?= $pecah['nama_bank']; ?>" /> 
    </div>
    <div class="form-group">
        <label>No Rekening</label>
        <input name="no_rek" type="text" class="form-control" value="<?= $pecah['no_rek']; ?>" />
    </div> 
    <div class="form-group">
        <label>Nama Nasabah</label>
        <input name="nama_nasabah" type="text" class="form-control" value="<?= $pecah['nasabah']; ?>" />     
    </div>
    
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) 
{

        // fotonya tidak dirubah
        $koneksi->query("UPDATE bank SET nama_bank='$_POST[nama_bank]',
            no_rek='$_POST[no_rek]', nasabah='$_POST[nama_nasabah]' WHERE id_bank='$_GET[id]'") ;


    echo "<script>alert('data Bank berhasil diubah'); </script>";
    echo "<script>location='index.php?halaman=bank'; </script>";
}
 ?>