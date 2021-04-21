<?php include 'config.php';
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
        <title>Homepage | Tangan.id</title>
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
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg  fixed-top tambahan-ku" id="mainNav">
            <div class="container-fluid" style="margin-right: 3%; margin-left: 3%;">
                <a class="navbar-brand js-scroll-trigger page-scroll" href="home.php"><img src="../asset/img/logo.png" width="120px"></a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" style="text-decoration: none;">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded sscroll" href="#home">Beranda</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded sscroll" href="#stories">Stories</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded sscroll" href="#donate">Donate</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded sscroll" href="#about-us">Tentang Kami</a></li>
                        <li class="nav-item mx-0 mx-lg-1 garis-navbar "><a class="nav-link py-3 px-0 px-lg-3 rounded sscroll" href="#contact-us">Contact Us</a></li>
                        <!-- Jika belum Login 
                         -->
                         <?php
                    if(!isset($_SESSION['login_user'])){?>
                        <li class="nav-item mx-0 mx-lg-1 "><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/tanganid/login/login.php" style="background-color:#006d6d; height: ;">Login</a></li>
                    <?php } else{ ?>
                        <?php 
                        $query=mysqli_query($conn,"SELECT * FROM akun WHERE id='$_SESSION[id]'");
                        $profil=mysqli_fetch_array($query);?>
                        <li class="nav-item mx-0 mx-lg-1 profilebar"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="profile.php"><img src="<?=$profil['foto']?>"> <?=$profil['nama']?></a></li>
                    <?php } ?>
                        <!-- Jika Sudah Login -->
                        
                    </ul>
                </div>
            </div>
        </nav>


<!-- END NAVBAR -->

    <div class="banner" id="home">
        <div class="content" style="margin-top: -50px">
            <div class="container">
            <h1><img src="../asset/img/text-tangan.png" width="600" class="img-fluid"></h1>
            <h6 style="font-weight: 600" >Jadilah Pelindung Dunia dan Bergerak Untuk Dunia</h6>
            <input type="text" placeholder="Masukkan Keyword" class="cari custom-search">
            <button type="submit" class="btn custom-button " style=" background-color: #3F9A74; border: none; border-radius: 20px;"><i class="fas fa-search" style="width: 55px; margin: 5px;"></i></button>
        </div>
        </div>
    </div>

    
<!-- Artikel-preview -->
<div class="container" id="stories">
    <h2 style=" color: white; font-weight: 900; padding-top: 20vh;" align="center">The latest Stories and information</h2>
        <p align="center" style="color: white; font-weight: 400; ">Beyond the headlines, every environment has a story.</p>
    <hr style="background-color: white">
</div>

<div class="container containerku-custom" style="margin-bottom: 10px;">
    <!-- AWAL CARD CARD -->
    <?php 
    $no=1;
    $show = mysqli_query($conn,"SELECT id, id_akun, judul, tanggal, lokasi, foto FROM artikel WHERE status='acc' ORDER BY tanggal ASC ");
    while($data=mysqli_fetch_array($show) and $no<=3):
      $akun= mysqli_query($conn,"SELECT nama FROM akun WHERE id='$data[id_akun]'");
      $nama=mysqli_fetch_array($akun);
    ?>
    <div class="kartu" style="background-image: url(<?=$data['foto']?>);">
        <div class="isi">
            <h3><?=$data['judul']?></h3>
            <p class="caption" style="margin: 10px;">
                <p><i class="fas fa-user" style="margin-right: 5%;"></i> <?=$nama['nama']?></p>
                <p><i class="fas fa-calendar-day" style="margin-right: 5%;"></i> <?=$data['tanggal']?></p>
                <p><i class="fas fa-map-marker-alt" style="margin-right: 5%;"></i> <?=$data['lokasi']?></p>
            </p>
            <a href="content.php?hal=show&id=<?=$data['id']?>">Read More</a>
        </div>
    </div>
    <?php 
    $no+=1;
    endwhile?>
<!-- MAX CARD DI HOME 3 AJA -->

    <br><br>
        <center><a href="stories.php" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-right show-morelink" style="color: white; font-weight: 900; font-size: 50px; "></i></a></center>
    <!-- AKHIR CARD -->
    <div class="container">
        
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3f9a74" fill-opacity="1" d="M0,256L48,240C96,224,192,192,288,197.3C384,203,480,245,576,250.7C672,256,768,224,864,218.7C960,213,1056,235,1152,250.7C1248,267,1344,277,1392,282.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

        <section class="page-section text-white mb-0" id="donate" style="background-color: #3F9A74;   padding-top: 20vh; padding-bottom: 2vh;">
            <div class="container">
                <br><br>
                <h2 class="page-section-heading text-center text-uppercase text-white"><i class="fas fa-donate"></i> DONATE</h2>
                <hr style="background-color: white; margin-bottom: 50px;" >
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-12 ml-auto"><p class="lead" align="center">"memberi tidak hanya tentang donasi, tetapi membuat suatu perubahan.</p> 
                    <p align="center" class="lead" style="margin-top: -10px;">perubahan dimulai dari kita sendiri."</p>
                    <p align="center" style="margin-top: -10px; font-size: 25px;"><b>let's donate now!</b></p></div>
                </div>
                <p align="center"><a class="donate-custom" href="https://kitabisa.com/">
                        <img src="../asset/img/kitabisa.png">
                    </a></p><br>
            </div>
        </section>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3f9a74" fill-opacity="1" d="M0,256L30,229.3C60,203,120,149,180,138.7C240,128,300,160,360,149.3C420,139,480,85,540,69.3C600,53,660,75,720,101.3C780,128,840,160,900,154.7C960,149,1020,107,1080,101.3C1140,96,1200,128,1260,165.3C1320,203,1380,245,1410,266.7L1440,288L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path></svg>


<!-- About US-->  
  <section class="page-section bg text-white mb-0" id="about-us" style="background-color: #006D6D; padding-top: 20vh; margin-top: -70px;">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-white">About Us!</h2>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-users"></i></div>
                    <div class="divider-custom-line" ></div>
                </div>
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <h4 align="center">Who We Are?</h4>
                        <p class="lead" align="justify">Tangan.id adalah organisasi yang bergerak dalam bidang lingkungan. Kami memberikan tempat untuk berbagi informasi baik dari para penggiat lingkungan maupun masyarakat. Informasi tersebut diharapkan dapat memberi pengertian, kesadaran, dan kepedulian terhadap satu sama lain. Sehingga, keseimbangan lingkungan dapat terjaga.</p>
                    </div>
                    <div class="col-lg-6 mr-auto">
                        <h4 align="center">What We Do?</h4>
                        <p class="lead" align="justify">Kami disini memberikan informasi kepada masyarakat bahwa semakin lama, lingkungan semakin rusak akibat perbuatan manusia atau alam itu sendiri. Selain itu, kami melakukan kampanye untuk menjaga lingkungan salahsatunya dengan berkampanye melalui website ini. Kami juga melakukan penggalangan dana yang akan digunakan untuk melestarikan alam, memelihara lingkungan, dan untuk menolong teman-teman kita yang sedang terdampak bencana alam.</p>
                    </div>
                </div>
                <!-- PROFILE KITA-->
                 <h3 align="center" style="margin-top: 5vh; margin-bottom: 2vh;">Our Profile</h3>
                        <div class="profile-about">
                            <div class="kartuku" style="background-image: url(../asset/img/rifdo-round.png);">
                                  <div class="isi">
                                      <p>RIFDO SHAH ALAM </p>
                                      <a href="https://instagram.com/rifdoalam" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </div>
                              </div>

                              <div class="kartuku" style="background-image: url(../asset/img/ikbal-round.png);">
                                  <div class="isi">
                                      <p>IKBAL RAMDANI</p>
                                      <a href="https://instagram.com/ikbalramdani12" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </div>
                              </div>
                            
                            
                              <div class="kartuku" style="background-image: url(../asset/img/mahaasin-round.png);">
                                  <div class="isi">
                                      <p>HABIB IRFAN MAHAASIN</p>
                                      <a href="https://instagram.com/mahaasinn" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </div>
                            </div>


                              <div class="kartuku" style="background-image: url(../asset/img/rizky-round.png);">
                                  <div class="isi">
                                      <p>MUHAMMAD RIZKY WIBOWO</p>
                                      <a href="https://instagram.com/mrizkyw1310" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </div>
                              </div>
                            
                            
                              <div class="kartuku" style="background-image: url(../asset/img/coco-round.png);">
                                  <div class="isi">
                                      <p>BERLIANA PUTRI BUWONO</p>
                                      <a href="https://instagram.com/lia_buwono07" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </div>
                              </div>
                            
                            
                              <div class="kartuku" style="background-image: url(../asset/img/faris-round.png);">
                                  <div class="isi">
                                      <p>ALFARIDZI MUHAMMAD A.</p>
                                      <a href="https://instagram.com/farizariefani" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </div>
                              </div>
                          </div>
                    </div>
                </section>
        <?php include 'footer.php'; ?>

        
    <!-- HOVER dan profile-->
        <style type="text/css">

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


            /* PROFILE FOTO */
            .profile-about{
              position: relative;
              display: flex;
              justify-content: center;
              align-items: center;
              flex-wrap: wrap;
              z-index: 1;
              max-width: 1200px;


            }

            .profile-about .kartuku{
              position: relative;
              width: 300px;
              height: 300px;
              margin: 10px;
              display: flex;
              border-radius: 100%;
              background: rgba(255, 255, 255, 0.1);
              overflow: hidden;
              display: flex;
              justify-content: center;
              align-items: center;
              background-filter:blur(5px);
              background-size: cover;
              padding: 5px;

            }



            .profile-about .kartuku .isi{
              padding: 20px;
              text-align: center;
              transform: translateY(100px);
              opacity: 0;
              transition: 0.5s;
            }

            .profile-about .kartuku:hover .isi{
              transform: translateY(0px);
              opacity: 1;

            }

            .profile-about .kartuku .isi p{
              font-size: 1em;
              font-weight: 600;
              color: white;
              text-align: left;
              font-family: 'Poppins', sans-serif;
              margin-top: 70px;
            }

            .profile-about .kartuku .isi a{
              position: relative;
              display: inline-block;
              padding: 8px 20px;
              margin-top: 20px;
              background-color: #fff;
              color: #000;
              border-radius: 20px;
              text-decoration: none;
              font-weight: 500;
              box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
              transition: transform .5s;

            }


            .profile-about .kartuku .isi a:hover{
              transform: scale(1.1);
              box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
              background-color: #3F9A74;
              color: white;
            }

            .donate-custom img{
                width: 150px;
                transition: transform .5s;
                margin-top: 50px;
                background-color: #006D6D;
                border-radius: 30px;
                padding: 10px;
                box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
            }
            .donate-custom img:hover{
                transform: scale(1.4);
            }
            </style>
        </body>
</html>
