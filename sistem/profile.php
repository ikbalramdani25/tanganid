
<?php 

include 'config.php';
include 'header.php';

if(isset($_SESSION['id'])){
	$query=mysqli_query($conn,"SELECT * FROM akun WHERE id='$_SESSION[id]'");
	$profil=mysqli_fetch_array($query);
}
?>
<?php if(!isset($_SESSION['login_user'])){
	echo "<script>
	alert('Maaf anda belum Login...');
	document.location='home.php';
  </script>";
	exit;
  };?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile | Tangan.id</title>
</head>
<body>

<div class="header-profile" style="background-image: linear-gradient(rgba(0,0,0,0.50),rgba(0,0,0,0.50)), url(../asset/img/house.jpg); ">
	<div class="content" style="margin-top: -25vh">
            <div class="container">
            <h1 style="font-weight: 600; text-shadow: 0 5px 20px black;" align="right" >Selamat datang,<?=$profil['nama']?>!</h1>
        </div>
        </div>
</div>

<div class="container" style="margin-bottom: 20vh;">
	<div class="row custom-grid">
		<div class="col-md-4">
		<div class="kartu-info foto">
		  <img src="<?=$profil['foto']?>" class="img-fluid">
		</div>
		</div>

		<div class=" col-md-8">
			<div class="kartu-info" style="margin-bottom: 20px;">
			    <h2 class="card-text" style="margin-top: 7.5vh; font-weight: 900; font-size: 40px;text-shadow: 0 5px 20px black; " align="left"><?=$profil['nama']?></h2>
				<br>
			    <p class="card-text"><i class="fas fa-briefcase" style="margin-right: 2.5%"></i> <?=$profil['pekerjaan']?></p>
			    <p class="card-text"><i class="fas fa-map-marker-alt" style="margin-right: 3%"></i><?=$profil['alamat']?></p>
			</div>
		</div>	
  	</div>
  	<p align="right" class="tombol-tombol">
  		<a href="edit-profile.php?hal=edit&id=<?=$profil['id']?>"><i class="fas fa-user-edit" style="margin-right: 1%"></i> Edit Profile</a>
  		<a href="post-stories.php"><i class="fas fa-plus-circle" style="margin-right: 1%"></i> Add Stories</a>
  	</p>
</div>
	<h2 class="page-section-heading text-center text-uppercase text-white" style="margin-top: -10vh;">Kontribusi Anda</h2>
   	<div class="divider-custom divider-light" style="margin-top: -1vh">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="far fa-smile-beam"></i></div>
        <div class="divider-custom-line" ></div>
	</div>



<div class="container-fluid containerku-custom" >
    <!-- AWAL CARD CARD -->
	<?php 
	$querry1=mysqli_query($conn,"SELECT * FROM artikel WHERE id_akun='$profil[id]'");
	while($myArtikel=mysqli_fetch_array($querry1)):
	?>
    <div class="kartu" style="background-image: url(<?=$myArtikel['foto']?>);">
        <div class="isi">
            <h3 style="margin-bottom: 3vh;"><?=$myArtikel['judul']?></h3>
            <p class="caption" style="margin: 10px;">
                <p><i class="fas fa-user" style="margin-right: 5%;"></i> <?=$profil['nama']?></p>
                <p><i class="fas fa-calendar-day" style="margin-right: 5%;"></i> <?=$myArtikel['tanggal']?></p>
                <p><i class="fas fa-map-marker-alt" style="margin-right: 5%;"></i> <?=$myArtikel['lokasi']?></p>
            </p>
            <a href="content-owner.php?hal=show&id=<?=$myArtikel['id']?>">Review</a>
			<?php if($myArtikel['status']=="acc"){ ?>
            <!-- jika di acc -->
            <h6 style="padding-top: 40px;"><i class="far fa-check-circle" style="color: #2df21b; font-size: 40px;"></i></h6>
			<?php } else{ ?>
				<h6 style="padding-top: 40px;"><i class="fas fa-ban" style="color: red; font-size: 40px;"></i></h6>
				<?php } ?>
            <!-- Jika di tolak 
            -->
        </div>
    </div>
    <?php endwhile?>

    
</div>

<!-- BUTTON LOG-OUT -->
<div class="container">
        <br><br>
        <center><a href="/tanganid/login/logout.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-power-off show-morelink" style="color: red; font-weight: 900; font-size: 40px;"></i></a></center>
		<center><br><h4 style="color: white; text-decoration: none; ">Logout</h4></center>
	</div>
<!-- BUTTON LOG-OUT -->

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
	.custom-grid:hover{
		transform: scale(1.03);
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
