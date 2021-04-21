<?php require_once 'teamplate/header.php'?>
    <!--Menu-->
    <div class="row card-dashboard">
      <div class="col-md-4 mt-5">
          <ul class="nav nav-pills nav-pills-primary flex-column" style="align-content: center;">
            <li ><a class="nav-item btn tombol"  href="dashboard.php" >Dashboard</a></li>
            <br><li  ><a class="nav-item btn tombol" href="create_post.php" >Create Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="pending_post.php" >Pending Post</a></li>
            <br><li  ><a class="nav-item btn tombol" href="list_user.php" >List User</a></li>
            <br><li  ><a class="nav-item btn tombol" href="add_new_staff.php" >Add New Staff</a></li>
            <br><li  ><a class="nav-item btn tombol menu" style="background-color:#3F9A74; color:white;"  href="kotak_masuk.php" >Kotak Masuk</a></li>
          </ul>
      </div>
      <!--Akhir Menu-->
      <div class="col-md-7 ">
        <div class="card " style="padding-bottom: 150px;border-radius: 30px; box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);" >
          <div class="card-body "  >
            <h3 class="mb-3"><b>KOTAK MASUK</b></h3>
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb  bc">
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                  <li class="breadcrumb-item"><a href="/">Kotak Masuk</a></li>
              </ol>
            </nav>
            <br><br>
            <br><br>
            <center>
              <h6 style="margin-bottom: 30px;">Untuk mengakses kotak masuk, kunjungi link di bawah ini</h6>
              <a class="btn-lg btnn" href="https://docs.google.com/spreadsheets/d/1G2zrsKiRt2Epbx0sVNvFzJPt8L8WgFdVh5e0TOfQo54/edit?usp=sharing" role="button" style="background-color:#3f9a74; color: white; text-decoration: none;">Open</a>
            </center>
        </div>
      </div>   
    </div>
<?php require_once 'teamplate/footer.php'?>