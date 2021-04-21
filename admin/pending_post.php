<?php require_once 'teamplate/header.php'?>
<?php include '../config.php'?>
    <!--Menu-->
    <div class="row card-dashboard">
      <div class="col-md-4 mt-5">
          <ul class="nav nav-pills nav-pills-primary flex-column" style="align-content: center;">
            <li ><a class="nav-item btn tombol"  href="dashboard.php" >Dashboard</a></li>
            <br><li  ><a class="nav-item btn tombol" href="create_post.php" >Create Post</a></li>
            <br><li  ><a class="nav-item btn tombol" style="background-color:#3F9A74; color:white;"  href="pending_post.php" >Pending Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="list_user.php" >List User</a></li>
            <br><li  ><a class="nav-item btn tombol" href="add_new_staff.php" >Add New Staff</a></li>
            <br><li  ><a class="nav-item btn tombol menu" href="kotak_masuk.php" >Kotak Masuk</a></li>
          </ul>
      </div>
      <!--Akhir Menu-->
      <div class="col-md-7 ">
        <div class="card " style="border-radius: 30px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" >
          <div class="card-body "  >
            <h3 class="mb-3"><b>PENDING POST</b></h3>
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb  bc">
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                  <li class="breadcrumb-item"><a href="/">Pending Post</a></li>
              </ol>
            </nav>
            <br><br>
            <center><h4>PENDING LIST</h4></center>
            <br>
            <table class="table table-striped">
              <thead class="thead text-center">
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Judul Artikel</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $query=mysqli_query($config,"SELECT * FROM artikel WHERE status='noacc'");
                  while($query_run=mysqli_fetch_array($query)):
                    $query1=mysqli_query($config,"SELECT * FROM akun WHERE id='$query_run[id_akun]'");
                    $akun=mysqli_fetch_array($query1);
                  ?>
                <tr>
                  <th scope="row"><?=$akun['nama']?></th>
                  <td><?=$query_run['judul']?></td>
                  <td class="text-center"><img src="asset/img/tolak.png" alt="uploaded" width="30px"></td>
                  <td class="text-center"><a href="review-content-user.php?hal=show&id=<?=$query_run['id']?>" class="btn btnn" style="background-color:#3f9a74 ; color: white;" >Review</a></td>
                </tr>
                <?php endwhile?>
              </tbody>
            </table>
        </div>
      </div>   
    </div>

<?php require_once 'teamplate/footer.php'?>