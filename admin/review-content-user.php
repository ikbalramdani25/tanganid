<?php include '../config.php'?>
<?php
if(isset($_POST['acc'])){
	$status=$_POST['status'];
	$acc=mysqli_query($config,"UPDATE artikel SET status='$status' WHERE id='$_GET[id]'");
	if($acc){
		echo "<script>
              alert('Status Artikel berhasil diubah');
              document.location='dashboard.php';
            </script>";
	}
	else{
		echo "<script>
              alert('Status Artikel gagal diubah');
              document.location='dashboard.php';
            </script>";
	}
}
if(isset($_GET['hal'])){
	if($_GET['hal']=="show"){
		$query=mysqli_query($config,"SELECT * FROM artikel WHERE id='$_GET[id]'");
		$artikel=mysqli_fetch_array($query);
		$query1=mysqli_query($config,"SELECT * FROM akun WHERE id='$artikel[id_akun]'");
		$akun=mysqli_fetch_array($query1);
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="asset/css/admin.css">
	    <link href="/assets/css/material-kit.min.css?v=2.2.0" rel="stylesheet" />
	    <link rel="shortcut icon" href="asset/img/Logotanganidfix.ico">
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="../asset/css/bootstrap-styles.css" rel="stylesheet" />
        <link href="../asset/css/card-style.css" rel="stylesheet" />
        <link href="../asset/css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <link rel="icon" type="image/x-icon" href="../asset/img/icon-tanganid.ico">
    
    <title>ADMIN|TANGAN.ID</title>
  </head>
  <body class="body">
    <!--Header --> 
    <header>
      <nav class="navbar navbar-expand-sm fixed-top" style="background-color: #3F9A74;">
          <a class="navbar-brand" href="#">
              <img src="asset/img/emblem.png" width="200px"  alt="logo" style="padding-left: 20px;">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbar-list-4">
              <ul class="navbar-nav ml-auto" >
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                  <img src="<?=$akun['foto']?>" width="40" height="40" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                    <a class="dropdown-item" href="profil_staff.php">My Profile</a>
                    <a class="dropdown-item" href="#">Log Out</a>
                  </div>
                </li> 
              </ul>
              <h5 style="color: white;"><?=$akun['nama']?></h5>
          </div>
      </nav>
    </header>
    <!--Akhir Header -->

	<div class="jumbotron-ku" style="background-image: linear-gradient(rgba(0,0,0,0.50),rgba(0,0,0,0.50)), url(<?=$artikel['foto']?>); ">
		 <div class="content" style="margin-top: -20vh;">
	            <div class="container">
	            <h2 style="font-weight: 600; font-size: 5vh; text-shadow: 0 5px 10px black;" align="center" ><?=$artikel['judul']?></h2>
	        </div>
	        </div>
	</div>

	<div class="container">
		 	<div class="row custom-grid">
			<div class=" col-md-4">
			<div class="kartu-info" >
			  <div class="card-body" style="background-color: transparent; text-align: center;">
			    <h5 class="card-title"><i class="fas fa-user" style="font-size: 50px;"></i></h5>
			    <p class="card-text" style="margin-top: 20px;"><?=$akun['nama']?></p>
			  </div>
			</div>
			    </div>

			<div class="col-md-4">
			<div class="kartu-info" >
			  <div class="card-body" style="background-color: transparent; text-align: center;">
			    <h5 class="card-title"><i class="fas fa-calendar-day" style="font-size: 50px;"></i></h5>
			    <p class="card-text" style="margin-top: 20px;"><?=$artikel['tanggal']?></p>
			  </div>
			</div>
			    </div>

			<div class="col-md-4">
			<div class="kartu-info" >
			  <div class="card-body" style="background-color: transparent; text-align: center;">
			    <h5 class="card-title"><i class="fas fa-map-marker-alt" style="font-size: 50px;"></i></h5>
			    <p class="card-text" style="margin-top: 20px;"><?=$artikel['lokasi']?></p>
			  </div>
			</div>
			</div>
	  	</div>

	  	<div class="isi-konten" align="justify">
	  		<p>
	  		<?=$artikel['isi']?>
		  </p>
	  	</div>
	  	
	  	<h1 style=" color: white; font-weight: 900; margin-top: 100px;" align="center">ACTION</h1>
    	<p align="center" style="color: white; font-weight: 400; margin-top: -10px;">"Mohon Baca Dengan Teliti Sebelum Melakukan Proses Acc"</p>
    	<hr style="background-color: white">
		<form action="" method="post">
		<select name="status" class="custom-select" style="margin-bottom: 50px;">
            <option value="acc">Publikasi</option>
		  	<option value="noacc">Block</option>
        </select>
		<button type="submit" class="btn btn" name="acc" style="background-color:#3f9a74 ; color: white; float:right; border-radius:20px; width:90px">Update</button>
		</form>
	  	<br><br>
	    <center><a href="profil_staff.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-left show-morelink" style="color: white; font-weight: 900; font-size: 50px;"></i></a></center>



	</div>

	<!--Footer-->
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3f9a74" fill-opacity="1" d="M0,64L24,74.7C48,85,96,107,144,101.3C192,96,240,64,288,69.3C336,75,384,117,432,149.3C480,181,528,203,576,181.3C624,160,672,96,720,64C768,32,816,32,864,42.7C912,53,960,75,1008,112C1056,149,1104,203,1152,224C1200,245,1248,235,1296,213.3C1344,192,1392,160,1416,144L1440,128L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg>
	    <div class="container-aja" style="margin-top: -75px; margin-left: 30px;">
	      <div class="row text-left">
	        <div class="col">
	          <h5 style="color: white;">&copy Copyright Tangan.id- 2021</h5>
	        </div>
	      </div>
	    </div>
	    <!--Akhir Footer-->
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	    <script src="https://kit.fontawesome.com/45c557896d.js" crossorigin="anonymous"></script>
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