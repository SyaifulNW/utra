<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $nama_film = $_POST['nama_film'];

    $sql = "INSERT INTO tabel_movie (kode, nama_film) VALUES ('$kode', '$nama_film')";
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
    <title>Tambah Film</title>

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

        input[type="text"] {
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

<h2>Tambah Film</h2>

<form method="POST">
    <label for="kode">Kode:</label>
    <input type="text" name="kode" required><br>

    <label for="nama_film">Nama Film:</label>
    <input type="text" name="nama_film" required><br>

    <input type="submit" value="Simpan">
</form>

<div class="back-link">
    <a href="tampil_data.php">Kembali ke Daftar Film</a>
</div>

</body>
</html>

<?php $conn->close(); ?>
