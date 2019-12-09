
    <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/rahmadlogo1.jpg" width="80"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="index.php"><span>Produk</span></a>
            <a class="nav-item nav-link" href="keranjang.php"><span>Keranjang</span></a>
            <a class="nav-item nav-link" href="riwayat.php"><span>Riwayat</span></a>
            <a class="nav-item nav-link" href="admin/login.php"><span>admin</span></a>
             <!-- jika sudah login(ada session pelanggan) -->
            <?php if (isset($_SESSION["pelanggan"])) : ?>
              <a class="nav-item nav-link" href="logout.php"><span>Logout</span></a>
            <?php else : ?>
               <a class="nav-item nav-link" href="login.php"><span>Login</span></a>
            <?php endif ; ?>
          </div>
        </div>
    <form class="form-inline my-2 my-lg-0" action="pencarian.php" method="get">
      <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Produk">
      <button class="btn btn-outline-success my-2 my-sm-0">Cari</button>
    </form>
       
   
    
  </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 <!-- Container -->
 <div class="container">
      <!-- Panel Info -->
        <div class="row justify-content-center">
            <div class="col-10 panelinfo">
                <div class="row">
                    <div class="col-lg">
                    <img src="img/employee.png" alt="employee" class="float-left">
                    <h4>24 Hours</h4>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>

                    <div class="col-lg">
                    <img src="img/hires.png" alt="hires" class="float-left">
                    <h4>Hight-Res</h4>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>

                    <div class="col-lg">
                    <img src="img/security.png" alt="scurity" class="float-left">
                    <h4>Security</h4>
                    <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Akhir Panel Info -->

      </header>
