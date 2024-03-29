<?php
	//buat koneksi ke database
	$konek = mysqli_connect("localhost", "root", "", "dbsimonkaihoba");

	//baca data dari tabel tb_sensor
	$sql = mysqli_query($konek, "select * from tb_sensor order by id desc"); //data terakhir akan berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$pH = $data['pH'];

	//uji apabila nilai pH belum ada, maka anggap pH = 0
	if($pH == "") $pH = 0;


	//cetak nilai pH
	echo $pH;

  ?>