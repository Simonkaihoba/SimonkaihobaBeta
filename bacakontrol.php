<?php	
	//include koneksi
	include "koneksi.php";

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_sensor");
  	$data = mysqli_fetch_array($sql);
  	//ambil status kontrol
  	$kontrol = $data['kontrol'];

  //	respon balik ke nodemcu
  	echo $kontrol;

  ?>
