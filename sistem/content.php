
<?php
include 'config.php';
if(isset($_GET['hal'])){
    if($_GET['hal']=="show"){
        $conten=mysqli_query($conn,"SELECT id_akun, judul, tanggal, lokasi,foto,isi FROM artikel WHERE id ='$_GET[id]'");
		$data=mysqli_fetch_array($conten);
		$akun=mysqli_query($conn,"SELECT nama FROM akun WHERE id ='$data[id_akun]'");
		$nama=mysqli_fetch_array($akun);
		

    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Content | Tangan.id</title>
</head>
<body>

<?php include 'header.php'; 


?>

<div class="jumbotron-ku" style="background-image: url(<?=$data['foto']?>);">
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
		    <p class="card-text" style="margin-top: 20px;"><?=$nama['nama'];?></p>
		  </div>
		</div>
		    </div>

		<div class="col-md-4">
		<div class="kartu-info" >
		  <div class="card-body" style="background-color: transparent; text-align: center;">
		    <h5 class="card-title"><i class="fas fa-calendar-day" style="font-size: 50px;"></i></h5>
		    <p class="card-text" style="margin-top: 20px;"><?=$data['tanggal'];?></p>
		  </div>
		</div>
		    </div>

		<div class="col-md-4">
		<div class="kartu-info" >
		  <div class="card-body" style="background-color: transparent; text-align: center;">
		    <h5 class="card-title"><i class="fas fa-map-marker-alt" style="font-size: 50px;"></i></h5>
		    <p class="card-text" style="margin-top: 20px;"><?=$data['lokasi'];?></p>
		  </div>
		</div>
		</div>
  	</div>

  	<div class="isi-konten" align="justify">
  		<p>
  		<?=$data['isi'];?>
	  </p>
  	</div>
  	

  	<br><br>
  	<hr style="background-color: white;">
  	<h4 style="font-weight: 600; font-size: 2vh; color: white; margin-bottom: 5vh;" align="center" >Comments Section</h4>
  	<?php 
	if(isset($_GET['hal'])){
		if($_GET['hal']=="show"){
			$query=mysqli_query($conn,"SELECT * FROM komentar WHERE id_artikel='$_GET[id]'");
		}
	}
	while($komen=mysqli_fetch_array($query)):
			$fotoKomen=mysqli_query($conn,"SELECT foto,nama FROM akun WHERE id='$komen[id_akun]'");
			$fotoKomen_run=mysqli_fetch_array($fotoKomen);
	?>
	<div class="bubble-list">
		<div class="bubble clearfix">
		<img src="<?=$fotoKomen_run['foto']?>" alt="">
			<div class="bubble-content">
				<div class="point"></div>
				<p><i class="fas fa-user" style="margin-right: 1%;"></i> <b><?=$fotoKomen_run['nama']?></b></p>
				<p align="justify"><?=$komen['isi_komen']?></p>
				<p align="right" style="color: gray; margin-top: -2vh; margin-right: 1vh; margin-bottom: -0.2vh"><i class="fas fa-clock" style="margin-right: 1%;"></i><i><?=$komen['tanggal']?></i></p>
				
			</div>
		</div>
	</div>
	<?php endwhile?>
	
	<form method="post">
		<h4 style="font-weight: 600; font-size: 2vh; color: white;" align="left" >Add Comment</h4>
	    <br>
	        <div class="form-group" style="margin-top: -20px;">
	            <textarea class="form-control" placeholder="Masukkan Komentar" name="komentar" style="border: none;"></textarea>
	        </div><br>
	            <button type="submit" name="send" class="btn btn-primary custom-mail" style="float: right; background-color: #3F9A74; border: none; border-radius: 20px; margin-top: -20px; ">Send</button>
	</form>


  	<br><br>
    <center><a href="stories.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-left show-morelink" style="color: white; font-weight: 900; font-size: 50px;"></i></a></center>



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


</style>