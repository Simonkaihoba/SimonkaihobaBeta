<?php
	//buat koneksi ke database
	$konek = mysqli_connect("localhost", "root", "", "dbsimonkaihoba");

	//baca data dari tabel tb_sensor
	$sql = mysqli_query($konek, "select * from tb_sensor order by id desc"); //data terakhir akan berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$kekeruhan = $data['kekeruhan'];

	//uji apabila nilai kekeruhan belum ada, maka anggap kekeruhan = 0
	if($kekeruhan == "") $kekeruhan = 0;


	//cetak nilai kekeruhan
	echo $kekeruhan;

  ?>