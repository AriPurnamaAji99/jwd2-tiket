<?php
include '../koneksi.php';
$idanggota = $_POST['idanggota'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$klsbus = $_POST['klsbus'];
$tgl = $_POST['tgl'];
$jml1 = $_POST['jml1'];
$jml2 = $_POST['jml2'];
$harga = $_POST['harga'];
$totalbayar = $_POST['totalbayar'];


if (isset($_POST['simpan'])) {
	extract($_POST);

	$nama_file   = $_FILES['foto']['name'];
	if (!empty($nama_file)) {
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file 	= $_FILES['foto']['tmp_name'];
		$tipe_file 		= pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto 		= $id_anggota . "." . $tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder 		= "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file, "$folder");
	} else
		$file_foto = "-";


	// code untuk memilih kelas penumpang dengan ketentuan harga ekonomi=50k, bisnis=100k, eksekutif=200k
	// switch ($klsbus) {
	// 	case 'ekonomi':
	// 		$harga = 50000;
	// 		$hargadiskon = 40000;
	// 		break;
	// 	case 'bisnis':
	// 		$harga = 100000;
	// 		$hargadiskon = 90000;
	// 		break;
	// 	case 'eksekutif':
	// 		$harga = 200000;
	// 		$hargadiskon = 190000;
	// 		break;
	// }

	// $jml1 = $_POST['jml1'] * $harga;
	// $jml2 = $_POST['jml2'] * $harga * 0.1;
	// $totalbayar = $jml1 + $jml2;

	// operasi untuk menghitung diskon 10% bagi penumpang lansia
	// $jml1 = $_POST['jml1'];
	// $jml2 = $_POST['jml2'];
	// $totalbayar = ($jml1 * $harga) + ($jml2 * $hargadiskon);

	// code untuk menyimpan data ke database dbtiket
	$sql = "INSERT INTO tbanggota VALUES('$idanggota','$nama','$nohp','$klsbus','$tgl','$jml1','$jml2','$file_foto','$harga','$totalbayar')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=tiket");
}
