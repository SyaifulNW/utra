<?php
include('koneksi.php');

$id = $_GET['id'];

$sql = "DELETE FROM tabel_tiket WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: tampil_data.php");
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
