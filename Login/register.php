<?php include '../config.php';
session_start();

if(isset($_POST['register'])){
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $repassword=$_POST['repassword'];
  if($repassword==$password){
    $status="User";
    $query=mysqli_query($config,"INSERT INTO akun (nama,alamat,email,password,foto,pekerjaan,status) VALUES ('$nama', 'NULL','$email','$password','NULL','NULL','$status') ");
    if($query){
      echo "<script>
              alert('Register Berhasil, silahkan login');
              document.location='login.php';
            </script>";

    }
    else{
      echo "<script>
            alert('Register Gagal...');
            document.location='register.php';
          </script>";
    }
  }
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | Tangan.id</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/css/style-login.css">
  <link rel="shortcut icon" href="asset/image/icon-tanganid.ico">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 d-flex">
          <div class="login-wrapper m-auto">
            <div class="brand-wrapper">
              <h2 align="center" style="color: white; margin-top: -5%; "><b>Register</b></h2>
              <hr style="background-color: white; margin-bottom: 25%">
              <p align="center"><a href="#"><img src="asset/image/white-logo-tangan.id.png" alt="logo" class="logo"></a></p>
            </div>
            <form action="" method="post">

              <div class="form-group">
                <label for="nama" class="sr-only">Nama</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-account" style="color: white"></i></span>
                  </div>
                  <input type="nama" name="nama" id="nama" class="form-control" placeholder="Nama" style="color: white; font-size: 16px;">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-email-outline" style="color: white"></i></span>
                  </div>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email" style="color: white; font-size: 16px;">
                </div>
              </div>
              

              <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-lock-outline" style="color: white"></i></span>
                  </div>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" style="color: white; font-size: 16px;">
                </div>
              </div>

              <div class="form-group">
                <label for="Re-password" class="sr-only">Re-Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-lock-outline" style="color: white"></i></span>
                  </div>
                  <input type="password" name="repassword" id="password" class="form-control" placeholder="Re-Password" style="color: white; font-size: 16px;">
                </div>
              </div>

              <button name="register" type="submit" id="register" class="btn btn-block login-btn" style="margin-top: 40px;">Register</button>
            </form>
            <p class="login-wrapper-footer-text">Sudah mempunyai akun? <br><a href="login.php" class="text-link" style="text-decoration: none" >Masuk Sekarang!</a></p>
            <p class="text-link-2" style="text-decoration: none; color: white;" align="center"><i class="mdi mdi-copyright" style="color: white"></i> Tangan.id-2021</p>
          </div>
        </div>
        <div class="col-md-8 px-0 d-none d-md-block login-img" style="background-image: url(asset/image/login-background.jpg); background-repeat: no-repeat;">
            <img src="asset/image/white-logo-tangan.id.png" align="right" width="100px" style="margin: 20px;">
            <p class="garis animasi-ketikan-judul">BERGABUNGLAH BERSAMA KAMI</p>
            <p class="garis animasi-ketikan" style="font-size: 20px; background-color: #d66320; margin-top: -15px; color: white;">"Jadilah Pelindung dan Bergerak untuk Dunia"</p>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
