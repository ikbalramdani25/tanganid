
<?php include 'header.php'; ?>
<?php include '../config.php'; 
if(isset($_SESSION['login'])){
  header('location: ../admin/dashboard.php');
  exit;
}else{
  if(isset($_SESSION['login_user'])){
    header('location: /tanganid/sistem/home.php');
    exit;
  }
}
?>



<?php 
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = mysqli_query($config,"SELECT * FROM akun WHERE  email = '$email' AND password= '$password'");
  if (mysqli_num_rows($query)== 0 ) {
    $notif = 'Email dan Password salah!';
  } else{
    $row = mysqli_fetch_assoc($query);
    $_SESSION['id'] = $row['id'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['status'] = $row['status'];
      #Melempar ke halaman sesuai dengan status
      if ($_SESSION['status'] == 'Admin' or $_SESSION['status'] == 'Staff Admin') {
        $_SESSION['login'] =true;
        header('location: /tanganid/admin/dashboard.php');
      }else{
        $_SESSION['login_user']=true;
        header('location: /tanganid/sistem/home.php');
      }
  }
}

?>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 d-flex">
          <div class="login-wrapper m-auto">
            <div class="brand-wrapper">
              <h2 align="center" style="color: white; margin-top: -15%; "><b>Login</b></h2>
              <hr style="background-color: white; margin-bottom: 25%">
              <p align="center"><a href="/tanganid/sistem/home.php"><img src="asset/image/white-logo-tangan.id.png" alt="logo" class="logo"></a></p>
            </div>
            <form method="post">
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
              <div class="form-options-wrapper">
                  <p style="color:white;"><?php if (isset($notif)) {
                    echo $notif;
                  } ?></p>
              </div>
              <button name="login" class="btn btn-block login-btn" type="submit">Login</button>
            </form>
            <p class="login-wrapper-footer-text">Belum mempunyai Akun? <br><a href="register.php" class="text-link" style="text-decoration: none" >Daftar Sekarang!</a></p>

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
<?php include 'footer.php';?>