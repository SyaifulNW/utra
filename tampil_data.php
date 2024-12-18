<?php
include('koneksi.php');

// Menampilkan data film
$sql_movie = "SELECT * FROM tabel_movie";
$result_movie = $conn->query($sql_movie);

// Menampilkan data tiket
$sql_tiket = "SELECT * FROM tabel_tiket";
$result_tiket = $conn->query($sql_tiket);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Film dan Tiket</title>

    <h1>  &nbsp;   &nbsp;   &nbsp;  Tes Programmer PT. Guwatirta Sejahtera</h1>

    <h3>  &nbsp;   &nbsp;   &nbsp;  &nbsp;   &nbsp;   Syaiful Nur Wardani </h3
    >

    <!-- Tambahkan CSS untuk mempercantik tampilan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1c40f;
        }

        a {
            color: #3498db;
            text-decoration: none;
            margin: 0 5px;
        }

        a:hover {
            text-decoration: underline;
        }

        .action-links {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .action-links a {
            padding: 6px 12px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
        }

        .action-links a:hover {
            background-color: #2980b9;
        }

        .container {
            padding: 20px;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Data Film</h2>  
     <h2><a href="tambah_film.php">Tambah Film</a> </h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Film</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result_movie->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['kode']; ?></td>
                <td><?= $row['nama_film']; ?></td>
                <td class="action-links">
             
                    <a href="ubah_film.php?id=<?= $row['id']; ?>">Ubah</a> |
                    <a href="hapus_film.php?id=<?= $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>Data Tiket</h2>
    <h2><a href="tambah_tiket.php">Tambah Tiket</a> </h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Film</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result_tiket->fetch_assoc()) { 
            $ref_film = $row['ref_film'];
            $sql_film = "SELECT nama_film FROM tabel_movie WHERE id = $ref_film";
            $film_result = $conn->query($sql_film);
            $film = $film_result->fetch_assoc();
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['kode']; ?></td>
                <td><?= $row['tgl']; ?></td>
                <td><?= $row['jam']; ?></td>
                <td><?= $film['nama_film']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td class="action-links">
     
                    <a href="ubah_tiket.php?id=<?= $row['id']; ?>">Ubah</a> |
                    <a href="hapus_tiket.php?id=<?= $row['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>

<?php $conn->close(); ?>
