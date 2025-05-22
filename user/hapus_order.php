<?php
include "../admin/koneksi.php";

$id_order = $_POST['id'] ?? '';

if (empty($id_order)) {
    echo "<script>alert('ID order tidak ditemukan!'); history.back();</script>";
    exit;
}

$sql = "DELETE FROM orders WHERE id = '$id_order'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Pesanan berhasil dihapus!'); window.location='history.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus pesanan: " . mysqli_error($conn) . "'); history.back();</script>";
}
?>
