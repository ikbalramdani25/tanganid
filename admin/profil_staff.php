<?php require_once 'teamplate/header.php'?>
<?php include '../config.php'; ?>
<?php 
        $s = mysqli_query($config,"SELECT * FROM akun WHERE id='$_SESSION[id]'");
        $data = mysqli_fetch_array($s)
      ?>
<div class="container-fluid gambar"></div>
<div class="row">
    <div class="col ">
      <img src="<?=$data['foto']?>" alt="" class="img-fluid  myfoto" style=" background-color:#006d6d; widht:200px; height:200px; border-radius:100%;">
    </div>
    <div class="col fil">
      <h2><?=$data['nama'] ?></h2>
      
      <h4>Administrator  <a href="edit_profil.php?hal=edit&id=<?=$data['id']?>" style="color:white;"><i class="fas fa-edit ml-3"></i></a></h4>
    </div>
</div>
<div class="row bawah-foto">
  <div class="col">
    <h4><i class="fas fa-map-marked-alt mr-3"></i><?=$data['alamat']?></h4>
    <h4><i class="fa fa-briefcase mr-3" aria-hidden="true"></i><?=$data['pekerjaan']?></h4>
  </div>
</div>

</div>

<!-- Artikel -->
<div class="container card-artikel">
<div class="artikel">
  <h2> My Artikel</h2>
    <div class="container">
      <div class="row">
      <?php 
        $querry1=mysqli_query($config,"SELECT * FROM artikel WHERE id_akun='$data[id]'");
        while($myArtikel=mysqli_fetch_array($querry1)):
        ?>
        <div class="col-lg-4">
          <div class="card bg-light kartu-artikel">
            <img src="<?=$myArtikel['foto']?>">
            <div class="card-body">
              <h4 class="card-title" style="margin-top: 15px;"><?=$myArtikel['judul']?></h4>
                <span><i class="fa fa-user" aria-hidden="true"></i>  <?=$data['nama']?></span><br>
                <span><i class="fa fa-map-marker" aria-hidden="true"></i>  <?=$myArtikel['lokasi']?></span><br>
                <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$myArtikel['tanggal']?></span>
            </div>
              <a href="content-admin.php?hal=show&id=<?=$myArtikel['id']?>">Review</a>
          </div>
        </div>
        <?php endwhile?>
      </div>
          
        
      </div>
    </div>
</div>
</div>



  
  
    
<?php require_once 'teamplate/footer.php'?>
