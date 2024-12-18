<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $tgl = $_POST['tgl'];
    $jam = $_POST['jam'];
    $ref_film = $_POST['ref_film'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO tabel_tiket (kode, tgl, jam, ref_film, harga) VALUES ('$kode', '$tgl', '$jam', $ref_film, $harga)";
    if ($conn->query($sql) === TRUE) {
        header("Location: tampil_data.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tiket</title>

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
            margin-top: 30px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Tambah Tiket</h2>

<form method="POST">
    <label for="kode">Kode:</label>
    <input type="text" name="kode" required><br>

    <label for="tgl">Tanggal:</label>
    <input type="date" name="tgl" required><br>

    <label for="jam">Jam:</label>
    <input type="time" name="jam" required><br>

    <label for="ref_film">Film:</label>
    <select name="ref_film" required>
        <?php
        $sql_movie = "SELECT * FROM tabel_movie";
        $result_movie = $conn->query($sql_movie);
        while ($row = $result_movie->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nama_film'] . "</option>";
        }
        ?>
    </select><br>

    <label for="harga">Harga:</label>
    <input type="text" name="harga" required><br>

    <input type="submit" value="Simpan">
</form>

<div class="back-link">
    <a href="tampil_data.php">Kembali ke Daftar Tiket</a>
</div>

</body>
</html>

<?php $conn->close(); ?>
