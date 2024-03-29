<?php 
session_start();
// koneksi database
include '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin komsmetik klaten Murah</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">ADMIN <span class="lite">KKM</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Admin</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="index.php?halaman=kategori">
                          <i class="icon_genius"></i>
                          <span>Kategori</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="index.php?halaman=produk">
                          <i class="icon_genius"></i>
                          <span>Produk</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?halaman=pembelian">
                          <i class="icon_piechart"></i>
                          <span>Pembelian</span>   
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?halaman=laporan_pembelian">
                          <i class="icon_document_alt"></i>
                          <span>Laporan</span>   
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?halaman=pelanggan">
                          <i class="icon_book"></i>
                          <span>Pelanggan</span>   
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?halaman=bank">
                          <i class="icon_table"></i>
                          <span>Bank</span>   
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="index.php?halaman=logout">
                          <i class=""></i>
                          <span>Logout</span>   
                      </a>
                  </li>
                                         
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->

      
                <?php
                    if (isset($_GET['halaman']))
                    {
                        if ($_GET['halaman']=="produk") {
                          include 'produk.php';
                        }
                        if ($_GET['halaman']=="kategori") {
                          include 'kategori.php';
                        }
                        elseif ($_GET['halaman']=="pembelian") {
                          include 'pembelian.php';
                        }
                        elseif ($_GET['halaman']=="pelanggan") {
                          include 'pelanggan.php';
                        }
                        elseif ($_GET['halaman']=="detail") {
                          include 'detail.php';
                        }
                        elseif ($_GET['halaman']=="bank") {
                          include 'bank.php';
                        }
                        elseif ($_GET['halaman']=="tambahproduk") {
                          include 'tambahproduk.php';
                        }
                        elseif ($_GET['halaman']=="tambahkategori") {
                          include 'tambahkategori.php';
                        }
                        elseif ($_GET['halaman']=="tambahpelanggan") {
                          include 'tambahpelanggan.php';
                        }
                        elseif ($_GET['halaman']=="tambahadmin") {
                          include 'tambahadmin.php';
                        }
                        elseif ($_GET['halaman']=="hapusproduk") {
                          include 'hapusproduk.php';
                        }
                        elseif ($_GET['halaman']=="hapuskategori") {
                          include 'hapuskategori.php';
                        }
                        elseif ($_GET['halaman']=="hapuspelanggan") {
                          include 'hapuspelanggan.php';
                        }
                        elseif ($_GET['halaman']=="hapuspembelian") {
                          include 'hapuspembelian.php';
                        }
                        elseif ($_GET['halaman']=="hapusadmin") {
                          include 'hapusadmin.php';
                        }
                        elseif ($_GET['halaman']=="ubahkategori") {
                          include 'ubahkategori.php';
                        }
                        elseif ($_GET['halaman']=="ubahproduk") {
                          include 'ubahproduk.php';
                        }
                        elseif ($_GET['halaman']=="ubahadmin") {
                          include 'ubahadmin.php';
                        }
                        elseif ($_GET['halaman']=="ubahpelanggan") {
                          include 'ubahpelanggan.php';
                        }
                        elseif ($_GET['halaman']=="ubahbank") {
                          include 'ubahbank.php';
                        }
                        elseif ($_GET['halaman']=="logout") {
                          include 'logout.php';
                        }
                        elseif ($_GET['halaman']=="pembayaran") {
                          include 'pembayaran.php';
                        }
                        elseif ($_GET['halaman']=="laporan_pembelian") {
                          include 'laporan_pembelian.php';
                        }
                    }
                    else
                    {
                        include 'home.php';
                    }
                ?>

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
