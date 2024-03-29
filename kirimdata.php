<?php 
	//koneksi ke database
	$konek = mysqli_connect("localhost", "root", "", "dbsimonkaihoba");

	//baca data yang dikirim data esp32
	$suhu = $_GET['suhu'];
	$pH = $_GET['pH'];
	$kekeruhan = $_GET['kekeruhan'];

	//simpan ke tabel tb_sensor
	//auto increment = 1 / mengembalikan ID menjadi 1 apabila dikosongkan
	mysqli_query($konek, "ALTER TABLE tb_sensor AUTO_INCREMENT = 1");
	//simpan data sensor ke tabel tb_sensor
	$simpan = mysqli_query($konek, "insert into tb_sensor(suhu, pH, kekeruhan)values('$suhu', '$pH', '$kekeruhan')");

	//uji simpan untuk memberikan respon
	if($simpan)
		echo "Berhasil dikirim";
	else
		echo "Gagal terkirim";
	 ?>