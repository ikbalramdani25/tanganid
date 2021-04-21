<?php include 'config.php'?>
<?php 
    $show = mysqli_query($conn,"SELECT id, id_akun, judul, tanggal, lokasi, foto FROM artikel ORDER BY tanggal ASC");
    while($data=mysqli_fetch_array($show)):
      $akun= mysqli_query($conn,"SELECT nama FROM akun WHERE id='$data[id_akun]'");
      $nama=mysqli_fetch_array($akun);
    ?>
    <?=$data['foto']?>
    <?php echo "<img src='img/$data[foto]' width='70' height='90' />";
    endwhile
    ?>

<h1 style=" color: white; font-weight: 900; margin-top: 100px;" align="center">ACTION</h1>
    	<p align="center" style="color: white; font-weight: 400; margin-top: -10px;">"Mohon Baca Dengan Teliti Sebelum Melakukan Proses Acc"</p>
    	<hr style="background-color: white">
		<select name="" class="custom-select" style="margin-bottom: 100px;">
            <option value="acc">Publikasi</option>
		  	<option value="noacc">Block</option>
        </select>