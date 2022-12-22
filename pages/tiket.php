<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Daftar Tiket</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card shadow-lg">
                    <img src="images/bis1.jpg" class="card-img-top" alt="error" width="200" height="200">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Bis Kelas Ekonomi</h4>
                        </div>
                        <h5>Fasilitas</h5>
                        <p>40 kursi &nbsp; non ac </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card shadow-lg">
                    <img src="images/bis2.jpeg" class="card-img-top" alt="..." width="200" height="200">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Bis Kelas Bisnis</h4>
                        </div>
                        <h5>Fasilitas</h5>
                        <p>30 kursi &nbsp; ac </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card shadow-lg">
                    <img src="images/bis3.png" class="card-img-top" alt="..." width="200" height="200">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Bis Kelas Eksekutif</h4>
                        </div>
                        <h5>Fasilitas</h5>
                        <p>15 kursi &nbsp; ac </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $tampil = mysqli_query($db, "select * from hrgtiket");
            $no = 1;
            while ($hasil = mysqli_fetch_array($tampil)) : ?>
                <div class="col-md-4 col-sm-12 mb-3">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <p>Harga Tiket : Rp.<?= number_format($hasil['harga_tiket'], 0, ",", "."); ?></p>
                            <p>Kategori : <?= $hasil['nama_kelas']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="index.php?p=anggota-input&id=<?= $hasil['id']; ?>" class="card-link">Pesan Tiket</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>