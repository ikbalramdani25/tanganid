
<?php include 'header.php'; ?>

<?php
include 'config.php';

if(isset($_POST['update'])){
	$name=$_POST['nama'];
	$work=$_POST['pekerjaan'];
	$foto=$_POST['foto'];
	$lokasi=$_POST['location'];
	$run=mysqli_query($conn,"UPDATE akun SET nama='$name',pekerjaan='$work',foto='$foto', alamat='$lokasi' WHERE id='$_SESSION[id]'");
	if($run){
		echo "<script>
              alert('Data Berhasil diubah');
              document.location='profile.php';
            </script>";
	}
	else{
		echo "<script>
              alert('Data Gagal diubah');
              document.location='profile.php';
            </script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile | Tangan.id</title>
</head>
<body>

<div class="header-profile" style="background-image: linear-gradient(rgba(0,0,0,0.50),rgba(0,0,0,0.50)), url(../asset/img/house.jpg); ">
	<div class="content" style="margin-top: -25vh">
            <div class="container">
            <h1 style="font-weight: 600; text-shadow: 0 5px 20px black;" align="right" >Selamat datang, <?php echo $_SESSION['nama']; ?>!</h1>
        </div>
        </div>
</div>
<?php
if(isset($_SESSION['id'])){
	$query=mysqli_query($conn,"SELECT * FROM akun WHERE id='$_SESSION[id]'");
	$profil=mysqli_fetch_array($query);
}
if(isset($_GET['hal'])){
	if($_GET['hal']=="edit"){
	  $query1=mysqli_query($conn,"SELECT * FROM akun WHERE id='$_GET[id]'");
	  $profil=mysqli_fetch_array($query1);
	  if($profil){
		$vnama=$profil['nama'];
		$vlok=$profil['alamat'];
		$vfoto=$profil['foto'];
	  }
	}
	
  }
?>
<div class="container" style="margin-bottom: 20vh;">
	<div class="row custom-grid">
		<div class="col-md-4">
		<div class="kartu-info foto">
		  <img src="<?=$profil['foto']?>" class="img-fluid" style=" margin-bottom: 10px; ">
		</div>
		</div>

		<div class=" col-md-8">
			<div class="kartu-info" style="margin-bottom: 20px;">
			<form method="post">
			<br>
			<br>
			<br>
				 <div class="form-group">
				    <input type="text" name="nama" class="form-control cuss" id="exampleFormControlInput1" value="<?=@$vnama?>" placeholder="Masukkan Nama Baru" style="margin-top: 8vh; border: none;">
				  </div>
				  <div class="form-group">
				    <input type="text" name="foto" class="form-control cuss" id="exampleFormControlInput1" value="<?=@$vfoto?>" placeholder="Masukkan Link foto baru(opsional)" style=" border: none;">
				  </div>
				  <div class="form-group">
					<select name="pekerjaan" class="form-control">
						<option>Karyawan</option>
						<option>Jurnalis</option>
						<option>Developer</option>
						<option>Mahasiswa</option>
					</select>
					</div>

				  <div class="form-group" style="margin-top: -20px;">
				    <input type="text" name="location" class="form-control cuss" value="<?=@$vlok?>" id="exampleFormControlInput1" placeholder="Masukkan Lokasi Baru" style="margin-right: 2%; margin-top: 4vh; border: none;">
				  </div>
					<p><?php if(isset($_POST['update'])){echo $notif;}?></p>
				  <p align="right"><button type="submit" name="update" class="btn btn tombol-tombol" ><i class="fas fa-upload"></i> Update Now!</button></p>
			</form>
			</div>
		</div>	
  	</div>
  	<center><a href="profile.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-left show-morelink" style="color: white; font-weight: 900; font-size: 50px; margin-top: 15px;"></i></a></center>
</div>


<?php include 'footer.php'; ?>
</body>
</html>

<style type="text/css">
	.header-profile{
		width: 100%; 
		height: 500px;
		background-repeat: no-repeat;
		display: flex;
		background-repeat: no-repeat;
	    background-attachment: fixed;
	    background-size: cover;
	    background-position: center;
	}

	.custom-grid{
		padding: 30px;
		margin-top: -19vh;
		color: white;
		background-color: transparent;
		border-radius: 30px;
		z-index: 1;
		transition: transform .5s;
	}
	

	.custom-grid h2{
		font-weight: 900;
	}

	.foto img{
		width: 100%;
		height: 100%;
		background-repeat: no-repeat;
	    background-attachment: fixed;
	    background-size: cover;
	    background-position: center;
	    background-color: #006D6D;
	    border-radius: 100%;
	    margin-bottom: -8vh;
	}

	.tombol-tombol{
		background-color: #3F9A74;
		padding: 15px;
		border-radius: 30px;
		text-decoration: none;
		color: white;
		margin: 10px;
		box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
		transition: transform .5s;
	}
	.tombol-tombol:hover{
		background-color: #de8512;
	}
</style>
