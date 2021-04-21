
<?php include 'header.php'; ?>
<?php include 'config.php'?>

<?php
if(isset($_POST['post'])){
  $judul = $_POST['judul'];
  $lok =$_POST['lokasi'];
  $img =$_POST['gambar'];
  $isi = $_POST['postingan'];
  date_default_timezone_set('Asia/Jakarta');
  $tanggal = date('l, d-m-Y');

  $query=mysqli_query($conn,"INSERT INTO artikel (id_akun,judul,tanggal,lokasi,isi,foto,status) VALUES('$_SESSION[id]','$judul','$tanggal','$lok','$isi','$img','noacc')");
  if($query){
		echo "<script>
              alert('artikel Berhasil ditambahkan');
              document.location='profile.php';
            </script>";
	}
	else{
		echo "<script>
              alert('artikel gagal ditambahkan');
              document.location='post-stories.php';
            </script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Post | Tangan.id</title>
</head>
<body>


<div class="container" style="margin-top: 25vh; color: white;">

    <h2 class="page-section-heading text-center text-uppercase text-white" style="margin-top: -10vh;">ADD NEW POST</h2>
    <div class="divider-custom divider-light" style="margin-top: -1vh">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-plus"></i></div>
        <div class="divider-custom-line" ></div>
    </div>

<form method="post">
  <div class="form-group">
    <label for="judul" style="font-weight: 600">Judul : </label>
    <input type="text" name="judul" class="form-control cuss" id="judul" placeholder="Masukkan Judul">
  </div>

  <div class="form-group">
    <label for="lokasi" style="font-weight: 600">Lokasi : </label>
    <input type="text" name="lokasi"class="form-control cuss" id="lokasi" placeholder="Masukkan Lokasi">
  </div>

  <div class="form-group">
    <label for="foto" style="font-weight: 600">Image : </label>
    <input type="text" name="gambar" class="form-control cuss" id="foto"placeholder="Masukkan Link Gambar">
  </div>

  <div class="form-group">
    <label for="ckedtor" style="font-weight: 600">Content :</label>
    <textarea class="ckeditor" name="postingan" id="ckedtor"></textarea>
  </div>
    <p align="right">
        <button type="submit" name="post" class="btn btn tombol-tombol" ><i class="fas fa-upload"></i> Post Now!</button>
    </p>
</form>

    <center><a href="profile.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-left show-morelink" style="color: white; font-weight: 900; font-size: 50px; margin-top: 40px;"></i></a></center>
</div>




<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<style type="text/css">
    .cuss{
        border-radius: 30px;
        border: none;
        
    }

   .tombol-tombol{
        background-color: #3F9A74;
        padding: 15px;
        border-radius: 30px;
        text-decoration: none;
        color: white;
        box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        transition: transform .5s;
    }
    .tombol-tombol:hover{
        background-color: #de8512;
    }

</style>


</body>
<?php include 'footer.php'; ?>
</html>