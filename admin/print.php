
<?php 
$koneksi = new mysqli("localhost", "root", "", "kosmetik");

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
 ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
	body {
	    background: grey;
	    margin-top: 120px;
	    margin-bottom: 120px;
	}
</style>
<h3 class="text-center">KOSMETIK TOKO</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Data Pembeli</p>
                            <p class="mb-1"><strong><?= $detail['nama_pelanggan']; ?></strong></p>
                            <p></p>  <?= $detail['telepon_pelanggan']; ?>
                            <p class="mb-1"><?= $detail['tanggal_pembelian']; ?></p>
                            <p class="mb-1"><?= $detail['status_pembelian']; ?></p> 
                            <p class="mb-1"><strong>Total Rp <?= number_format($detail['total_pembelian']); ?></strong></p>
                        </div>

                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Tujuan Kirim</p>
                            <p class="mb-1"><span class="text-muted">Kota : </span> <?= $detail['nama_kota']; ?></p>
                            <p class="mb-1"><span class="text-muted">Alamat : </span> <?= $detail['alamat_pengiriman']; ?></p>
                            <p class="mb-1"><span class="text-muted">Tarif Kirim : </span>Rp <?= number_format($detail['tarif']); ?></p>
                            <p class="mb-1"><span class="text-muted">Penerima : </span> <strong><?= $detail['nama_pelanggan']; ?></strong></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">No</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Nama Produk</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Harga</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Jml Brg</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Sub Total</th>
                                    </tr>
                                </thead>
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
                            </table>
                        </div>
                    </div>

 

<script type="text/javascript">
	window.print();
</script>
