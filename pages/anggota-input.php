<?php
$id = $_GET['id'];
$q_tampil_tiket = mysqli_query($db, "SELECT * FROM hrgtiket WHERE id='$id'");
$r_tampil_tiket = mysqli_fetch_array($q_tampil_tiket);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pemesanan Tiket</title>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div id="label-page">
			<h3>Form Pemesanan</h3>
		</div>
		<div id="content">
			<form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
				<table id="tabel-input">
					<tr>
						<td class="label-formulir">Upload Foto Anda</td>
						<td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border" required></td>
					</tr>
					<tr>
						<td class="label-formulir">Nama Lengkap</td>
						<td class="isian-formulir"><input type="text" name="nama" class="form-control" required></td>
					</tr>
					<tr>
						<td class="label-formulir">Nomer Identitas</td>
						<td class="isian-formulir"><input type="text" name="idanggota" class="form-control" required minlength="16" maxlength="16" required></td>
					</tr>
					<tr>
						<td class="label-formulir">No. HP</td>
						<td class="isian-formulir"><input type="number" name="nohp" class="form-control" required></td>
					</tr>
					<tr>
						<td class="label-formulir">Kelas Penumpang</td>
						<td class="isian-formulir">
							<input type="hidden" name="klsbus" id="kelas" value="<?= $r_tampil_tiket['nama_kelas']; ?>">
							<select class="form-control" id="kelas_bus" onchange="getSelect()" disabled>
								<option value="<?= $r_tampil_tiket['nama_kelas']; ?>"><?= $r_tampil_tiket['nama_kelas']; ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label-formulir">Jadwal Keberangkatan</td>
						<td class="isian-formulir"><input type="date" name="tgl" class="form-control" required></td>
					</tr>
					<tr>
						<td class="label-formulir">Jumlah Penumpang</td>
						<td class="isian-formulir"><input type="number" name="jml1" id="jml_penumpang" class="form-control" required></td>
					</tr>
					<tr>
						<td class="label-formulir">Jumlah Penumpang Lansia</td>
						<td class="isian-formulir"><input type="number" name="jml2" id="jml_lansia" class="form-control" required></td>
					</tr>
					<tr>
						<td class="label-formulir">Harga Tiket</td>
						<td class="isian-formulir"><input type="number" id="harga" class="form-control" value="<?= $r_tampil_tiket['harga_tiket']; ?>" disabled>
							<input type="hidden" id="harga" name="harga" value="<?= $r_tampil_tiket['harga_tiket']; ?>">
						</td>
					</tr>
					<tr>
						<td class="label-formulir">Harga Total</td>
						<td class="isian-formulir"><input type="number" name="totalbayar" id="totalbayar" class="form-control" readonly></td>
					</tr>
					<tr>
						<td class="label-formulir"></td>
						<td><input type="checkbox" name="ceklis" id="check" onclick="validasi()"> saya dan/atau rombongan telah membaca, memahami, dan setuju, berdasarkan syarat dan ketentuan yang telah
							ditetapkan</td>
					</tr>
					<tr>
						<td class="label-formulir"></td>
						<td class="isian-formulir">
							<input type="button" name="cek" value="Hitung Total Bayar" class="btn btn-secondary" onclick="hitung()"> &nbsp;
							<input type="submit" name="simpan" value="Pesan Tiket" class="btn btn-secondary" id="btn" disabled="true"> &nbsp;
							<a href="index.php?p=tiket" type="button" value="Reset" class="btn btn-secondary">Cancel</a>
						</td>
					</tr>
				</table>
			</form>

		</div>
	</div>

	<script>
		// untuk memilih kelas bus berdasarkan dropdown
		function getSelect() {
			let selectedValue = document.getElementById('kelas_bus').value;
			console.log(selectedValue);
			// let harga = document.getElementById('harga');

		}

		// rumus untuk mengitung harga non lansia dan harga untuk diatas lansia dengan ketentuan lansia mendapatkan diskon 10%
		function hitung() {
			let jml_penumpang = document.getElementById('jml_penumpang').value;
			let jml_lansia = document.getElementById('jml_lansia').value;
			let harga = document.getElementById('harga').value;
			let totalbayar = document.getElementById('totalbayar');

			let harga_non_lansia = parseInt(jml_penumpang) * parseInt(harga); // harga non lansia
			let harga_diskon = parseInt(jml_lansia) * parseInt(harga) * 10 / 100; // harga diskon
			let harga_lansia = parseInt(jml_lansia) * parseInt(harga);
			let total_harga_lansia = parseInt(harga_lansia) - parseInt(harga_diskon);
			let total_bayar = parseInt(harga_non_lansia) + parseInt(total_harga_lansia);

			totalbayar.value = parseInt(total_bayar);
		}

		// fungsi untuk memvalidasi di cekbox
		function validasi() {
			let check = document.getElementById('check');
			let btn = document.getElementById('btn');
			if (check.checked) {
				btn.removeAttribute('disabled');
			} else {
				btn.disabled = 'true';
			}
		}
	</script>

</body>

</html>