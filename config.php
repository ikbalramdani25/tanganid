<?php
	$config = mysqli_connect("localhost","root","","tanganid");
	if(mysqli_connect_error()){
		echo "Koneksi Ke Database ".mysqli_connect_error();
	}