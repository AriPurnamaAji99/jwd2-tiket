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
    <?php

    $tampil = mysqli_query($db, "select * from hrgtiket");
    $no = 1;
    while ($hasil = mysqli_fetch_array($tampil)) {

    ?>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Nama Kelas Bis</th>
                    <th scope="col">Harga Tiket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $hasil['nama_kelas']; ?></td>
                    <td><?php echo $hasil['harga_tiket'] ?></td>
                </tr>
            </tbody>
        </table>

    <?php } ?>

</body>

</html>