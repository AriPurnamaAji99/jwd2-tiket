<?php
//melakukan koneksi ke database
$koneksi        = mysqli_connect("localhost", "root", "", "dbtiket");


$ekonomi       = mysqli_query($koneksi, "SELECT klsbus FROM tbanggota WHERE klsbus = 'ekonomi' ");

$bisnis      = mysqli_query($koneksi, "SELECT klsbus FROM tbanggota WHERE klsbus = 'bisnis' ");

$eksekutif      = mysqli_query($koneksi, "SELECT klsbus FROM tbanggota WHERE klsbus = 'eksekutif' ");
?>
<html>

<head>
    <title>Grafik Pemesanan Tiket Bis</title>

    <!-- import library chart menggunakan cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    <style type="text/css">
        .container {
            width: 50%;
            margin: 15px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            // tipe chart
            type: 'bar',
            data: {

                labels: ['Ekonomi', 'Bisnis', 'Eksekutif'],

                //dataset adalah data yang akan ditampilkan
                datasets: [{
                    label: 'Pemesanan Tiket berdasarkan Kelas bis',

                    data: [
                        <?php echo mysqli_num_rows($ekonomi); ?>,
                        <?php echo mysqli_num_rows($bisnis); ?>,
                        <?php echo mysqli_num_rows($eksekutif); ?>,
                    ],

                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(200, 44, 235, 0.2)'
                    ],

                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(200, 44, 235, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>