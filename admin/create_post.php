 <?php require_once 'teamplate/header.php'?> 
<?php include '../config.php'; ?>
<?php if (isset($_POST['post'])) {
  $judul = $_POST['judul'];
  $lokasi = $_POST['lokasi'];
  $foto = $_POST['foto'];
  $isi = $_POST['postingan'];
  $tanggal = date('l, d-m-Y');
  $id_akun = $_SESSION['id'];
  
  $query=mysqli_query($config,"INSERT INTO artikel(id_akun,judul,tanggal,lokasi,isi,foto) VALUES ('$id_akun','$judul','$tanggal','$lokasi','$isi','$foto')");
  if($query){
		echo "<script>
              alert('artikel Berhasil ditambahkan');
              document.location='dashboard.php';
            </script>";
	}
	else{
		echo "<script>
              alert('artikel gagal ditambahkan');
              document.location='create_post.php';
            </script>";
	}
}



?>
    <div class="row card-dashboard">
      <div class="col-md-4 mt-5">
          <ul class="nav nav-pills nav-pills-primary flex-column" style="align-content: center;">
            <li ><a class="nav-item btn tombol" href="dashboard.php" >Dashboard</a></li>
            <br><li  ><a class="nav-item btn tombol" style="background-color:#3F9A74; color:white;" href="create_post.php" >Create Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="pending_post.php" >Pending Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="list_user.php" >List User</a></li>
            <br><li  ><a class="nav-item btn tombol" href="add_new_staff.php" >Add New Staff</a></li>
            <br><li  ><a class="nav-item btn tombol menu" href="kotak_masuk.php" >Kotak Masuk</a></li>
          </ul>
      </div>
      <!--Akhir Menu-->
      <div class="col-md-7 ">
        <div class="card " style="padding-bottom: 20px;border-radius: 30px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" >
          <div class="card-body "  >
            <h3 class="mb-3"><b>EDIT POST</b></h3>
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb  bc ">
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                  <li class="breadcrumb-item"><a href="/">Edit Post</a></li>
              </ol>
            </nav>
            <form method="POST">
              <div class="form-group">
                <label for="exampleFormControlInput1">Judul Artikel :</label>
                <input type="input" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Judul Artikel">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Lokasi :</label>
                <input type="input" name="lokasi" class="form-control" id="exampleFormControlInput1" placeholder="Kota">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Upload Gambar :</label>
                <input type="text" class="form-control" name="foto" id="exampleFormControlInput1" placeholder="Masukan Link Image">
              </div>
              <div class="form-group">
                <label for="ckedtor" style="font-weight: 600">Content :</label>
                <textarea class="ckeditor" name="postingan" id="ckedtor"></textarea>
              </div>
              <button type="submit" class="btn btn" name="post" style="background-color:#3f9a74 ; color: white; float:right; border-radius:20px; width:90px">Post</button>

            </form>
        </div>
      </div>   
    </div>
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<?php require_once 'teamplate/footer.php'?>