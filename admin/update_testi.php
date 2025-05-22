<?php
include 'koneksi.php';

$id = $_POST['id'];
$action = $_POST['action'];

if ($action === 'update') {
    $status = $_POST['status'];
    $query = "UPDATE testimonials SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $query); 
    echo "<script>alert('Data berhasil diupdate'); window.location.href='index.php';</script>";

} elseif ($action === 'delete') {
    $query = "DELETE FROM testimonials WHERE id = $id";
    mysqli_query($conn, $query); 
    echo "<script>alert('Data berhasil hapus'); window.location.href='index.php';</script>";
}
?>
