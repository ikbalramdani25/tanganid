<?php include 'header.php'; ?>
<?php include 'config.php'; 

if(isset($_GET['hal'])){
	if($_GET['hal']=="show"){
        $conten=mysqli_query($conn,"SELECT id_akun, judul, tanggal, lokasi,foto,isi FROM artikel WHERE id ='$_GET[id]'");
		$data=mysqli_fetch_array($conten);
		$akun=mysqli_query($conn,"SELECT nama FROM akun WHERE id ='$data[id_akun]'");
		$nama=mysqli_fetch_array($akun);
	}
	if($_GET['hal']=="hapus"){
		$hapus=mysqli_query($conn,"DELETE FROM artikel WHERE id='$_GET[id]'");
		if($hapus){
			echo "<script>
              alert('artikel Berhasil dihapus');
              document.location='profile.php';
            </script>";
		}
		else{
			echo "<script>
              alert('artikel tidak Berhasil dihapus');
              document.location='content-owner.php';
            </script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Preview | Tangan.id</title>
</head>
<body>



<div class="jumbotron-ku" style="background-image:url(<?=$data['foto']?>);  ">
	 <div class="content" style="margin-top: -20vh;">
            <div class="container">
            <h2 style="font-weight: 600; font-size: 5vh; text-shadow: 0 5px 10px black;" align="center" ><?=$data['judul']?></h2>
        </div>
        </div>
</div>

<div class="container">
	 	<div class="row custom-grid">
		<div class=" col-md-4">
		<div class="kartu-info" >
		  <div class="card-body" style="background-color: transparent; text-align: center;">
		    <h5 class="card-title"><i class="fas fa-user" style="font-size: 50px;"></i></h5>
		    <p class="card-text" style="margin-top: 20px;"><?=$nama['nama']?></p>
		  </div>
		</div>
		    </div>

		<div class="col-md-4">
		<div class="kartu-info" >
		  <div class="card-body" style="background-color: transparent; text-align: center;">
		    <h5 class="card-title"><i class="fas fa-calendar-day" style="font-size: 50px;"></i></h5>
		    <p class="card-text" style="margin-top: 20px;"><?=$data['tanggal']?></p>
		  </div>
		</div>
		    </div>

		<div class="col-md-4">
		<div class="kartu-info" >
		  <div class="card-body" style="background-color: transparent; text-align: center;">
		    <h5 class="card-title"><i class="fas fa-map-marker-alt" style="font-size: 50px;"></i></h5>
		    <p class="card-text" style="margin-top: 20px;"><?=$data['lokasi']?></p>
		  </div>
		</div>
		</div>
  	</div>

  	<div class="isi-konten" align="justify">
  		<p>
  		<?=$data['isi']?>
	  </p>
  	</div>

	<p align="center" class="tombol-tombol" style="margin-top: 10vh">
  		<a href="edit-stories.php?hal=edit&id=<?=$_GET['id']?>"><i class="fas fa-edit" style="margin-right: 1vh"></i> Edit</a>
  		<a href="content-owner.php?hal=hapus&id=<?=$_GET['id']?>" style="background-color: red;"><i class="fas fa-trash-alt" style="margin-right: 1vh; "></i> Delete</a>
  	</p>
    
    <center><a href="profile.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-left show-morelink" style="color: white; font-weight: 900; font-size: 50px; margin-top: 50px;"></i></a></center>

</div>

<?php include 'footer.php'; ?>
</body>
</html>

<style type="text/css">
	.jumbotron-ku{
	width: 100%;
    height: 80vh;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-position: center;

	}

	.custom-grid{
		padding: 30px;
		margin-top: -10vh;
		margin-left: 1vh;
		margin-right: 4vh;
		color: white;
		background-color: #006D6D;
		border-radius: 30px;
		box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
		z-index: 1;
		transition: transform .5s;
	}
	.custom-grid:hover{
		transform: scale(1.03);
	}

	.custom-grid h2{
		font-weight: 900;
	}

	.isi-konten{
		margin-top: 50px;
		font-weight: 400;
		color: white;
		justify-content: justify;
		line-height: 2em;
		font-size: 20px;
	}

	.tombol-tombol a{
		background-color: #3F9A74;
		padding: 15px;
		border-radius: 30px;
		text-decoration: none;
		color: white;
		margin: 10px;
		box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
		transition: transform .5s;
	}
	.tombol-tombol a:hover{
		background-color: #de8512;
	}
</style>