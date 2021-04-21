<?php require_once 'teamplate/header.php'?>
<?php include '../config.php'?>
<?php
if(isset($_GET['hal'])){
  if($_GET['hal']=="hapus"){
    $hapus=mysqli_query($config,"DELETE FROM akun WHERE id='$_GET[id]'");
		if($hapus){
			echo "<script>
              alert('akun Berhasil dihapus');
              document.location='list_user.php';
            </script>";
		}
		else{
			echo "<script>
              alert('akun tidak Berhasil dihapus');
              document.location='list_user.php';
            </script>";
		}
  }
}

?>
    <!--Menu-->
    <div class="row card-dashboard" >
      <div class="col-md-4 mt-5">
          <ul class="nav nav-pills nav-pills-primary flex-column" style="align-content: center;">
            <li ><a class="nav-item btn tombol"  href="dashboard.php" >Dashboard</a></li>
            <br><li  ><a class="nav-item btn tombol" href="create_post.php" >Create Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="pending_post.php" >Pending Post</a></li>
            <br><li  ><a class="nav-item btn tombol" style="background-color:#3F9A74; color:white;"  href="list_user.php" >List User</a></li>
            <br><li  ><a class="nav-item btn tombol" href="add_new_staff.php" >Add New Staff</a></li>
            <br><li  ><a class="nav-item btn tombol menu" href="kotak_masuk.php" >Kotak Masuk</a></li>
          </ul>
      </div>
      <!--Akhir Menu-->
      <div class="col-md-7 ">
        <div class="card " style="border-radius: 30px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" >
          <div class="card-body "  >
            <h3 class="mb-3"><b>LIST USER</b></h3>
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb  bc">
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                  <li class="breadcrumb-item"><a href="/">List User</a></li>
              </ol>
            </nav>
            <br><br>
            <br>
            <table class="table table-striped">
              <thead class="thead text-center">
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Status Akun</th>
                  <th scope="col">Pekerjaan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query1=mysqli_query($config,"SELECT * FROM akun WHERE status!='Admin'");
                
                while($akun=mysqli_fetch_array($query1)):
                ?>
                <tr>
                  <th scope="row"><?=$akun['nama']?></th>
                  <td><?=$akun['status']?></td>
                  <td><?=$akun['pekerjaan']?></td>
                  <td class="text-center"><a href="list_user.php?hal=hapus&id=<?=$akun['id']?>"><img src="asset/img/delete.png" alt="hapus" width="30px"></a></td>
                </tr>
                <?php endwhile?>
              </tbody>
            </table>
        </div>
      </div>   
    </div>
<?php require_once 'teamplate/footer.php'?>
