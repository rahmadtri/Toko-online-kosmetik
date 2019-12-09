<?php 
	session_start();

	// echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";



	include 'koneksi.php';

    if (!isset($_SESSION["pelanggan"])) 
    {
    echo "<script>alert('Silahkan Login'); </script>";
    echo "<script>location='login.php'; </script>";
    }
 ?>

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                <div class="row">
                <div class="col-sm-12 text-center">
                    <hr>
                    <h2>Checkout</h2>
                    <hr>
                </div>
                </div>

       <div class="row">

           <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">SubHarga</th>
                        <th>berat</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php  
                      $total = 0;   
                      $total_berat = 0;
                      ?>
                      
                      <?php $nomor=1; ?>
                      <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
                      <!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
                      <?php 

                      $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                      $pecah = $ambil->fetch_assoc();
                      $subharga = $pecah['harga_produk']*$jumlah;
                      $berat = $pecah['berat'] * $jumlah;
                      $total_berat += $berat;


                       ?>
                        <tr>
                        <td><?= $nomor; ?></td>
                        <td><img src="foto_produk/<?= $pecah["foto_produk"]; ?>" width="100" alt="gambar"></td>
                        <td><?= $pecah['nama_produk']; ?></td>
                        <td><?= $jumlah ?></td>
                        <td>Rp <?= number_format($pecah['harga_produk']); ?></td>
                        <td>Rp <?= number_format($subharga); ?></td>
                        <td><?= $berat ; ?></td>
                        </tr>


                        <?php $total += $subharga; ?>
                        <?php $nomor++; ?>
                       <?php endforeach; ?>

                    </tbody>
                <div class="row">
                    <div class="table-responsive">
                       <table class="table checkout">
                           <thead class="thead text-center">
                               <tr class="bg-secondary">
                               <th scope="col">Total Belanja</th>
                               <th scope="col">Rp. <?= number_format($total) ?></th>
                              </tr>
                               <tr class="bg-success">
                               <th scope="col">Total Berat</th>
                               <th scope="col"><?= $total_berat; ?> Gram</th>
                              </tr>
                           </thead>
                       </table>
                      </div>
                </div>
                </table>





                <!-- raja ongkir -->
    
      <br><br>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Cek Ongkos Kirim</h3>
            </div>
            <div class="panel-body">
                  <?php
                  //Get Data Kabupaten
                  $curl = curl_init();
                  curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                      "key: ee35cb4e1907075306f4a52b7e14c5d9"
                    ),
                  ));

                  $response = curl_exec($curl);
                  $err = curl_error($curl);


                  curl_close($curl);
                  // kota asal di hidden
                  echo '<div class="form-group">
                        <input class="form-control" id="asal" type="hidden" name="asal" value="196">
                      </div>';
                  //Get Data Kabupaten
                  //-----------------------------------------------------------------------------

                  //Get Data Provinsi
                  $curl = curl_init();

                  curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                    "key:ee35cb4e1907075306f4a52b7e14c5d9"
                    ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    echo "
                    <div class= \"form-group\">
                      <label for=\"provinsi\">Provinsi Tujuan </label>
                      <select class=\"form-control\" name='provinsi' id='provinsi'>";
                        echo "<option>Pilih Provinsi Tujuan</option>";
                        $data = json_decode($response, true);
                        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                          echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                        }
                        echo "</select>
                      </div>";
                      //Get Data Provinsi
                      ?>

                      <div class="form-group">
                        <label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
                        <select class="form-control" id="kabupaten" name="kabupaten"></select>
                      </div>
                      <div class="form-group">
                        <label for="kurir">Kurir</label><br>
                        <select class="form-control" id="kurir" name="kurir">
                          <option value="jne">JNE</option>
                          <option value="tiki">TIKI</option>
                          <option value="pos">POS INDONESIA</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label  for="berat">Berat (gram)</label><br>
                        <input class="form-control" readonly id="berat" type="text" name="berat" value="<?= $total_berat ?>" />
                      </div>
                      <button class="btn btn-danger" id="cek" type="submit" name="button">Cek Ongkir</button>
                    </div>
                </div>
              </div>

              <div class="col-md-8">
                <form method="post" action="">
                <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Hasil Pilih salah satu ongkir</h3>
                    </div>
                  <div class="panel-body">
                    <ol>
                        <div id="ongkir"></div> 
                    </ol>
                  </div>
                  <input type="hidden" id="kota_tujuan" name="kota_tujuan">
              </div>
            </div>

            </div>
            <!-- tutup row konten atas -->

            <br><br>
              <div class="alert alert-info text-center">
                <strong><p>DIMOHON MENGISI DATA PENGIRIMAN DENGAN LENGKAP AGAR MEMPERMUDAH PENGIRIMAN</p></strong>
              </div>

            <div class="row justify-content-center">

                      <div class="col-md-4">
                         <input type="text" class="form-control" readonly value="<?= $_SESSION["pelanggan"]["nama_pelanggan"]; ?>">
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" readonly value="<?= $_SESSION["pelanggan"]["telepon_pelanggan"]; ?>">
                      </div>
            </div>
                  <br>
                  <div class="form-group">
                    <label>Alamat Lengkap Pengiriman</label>
                    <textarea class="form-control" minlength="10" name="alamat_pengiriman" placeholder="Masukan Alamat Lengkap Pengiriman provinsi kota kecamatan desa (Termasuk Kode Pos)" required></textarea>
                  </div>

                  <div class="form-group">
                    <label>Catatan</label>
                    <textarea class="form-control" name="catatan" placeholder="Contoh : saya dirumah jam 5/rumah dengan warna biru" required></textarea>
                  </div>
                  <br>
            <button class="btn btn-primary float-right" name="kirim">Pesan Sekarang</button>
            </form>
            


      






                <?php 
                if (isset($_POST['kirim'])) 
                {
                  $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                  $ongkir = $_POST["ongkir"];
                  $tanggal_pembelian = date("Y-m-d");
                  $kota_tujuan = $_POST['kota_tujuan'];
                  $alamat_pengiriman = htmlspecialchars($_POST['alamat_pengiriman']);
                  $catatan = htmlspecialchars($_POST['catatan']);


                  $total_pembelian = $total + $ongkir;

                  // 1. menyimpan data ke table pembelian
                  $koneksi->query("INSERT INTO pembelian (id_pelanggan, tanggal_pembelian, total_belanja, total_pembelian, nama_kota, tarif, alamat_pengiriman, catatan) VALUES ('$id_pelanggan', '$tanggal_pembelian', '$total', '$total_pembelian', '$kota_tujuan', '$ongkir', '$alamat_pengiriman', '$catatan')");

                  // mendapatkan id_pembelian terbaru yang terjadi
                  $idpembelian_terbaru = $koneksi->insert_id;

                  foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
                  {

                  // mendapatkan data produk berdasarkan id-produk
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' ");
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['nama_produk'];
                    $harga = $perproduk['harga_produk'];
                    $berat = $perproduk['berat'];

                    $subberat = $perproduk['berat']*$jumlah;
                    $subharga = $perproduk['harga_produk']*$jumlah;
                    $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, berat, subberat, subharga) VALUES ('$idpembelian_terbaru', '$id_produk', '$jumlah', '$nama', '$harga', '$berat', '$subberat', '$subharga') ");

                  // skrip update stok
                  $koneksi->query("UPDATE produk SET stok_produk= stok_produk -$jumlah WHERE id_produk='$id_produk' ");
                  
                  }

                  // mengkosongkan keranjang belanaja
                  unset($_SESSION[keranjang]);

                  // tampilan dialihkan ke halaman nota, nota dari pembelian terbaru terjadi
                  echo "<script>alert('Pembelian Sukses'); </script>";
                  echo "<script>location='nota.php?id=$idpembelian_terbaru'; </script>";
                }
                 ?> 
           </div>


        </div>

      </div>
      <!-- akhir contaier -->
   <!--    <?php 
  // echo "<pre>";
  // print_r($_SESSION['pelanggan']);
  // echo "</pre>";
       ?> -->




      <!-- Footer -->
      <?php include "footer.php"; ?>
      <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript">

  $(document).ready(function(){

    // $('#asal option:selected').attr('value','196');

    $('#provinsi').change(function(){

      //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
      var prov = $('#provinsi').val();

          $.ajax({
              type : 'GET',
              url : 'http://localhost/kosmetik/cek_kabupaten.php',
              data :  'prov_id=' + prov,
          success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
          $("#kabupaten").html(data);
        }
            });

    });

    $('#kabupaten').change(function(){
        var kab = $('#kabupaten option:selected').text();

          $('#kota_tujuan').attr('value',kab);          
    });


    $("#cek").click(function(){
      //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
      var asal = $('#asal').val();
      var kab = $('#kabupaten').val();
      var kurir = $('#kurir').val();
      var berat = $('#berat').val();

          $.ajax({
              type : 'POST',
              url : 'http://localhost/kosmetik/cek_ongkir.php',
              data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
          success: function (data) {

          //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
          $("#ongkir").html(data);
        }
            });
    });
  });
</script>

  