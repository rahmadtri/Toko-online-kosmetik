<?php 
session_start();
// koneksi
include '../koneksi.php';
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

    <title>Login Admin</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i>KKM</p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="user" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="pass" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" name="login">Login</button>
            <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
        </div>
      </form>

      <?php 
        if (isset($_POST['login']))
        {
            $ambil = $koneksi->query("SELECT * FROM admin WHERE
                username='$_POST[user]' AND password='$_POST[pass]'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok==1)
            {
                $_SESSION['admin'] = $ambil->fetch_assoc();
                echo "<div class='alert alert-info'>Login Brhasil</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            }
            else
            {
                echo "<div class='alert alert-danger'>Login Gagal</div>";
                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }

        }
       ?>

    </div>


  </body>
</html>
