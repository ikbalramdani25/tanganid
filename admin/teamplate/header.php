<?php session_start();?>
<?php include '../config.php'; ?>
<?php 
        $s = mysqli_query($config,"SELECT * FROM akun WHERE id='$_SESSION[id]'");
        $data = mysqli_fetch_array($s)
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
    
    <title>ADMIN|TANGAN.ID</title>
  </head>
  <body class="body">
    <!--Header --> 
    <header>
      <nav class="navbar navbar-expand-sm fixed-top" style="background-color: #3F9A74;">
          <a class="navbar-brand" href="../admin/dashboard.php">
              <img src="asset/img/emblem.png" width="200px"  alt="logo" style="padding-left: 20px;">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbar-list-4">
              <ul class="navbar-nav ml-auto" >
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                  <img src="<?=$data['foto']?>" width="40" height="40" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                    <a class="dropdown-item" href="profil_staff.php">My Profile</a>
                    <a class="dropdown-item" href="/tanganid/login/logout.php">Log Out</a>
                  </div>
                </li> 
              </ul>
              <h5 style="color: white;"><?=$data['nama'] ?></h5>
          </div>
      </nav>
    </header>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3f9a74" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,64C384,75,480,117,576,112C672,107,768,53,864,58.7C960,64,1056,128,1152,165.3C1248,203,1344,213,1392,218.7L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <!--Akhir Header -->