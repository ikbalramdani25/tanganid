<?php include 'teamplate/header.php';?>
<?php include '../config.php';?>
<?php if (!isset($_SESSION['login'])) {
    header('location: /tanganid/login/login.php');
    exit;
} ?>

<?php
if(isset($_GET['hal'])){
  if($_GET['hal']=="hapus"){
    $hapus=mysqli_query($config,"DELETE FROM artikel WHERE id='$_GET[id]'");
		if($hapus){
			echo "<script>
              alert('artikel Berhasil dihapus');
              document.location='dashboard.php';
            </script>";
		}
		else{
			echo "<script>
              alert('artikel tidak Berhasil dihapus');
              document.location='dashboard.php';
            </script>";
		}
  }
}


  $query = "SELECT * FROM akun WHERE status!='Admin'";
  $query_run = mysqli_query($config,$query);
  $row = mysqli_num_rows($query_run);

  $query1= "SELECT * FROM artikel WHERE status='acc'";
  $query_run1 = mysqli_query($config,$query1);
  $row1 = mysqli_num_rows($query_run1);

  $query2= "SELECT * FROM artikel WHERE status='noacc'";
  $query_run2 = mysqli_query($config,$query2);
  $row2 = mysqli_num_rows($query_run2);
?>
    <!--Menu-->
    <div class="row card-dashboard">
      <div class="col-md-4 mt-5 ">
          <ul class="nav nav-pills nav-pills-primary flex-column" style="align-content: center;">
            
            <li ><a class="nav-item btn tombol" style="background-color:#3F9A74; color:white;"  href="dashboard.php" >Dashboard</a></li>
            <br><li  ><a class="nav-item btn tombol" href="create_post.php" >Create Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="pending_post.php" >Pending Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="list_user.php" >List User</a></li>
            <br><li  ><a class="nav-item btn tombol" href="add_new_staff.php" >Add New Staff</a></li>
            <br><li  ><a class="nav-item btn tombol menu" href="kotak_masuk.php" >Kotak Masuk</a></li>
          </ul>
      </div>
      <!--Akhir Menu-->
      <div class="col-md-7 ">
        <div class="card " style="border-radius: 30px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" >
          <div class="card-body "  >
            <h3 class="mb-3"><b>DASHBOARD</b></h3>
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb  bc">
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              </ol>
            </nav>
            <div class="row">
              <div class="card  ml-5 mr-4 mb-3 mt-3 kartu" style="color:white;border-radius: 30px; background-color: #3F9A74; width: 14rem; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
                <div class="card-body "  >
                    <div class="card-body-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                  <center><img src="asset/img/profile.png" width="100px" alt="">
                  <br><div class="display-4"><b><?=$row?></b></div>
                  <h5 class="card-title">Total User</h5>
                </center>
                </div>
              </div>
              <div class="card  ml-5 mr-4 mb-3 mt-3 kartu" style="color:white;border-radius: 30px; background-color: #3F9A74; width: 14rem; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
                <div class="card-body ">
                    <div class="card-body-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                  <center><img src="asset/img/post success.png" class="gbr" width="100px" alt="">
                  <div class="display-4"><b><?=$row1?></b></div>
                  <h5 class="card-title">Total Uploaded</h5>
                </center>
                </div>
              </div>
              <div class="card  ml-5 mr-4 mb-3 mt-3 kartu" style="color:white;border-radius: 30px; background-color: #3F9A74; width: 14rem; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
                  <div class="card-body ">
                      <div class="card-body-icon">
                          <i class="fas fa-check-circle"></i>
                      </div>
                      <center><img src="asset/img/pending.png" class="gbr" width="100px" alt="">
                        <div class="display-4"><b><?=$row2?></b></div>
                        <h5 class="card-title">Pending Post</h5>
                      </center>
                  </div>
              </div>
            </div>
            <br><br>
            <center><h4>LIST ARTIKEL</h4></center>
            <br>
            <table class="table table-striped">
              <thead class="thead text-center">
                <tr>
                  <th scope="col">Tanggal Post</th>
                  <th scope="col">Judul Artikel</th>
                  <th scope="col">Penulis</th>
                  <th colspan="2" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php
                  $query3=mysqli_query($config,"SELECT * FROM artikel WHERE status='acc'");
                  while($query3_run=mysqli_fetch_array($query3)):
                    $query4=mysqli_query($config,"SELECT * FROM akun WHERE id='$query3_run[id_akun]'");
                    $akun=mysqli_fetch_array($query4);
                  ?>
                  <th scope="row"><?=$query3_run['tanggal']?></th>
                  <td><?=$query3_run['judul']?></td>
                  <td><?=$akun['nama']?></td>
                  <td><a href="dashboard.php?hal=hapus&id=<?=$query3_run['id']?>"><img src="asset/img/delete.png" alt="hapus" width="30px"></a></td>
                  <td><a href="review-content-user.php?hal=show&id=<?=$query3_run['id']?>" type="button" class="btn btn-warning">Edit</a></td>
                </tr>
                <?php endwhile ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>   
    </div>

<?php require_once 'teamplate/footer.php'?>
    