 <?php require_once 'teamplate/header.php'?> 
<?php include '../config.php'; ?>
<?php if (isset($_POST['post'])) {
  $judul = $_POST['judul'];
  $lokasi = $_POST['lokasi'];
  $foto = $_POST['foto'];
  $isi = $_POST['postingan'];
  $tanggal = date('l, d-m-Y');
  $id_akun = $_SESSION['id'];
  
  $query=mysqli_query($config,"UPDATE artikel SET judul='$judul',lokasi='$lokasi', foto='$foto', isi='$isi',tanggal='$tanggal'");
  if($query){
		echo "<script>
              alert('artikel Berhasil diubah');
              document.location='profil_staff.php';
            </script>";
	}
	else{
		echo "<script>
              alert('artikel gagal diubah');
              document.location='edit_post.php';
            </script>";
	}
}

if(isset($_GET['hal'])){
  if($_GET['hal']=="edit"){
    $judul=mysqli_query($config,"SELECT * FROM artikel WHERE id='$_GET[id]'");
    if($judul_run=mysqli_fetch_array($judul)){
      $vjudul=$judul_run['judul'];
      $vlokasi=$judul_run['lokasi'];
      $vfoto=$judul_run['foto'];
      $visi=$judul_run['isi'];
    }
  }
}



?>
    <div class="row card-dashboard">
      <!--Akhir Menu-->
      <div class="container">
      <div class="col-md-12 ">
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
                <input type="input" class="form-control" id="exampleFormControlInput1" name="judul" value="<?=@$vjudul?>" placeholder="Judul Artikel">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Lokasi :</label>
                <input type="input" name="lokasi" class="form-control" id="exampleFormControlInput1" value="<?=@$vlokasi?>" placeholder="Kota">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Upload Gambar :</label>
                <input type="text" class="form-control" name="foto" id="exampleFormControlInput1" value="<?=@$vfoto?>" placeholder="Masukan Link Image">
              </div>
              <div class="form-group">
                <label for="ckedtor" style="font-weight: 600">Content :</label>
                <textarea class="ckeditor" value="<?=@$visi?>" name="postingan" id="ckedtor"></textarea>
              </div>
              <button type="submit" class="btn btn" name="post" style="background-color:#3f9a74 ; color: white; float:right; border-radius:20px; width:90px">Post</button>

            </form>
        </div>
      </div>   
    </div>
    </div>
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<?php require_once 'teamplate/footer.php'?>