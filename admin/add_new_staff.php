<?php require_once 'teamplate/header.php'?>
<?php include '../config.php'?>
<?php
if(isset($_POST['tambah'])){
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $repassword=$_POST['repassword'];
  if($repassword==$password){
    $status="Staff Admin";
    $foto="asset/img/profile.png";
    $query=mysqli_query($config,"INSERT INTO akun (nama,alamat,email,password,foto,pekerjaan,status) VALUES ('$nama', 'NULL','$email','$password','$foto','NULL','$status') ");
    if($query){
      echo "<script>
              alert('Akun Berhasil ditambahkan');
              document.location='add_new_staff.php';
            </script>";
    }
    else{
      echo "<script>
            alert('Akun Gagal ditambahkan');
            document.location='add_new_staff.php';
          </script>";
    }
  }
  
}
?>
    <!--Menu-->
    <div class="row card-dashboard">
      <div class="col-md-4 mt-5">
          <ul class="nav nav-pills nav-pills-primary flex-column" style="align-content: center;">
            <li ><a class="nav-item btn tombol"  href="dashboard.php" >Dashboard</a></li>
            <br><li  ><a class="nav-item btn tombol" href="create_post.php" >Create Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="pending_post.php" >Pending Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="list_user.php" >List User</a></li>
            <br><li  ><a class="nav-item btn tombol" style="background-color:#3F9A74; color:white;" href="add_new_staff.php" >Add New Staff</a></li>
            <br><li  ><a class="nav-item btn tombol menu" href="kotak_masuk.php" >Kotak Masuk</a></li>
          </ul>
      </div>
      <!--Akhir Menu-->
      <div class="col-md-7 ">
        <div class="card " style="padding-bottom: 20px;border-radius: 30px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" >
          <div class="card-body "  >
            <h3 class="mb-3"><b>ADD NEW STAFF</b></h3>
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb  bc">
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                  <li class="breadcrumb-item"><a href="/">Add New Staff</a></li>
              </ol>
            </nav>
            <br>
            <form method="post">
              <div class="form-group">
                <label for="#">Nama :</label>
                <input type="input" name="nama" class="form-control" id="nama" placeholder="Nama">
              </div>
              <div class="form-group">
                <label for="#">Email :</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="#">Password :</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="#">Re-password :</label>
                <input type="password"name="repassword" class="form-control" id="repassword" placeholder="Konfirmasi Password">
              </div>
              <br>
              <button type="reset" class="btn btn-warning btnn" style="border-radius: 20px;">Cancel</button>
              <button type="submit" name="tambah" class="btn btnn" style="color: white; background-color: #3f9a74; border-radius: 20px;">Tambah</button>
              
            </form>
        </div>
      </div>   
    </div>
  <?php require_once 'teamplate/footer.php'?>