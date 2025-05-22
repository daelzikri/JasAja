<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'] ?? '';
    $status = $_POST['status'] ?? '';

    $allowed_status = ['pending', 'in-progress', 'completed'];
    if ($order_id && in_array($status, $allowed_status)) {
        $sql = "UPDATE orders SET status = '$status' WHERE id = '$order_id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "Status berhasil diperbarui.";
        } else {
            $_SESSION['message'] = "Gagal update status: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['message'] = "Data tidak valid.";
    }
} else {
    $_SESSION['message'] = "Request tidak valid.";
}

header("Location: index.php");
exit;
?>
