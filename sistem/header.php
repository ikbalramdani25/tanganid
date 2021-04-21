<?php
 session_start();
 include 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg  fixed-top tambahan-ku" id="mainNav">
            <div class="container-fluid" style="margin-right: 3%; margin-left: 3%;">
                <a class="navbar-brand js-scroll-trigger page-scroll" href="home.php"><img src="../asset/img/logo.png" width="120px"></a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" style="text-decoration: none;">
                    <ul class="navbar-nav ml-auto customm">
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="home.php">Beranda</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="stories.php">Stories</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="home.php#donate">Donate</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="home.php#about-us">Tentang Kami</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar  "><a class="nav-link py-3 px-0 px-lg-3 rounded sscroll" href="#contact-us">Contact Us</a></li>
                        <?php
                    if(!isset($_SESSION['login_user'])){?>
                        <li class="nav-item mx-0 mx-lg-1 "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/tanganid/login/login.php" style="background-color:#006d6d; height: ;">Login</a></li>
                    <?php } else{ ?>
                        <?php 
                        $query=mysqli_query($conn,"SELECT * FROM akun WHERE id='$_SESSION[id]'");
                        $profil=mysqli_fetch_array($query);?>
	                    
                        <li class="nav-item mx-0 mx-lg-1 profilebar"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="profile.php"><img src="<?=$profil['foto']?>"> <?=$profil['nama']?></a></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Bootstrap core JS-->
       
        
    </body>
</html>


<style type="text/css">
    .customm li{
        list-style: none;
        display: inline-block;
    }
    .garis-navbar::after{
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background-color: #fff;
        transition: width .3s;
        margin-top: -10px;
    }

    .garis-navbar:hover::after{
        width: 100%;
        transition: width .3s;
    }

    .tambahan-ku{
        background-color: transparent;
    }

    .tambahan-ku.active {
            background-color:  #3F9A74;
            -webkit-box-shadow: -2px 6px 21px -1px rgba(0,0,0,0.45);
            -moz-box-shadow: -2px 6px 21px -1px rgba(0,0,0,0.45);
            box-shadow: -2px 6px 21px -1px rgba(0,0,0,0.45);
        }

    .profilebar img{
        width: 30px;
        height: 30px;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        border-radius: 100%;
        margin-top: -5px;
        margin-right: 10px;
    }
</style>