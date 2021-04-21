<?php include 'config.php';?>



<!DOCTYPE html>
<html>
<head>
    <title>Stories | Tangan.id</title>
    <link rel="stylesheet" type="text/css" href="card-style.css">
</head>
<body style="background-color: #006D6D;">
<?php include 'header.php'; ?>

<div class="container">
    <h1 style=" color: white; font-weight: 900; margin-top: 150px;" align="center">STORIES</h1>
    <p align="center" style="color: white; font-weight: 400; margin-top: -10px;">Beyond the headlines, every environment has a story.</p>
    <hr style="background-color: white">

<form action="/action_page.php">
    <div class="row">
        <div class="col-sm-11">
            <div class="form-group">
                <input type="email" class="form-control custom-search" placeholder="masukkan kata kunci" id="email" style="border: none; border-radius:30px; padding-left: 40px;">
            </div>
        </div>
        <div class="col-sm-1">
             <button type="submit" class="btn btn-primary custom-button " style="float: right; background-color: #3F9A74; border: none; border-radius: 20px;"><i class="fas fa-search" style="width: 55px; margin: 5px;"></i></button>
        </div>
    </div>
</form>
</div>

<div class="container-fluid containerku-custom" style="margin-bottom: -200px;">
    <!-- AWAL CARD CARD -->
    <?php 
    $show = mysqli_query($conn,"SELECT id, id_akun, judul, tanggal, lokasi, foto FROM artikel WHERE status='acc' ORDER BY tanggal ASC");
    while($data=mysqli_fetch_array($show)):
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
    <?php endwhile?>
    
    <!-- AKHIR CARD -->
    
</div>

<div class="container" style="margin-top: 250px;">
        <ul class="nav justify-content-center" style="margin-top: 10px;">
          <li class="nav-item">
            <a href="#" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-left show-morelink" style="color: white; font-weight: 700; font-size: 30px; margin: 10px;"></i></a>
          </li>
          <li class="nav-item">
            <a class="nomor-halaman" style="color: white; font-weight: 700; font-size: 30px; margin: 10px; text-decoration: none;" href="#">1</a>
          </li>
          <li class="nav-item">
            <a class="nomor-halaman" style="color: white; font-weight: 700; font-size: 30px; margin: 10px; text-decoration: none;" href="#">2</a>
          </li>
          <li class="nav-item">
            <a class="nomor-halaman" style="color: white; font-weight: 700; font-size: 30px; margin: 10px; text-decoration: none;" href="#">3</a>
          </li>
          <li class="nav-item">
            <a class="nomor-halaman" style="color: white; font-weight: 700; font-size: 30px; margin: 10px; text-decoration: none;" href="#">4</a>
          </li>
          <li class="nav-item">
            <a class="nomor-halaman" style="color: white; font-weight: 700; font-size: 30px; margin: 10px; text-decoration: none;" href="#">...</a>
          </li>
          <li class="nav-item">
            <a href="#" class="show-morelink" style="color: white; text-decoration: none; "><i class="fas fa-chevron-circle-right show-morelink" style="color: white; font-weight: 700; font-size: 30px; margin: 10px;"></i></a>
                </center>
          </li>
        </ul>
</div>

<?php include 'footer.php'; ?>
</body>

</html>
