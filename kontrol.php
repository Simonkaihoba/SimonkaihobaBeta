<?php
	//buat koneksi ke database
	$koneksi = mysqli_connect("localhost", "root", "", "dbsimonkaihoba");


	//tangkap parameter status yang dikirim dari ajax
	$kontrol = $_GET['status'];
	//uji apabila nilai 
	if($kontrol == "Aktif") 
	{
		//ubah field kontrol menjadi 1
		mysqli_query($koneksi, "UPDATE tb_sensor SET kontrol=1");
		//berikan respon
		echo "Aktif";
	}
	else
	{
		//ubah field kontrol menjadi 0
		mysqli_query($koneksi, "UPDATE tb_sensor SET kontrol=0");
		//berikan respon
		echo "Non Aktif";
	}


	
  ?>