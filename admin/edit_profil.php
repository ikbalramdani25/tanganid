<?php require_once 'teamplate/header.php'?>
<?php include '../config.php'; ?>
<?php if (isset($_POST['edit'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $pekerjaan = $_POST['pekerjaan'];
  $foto = $_POST['foto'];

  $query = mysqli_query($config,"UPDATE akun SET nama='$nama',alamat='$alamat',pekerjaan='$pekerjaan',foto='$foto' WHERE id='$_GET[id]'");
  if($query){
		echo "<script>
              alert('data Berhasil diubah');
              document.location='profil_staff.php';
            </script>";
	}
	else{
		echo "<script>
              alert('data gagal diubah');
              document.location='edit_profil.php';
            </script>";
	}
}
if(isset($_GET['hal'])){
  if($_GET['hal']=="edit"){
    $query1=mysqli_query($config,"SELECT * FROM akun WHERE id='$_GET[id]'");
    $profil=mysqli_fetch_array($query1);
    if($profil){
      $vnama=$profil['nama'];
      $vlok=$profil['alamat'];
      $vfoto=$profil['foto'];
    }
  }
  
}


?>
<div class="container-fluid gambar"></div>

<!-- Artikel -->
<div class="col-md-5 card-artikel" style="margin-left:500px;">
<div class="artikel">
  <h2> Edit Profil</h2>
    <div class="container">
      <div class="row">
        <div class="col " >
        <form method="POST">
        <div class="form-group">
          <label for="nama" style="color:white; font-size:22px;">Nama :</label>
          <input type="input" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?=@$vnama; ?>">
        </div>
        <div class="form-group">
          <label for="alamat" style="color:white; font-size:22px;" >Alamat :</label>
          <input type="input" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?=@$vlok; ?>">
        </div>
        <div class="form-group">
          <label for="pekerjaan"style="color:white;font-size:22px;">Pekerjaan :</label>
          <select name="pekerjaan" class="form-control">
            <option>Karyawan</option>
            <option>Jurnalis</option>
            <option>Developer</option>
            <option>Mahasiswa</option>
          </select>
        </div>
        <div class="form-group" style="color:white;font-size:22px;">
          <label for="foto">Foto :</label>
          <input type="text" name="foto" class="form-control" id="foto" value="<?=@$vfoto?>" placeholder="Masukan Link Imgage foto">
        </div>
        <button name="edit" type="submit" class="btn-lg btnn btn-warning" >Edit</button>
      </form>      
        </div>
      </div>
    </div>
</div>
</div>



  
  
    
<?php require_once 'teamplate/footer.php'?>
