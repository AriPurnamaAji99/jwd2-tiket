<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga Tiket</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <!-- untuk menampilkan daftar pemesan -->
    <?php
    $tampil = mysqli_query($db, "select * from tbanggota");
    $no = 1;
    while ($hasil = mysqli_fetch_array($tampil)) : ?>
        <hr>
        <br>
        <pre>
				Nama pemesanan          : <?= $hasil['nama']; ?><br>
				Nomor Identitas         : <?= $hasil['idanggota'] ?><br>
				No. HP                  : <?= $hasil['nohp'] ?> <br>
				Kelas Penumpang         : <?= $hasil['klsbus'] ?><br>
				Jumlah Penumpang        : <?= $hasil['jml1'] . " orang"; ?> <br>
				Jumlah Penumpang Lansia : <?= $hasil['jml2'] . " orang"; ?> <br>
				Harga Tiket             : Rp.<?= number_format($hasil['harga'], 0, ",", "."); ?>  <br>
				Total Bayar             : Rp.<?= number_format($hasil['totalbayar'], 0, ",", "."); ?> <br>
				</pre>

    <?php endwhile; ?>

</body>

</html>